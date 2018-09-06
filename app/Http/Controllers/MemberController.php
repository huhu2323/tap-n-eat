<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::user()->can('view-member'))
        {
            return abort(403);
         }

        $members = "";
        if ($request->filled('trashed'))
        {
            $members = Member::onlyTrashed()->latest();
        }
        else
        {
            $members = Member::latest();
        }


        if ($request->filled('search'))
        {
            $members = $members->where('name', 'like', "%{$request->search}%");
        }

        if ($request->filled('per_page'))
        {
            $members = $members->paginate($request->per_page);
        }
        else
        {
            $members = $members->paginate();
        } 


       $deletedMembers = Member::onlyTrashed()->count();
       Session::flash('module', 'member');


       if ( $request->trashed == 1 )
        {
            $members = $members->withPath('?trashed=1&search='.$request->search.'&per_page='.$request->per_page);
            return view('page.member.index', compact('members' , 'deletedMembers'));
        }
        else
        {
            $members = $members->withPath('?search='.$request->search.'&per_page='.$request->per_page);
            return view ('page.member.index', compact('members' , 'deletedMembers'));
        }

    }

    public function create()
    {
       Session::flash('module', 'member');
        return view('page.member.create'); 
    }
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|confirmed',
            'rfid' => 'required',
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'contact' => 'required',
            'credit' => 'required',
            'image' => 'mimes:jpeg,bmp,png,jpg'
        ]);

        $fileName = date('ydmhis').'_'.$request->file('image')->getClientOriginalName();
        $file = $request->file('image');
        $member = new Member;
        $member->username = $request->username;
        $member->password = bcrypt($request->password);
        $member->rfid = $request->rfid;
        $member->first_name = $request->first_name;
        $member->middle_name = $request->middle_name;
        $member->last_name = $request->last_name;
        $member->address = $request->address;
        $member->contact = $request->contact;
        $member->credit = $request->credit;
        $member->image = $fileName;
        if ($member->save())
        {
            $file->move('assets/img/member_img', $fileName);
        }

        Session::flash('module', 'member');
        Session::flash('success', ['title' => 'Success!', 'msg' => 'Member: '.$member->first_name.' was created!']);
        return redirect()->route('member.index');
    }


    public function edit(Member $member)
    {
        Session::flash('module', 'member');
        return view('page.member.edit', compact('member'));
    }


    public function storeEdit(Request $request)
    {

        $request->validate([
            'rfid' => 'required',
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'contact' => 'required',
            'credit' => 'required',
            'image' => 'mimes:jpeg,bmp,png,jpg'

        ]);
        $member = Member::find($request->id);
        $oldname = $member->fullname();
        $old = $member->image;
        $member->rfid = $request->rfid;
        $member->first_name = $request->first_name;
        $member->middle_name = $request->middle_name;
        $member->last_name = $request->last_name;
        $member->address = $request->address;
        $member->contact = $request->contact;
        $member->credit = $request->credit;
        $member->save();
        
        if ($request->file('image')){
                $fileName = date('ydmhis').'_'.$request->image->getClientOriginalName();
                $file = $request->file('image');
                $member->image = $fileName;


                if ($member->save())
                {

                    File::delete('assets/img/member_img/' . $old);
                    $file->move('assets/img/member_img', $fileName);

                }
            }

        Session::flash('module', 'member');
        Session::flash('success', ['title' => 'Success!', 'msg' => 'Member: '.$oldname.' was updated!']);
        return redirect()->route('member.index');

    }

    public function delete($id)
    {
       $member = Member::find($id);
       $member->delete();

       Session::flash('module', 'member');
       Session::flash('success', ['title' => 'Success!', 'msg' => 'Member: '.$member->fullname().' was deleted!']);
       return redirect()->route('member.index');
    }

    public function destroy(Member $member)
    {
        if (!Auth::user()->can('delete-member'))
        {
            return abort(403);
        }
        Session::flash( 'success', ['title' => 'Delete Successful!', 'msg' => $member->name.' was deleted!' ] );
        $member->delete();
        Session::flash('module', 'product');
        return redirect()->route('member.index');
    }

    public function forceDestroy($id)
    {
        if (!Auth::user()->can('delete-member'))
        {
            return abort(403);
        }
        $member = Member::onlyTrashed()->find($id);
        if (!empty($member)) {
            Session::flash( 'success', ['title' => 'Delete Successful!', 'msg' => $member->name.' was deleted!' ] );
            File::delete('assets/img/member_img/' . $member->image);
            $member->forceDelete();
            Session::flash('module', 'member');
            return redirect()->route('member.index', ['trashed' => '1']);
        }

        return abort(404);
    }

    public function restore($id)
    {
        if (!Auth::user()->can('delete-member'))
        {
            return abort(403);
        }
        Session::flash('module', 'member');
        $member = Member::onlyTrashed()->find($id);
        if (!empty($member))
        {
           Session::flash( 'success', ['title' => 'Recover Successful!', 'msg' => $member->name.' was recovered!' ] );
        $member->restore();
        return redirect()->route('member.index', ['trashed' => '1']); 
        }
        return abort(404);
    }
}
