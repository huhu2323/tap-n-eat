<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use HasRoles;
    public function index()
    {
       $users = User::latest()->paginate();
       Session::flash('module', 'role');
       return view ("page.user.index",compact('users'));
    }

    public function create()
    {
        Session::flash('module', 'role');
        $roles = Role::all()->pluck('name', 'name');
        return view('page.user.create', compact('roles'));
    }

   
    public function store(Request $request)
    {
       $request->validate([
            'username' => 'required|unique:users',
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'password' => 'required|confirmed',
            'role' => 'required',
            'email' => 'required|unique:users|email',
            'contact' => 'required',
            
        ]);
        $user = new User;
        $user->username = $request->username;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->address = $request->address;
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $user->contact = $request->contact;
        $user->save();
        $user->assignRole($request->role);

        Session::flash('module', 'role');
        Session::flash('success', ['title' => 'Success!', 'msg' => 'User: '.$user->username.' was created!']);
        return redirect()->route('user.index');
    }

    public function edit($user)
    {
        $user = User::find($user);
        Session::flash('module', 'role');
        $roles = Role::all()->pluck('name', 'name');
        return view('page.user.edit', compact('user', 'roles'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        Session::flash('module', 'role');
        Session::flash('success', ['title' => 'Success!', 'msg' => 'User: '.$user->username.' was deleted!']);
        return redirect()->route('user.index');
    }

    public function storeEdit(Request $request)
    {

        $request->validate([
             'username' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'password' => 'required|confirmed',
            'role' => 'required',
            'email' => 'required|email',
            'contact' => 'required',

        ]);

        $user = User::find($request->id);
        $oldname = $user->username;
        $user->username = $request->username;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->address = $request->address;
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $user->contact = $request->contact;
        $user->save();
        $user->syncRoles($request->role);

        Session::flash('module', 'role');
        Session::flash('success', ['title' => 'Success!', 'msg' => 'User: '.$oldname.' was updated!']);
        return redirect()->route('user.index');

    }
}
