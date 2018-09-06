<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::user()->can('view-product'))
        {
            return abort(403);
        }
        $products = "";
        if ($request->filled('trashed'))
        {
            $products = Product::onlyTrashed()->latest();
        }
        else
        {
            $products = Product::latest();
        }

        if ($request->filled('category'))
        {
            $products = $products->where('category_id', '=', $request->category);
        }

        if ($request->filled('search'))
        {
            $products = $products->where('name', 'like', "%{$request->search}%");
        }

        if ($request->filled('per_page'))
        {
            $products = $products->paginate($request->per_page);
        }
        else
        {
            $products = $products->paginate();
        }

        $deletedProducts = Product::onlyTrashed()->count();
        $categories = Category::latest()->pluck('name', 'id');
        Session::flash('module', 'product');

        if ( $request->trashed == 1 )
        {
            $products = $products->withPath('?trashed=1&search='.$request->search.'&per_page='.$request->per_page.'&category='.$request->category);
            return view('page.product.index', compact('products' , 'deletedProducts', 'categories'));
        }
        else
        {
            $products = $products->withPath('?search='.$request->search.'&per_page='.$request->per_page.'&category='.$request->category);
            return view ('page.product.index', compact('products' , 'deletedProducts', 'categories'));
        }
    }

    public function create()
    {
        if (!Auth::user()->can('create-product'))
        {
            return abort(403);
        }
        Session::flash('module', 'product');
        $categories = Category::latest()->pluck('name', 'id');

        return view ('page.product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        if (!Auth::user()->can('create-product'))
        {
            return abort(403);
        }
        $request->validate([
            'name' => 'required|unique:products',
            'price' => 'required|numeric',
            'description' => 'required',
            'category' => 'required',
            'image' => 'mimes:jpeg,bmp,png,jpg'
        ]);

        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category;
        $product->available = 1;
        $product->save();
        
        if ($request->file('image')){
                $fileName = date('ydmhis').'_'.$request->image->getClientOriginalName();
                $file = $request->file('image');
                $product->image = $fileName;

                if ($product->save())
                {
                    $file->move('assets/img/product_img', $fileName);
                }
            }



        Session::flash('module', 'product');
        Session::flash('success', ['title' => 'Success!', 'msg' => 'Product was saved!']);
        return redirect()->route('product.index');
    }

    public function destroy(Product $product)
    {
        if (!Auth::user()->can('delete-product'))
        {
            return abort(403);
        }
        Session::flash( 'success', ['title' => 'Delete Successful!', 'msg' => $product->name.' was deleted!' ] );
        $product->delete();
        Session::flash('module', 'product');
        return redirect()->route('product.index');
    }

    public function forceDestroy($id)
    {
        if (!Auth::user()->can('delete-product'))
        {
            return abort(403);
        }
        $product = Product::onlyTrashed()->find($id);
        if (!empty($product)) {
            Session::flash( 'success', ['title' => 'Delete Successful!', 'msg' => $product->name.' was deleted!' ] );
            File::delete('assets/img/product_img/' . $product->image);
            $product->forceDelete();
            Session::flash('module', 'product');
            return redirect()->route('product.index', ['trashed' => '1']);
        }

        return abort(404);
    }

    public function edit(Product $product)
    {
        if (!Auth::user()->can('update-product'))
        {
            return abort(403);
        }
        Session::flash('module', 'product');
        $categories = Category::latest()->pluck('name', 'id');
        return view('page.product.edit', compact('product', 'categories'));
    }

    public function storeEdit(Request $request)
    {
        if (!Auth::user()->can('update-product'))
        {
            return abort(403);
        }
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'category' => 'required',
            'image' => 'mimes:jpeg,bmp,png,jpg'
        ]);

       $product = Product::findOrFail($request->id);
        $oldname = $product->name;
        $old = $product->image;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category_id = $request->category;
        $product->price = $request->price; 
        $product->available = 1;
        $product->save();
            
            if ($request->file('image')){
                $fileName = date('ydmhis').'_'.$request->image->getClientOriginalName();
                $file = $request->file('image');
                $product->image = $fileName;

                if ($product->save())
                {

                    File::delete('assets/img/product_img/' . $old);
                    $file->move('assets/img/product_img', $fileName);

                }
            }
 
        Session::flash('module', 'product');
        Session::flash( 'success', ['title' => 'Update Successful!', 'msg' => $oldname.' was updated!' ] );
        return redirect()->route('product.index');
        
 
    }

    public function restore($id)
    {
        if (!Auth::user()->can('delete-product'))
        {
            return abort(403);
        }
        Session::flash('module', 'product');
        $product = Product::onlyTrashed()->find($id);
        if (!empty($product))
        {
           Session::flash( 'success', ['title' => 'Recover Successful!', 'msg' => $product->name.' was recovered!' ] );
        $product->restore();
        return redirect()->route('product.index', ['trashed' => '1']); 
        }
        return abort(404);
    }
}