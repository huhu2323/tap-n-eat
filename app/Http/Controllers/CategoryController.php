<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::user()->can('view-pcategory'))
        {
            return abort(403);
        }
    	$categories = "";
        $categories = Category::latest();

        if ($request->filled('search'))
        {
            $categories = $categories->where('name', 'like', "%{$request->search}%");
        }

        if ($request->filled('per_page'))
        {
            $categories = $categories->paginate($request->per_page);
        }
        else
        {
            $categories = $categories->paginate();
        }

        Session::flash('module', 'product');

        $categories = $categories->withPath('?search='.$request->search.'&per_page='.$request->per_page);
        return view ('page.category.index', compact('categories'));
    }

    public function create()
    {
        if (!Auth::user()->can('create-pcategory'))
        {
            return abort(403);
        }
        Session::flash('module', 'product');
        return view('page.category.create');
    }

    public function store(Request $request)
    {
        if (!Auth::user()->can('create-pcategory'))
        {
            return abort(403);
        }
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        Session::flash('module', 'product');
        Session::flash('success', ['title' => 'Success!', 'msg' => 'Category: '.$category->name.' was created!']);
        return redirect()->route('category.index');
    }

    public function edit(Category $category)
    {
        if (!Auth::user()->can('update-pcategory'))
        {
            return abort(403);
        }
        Session::flash('module', 'product');
        return view('page.category.edit', compact('category'));
    }

    public function storeEdit(Request $request)
    {
        if (!Auth::user()->can('update-pcategory'))
        {
            return abort(403);
        }
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $category = Category::find($request->id);
        $oldname = $category->name;
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        Session::flash('module', 'product');
        Session::flash('success', ['title' => 'Success!', 'msg' => 'Category: '.$oldname.' was updated!']);
        return redirect()->route('category.index');
    }

    public function destroy(Category $category)
    {
        if (!Auth::user()->can('delete-pcategory'))
        {
            return abort(403);
        }
        Session::flash('module', 'product');
        if (count($category->product))
        {  
            Session::flash('warning', ['title' => 'Warning!', 'msg' => 'Unable to delete category with product(s) registered!']);
            return redirect()->route('category.index');
        }
        $oldname = $category->name;
        $category->delete();
        Session::flash('success', ['title' => 'Success!', 'msg' => 'Category: '.$oldname.' was deleted!']);
        return redirect()->route('category.index');
    }
}