<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $roles = Role::latest()->paginate();


        Session::flash('module', 'role');
        return view('page.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        Session::flash('module', 'role');
        return view('page.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles'
        ]);
        
        $permissions = [];
        foreach ($request->request as $key => $value) {
            if ($key != "_token" && $key != "id" && $key != "name")
            {
                array_push($permissions, $value);
            }
        }
        $role = Role::create(['name' => $request->name]);
        $role->syncPermissions($permissions);
        Session::flash('module', 'role');
        Session::flash('success', ['title' => 'Success!', 'msg' => 'Role was saved!']);
        return redirect()->route('role.index');
    }

     public function storeEdit(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        
        $permissions = [];
        foreach ($request->request as $key => $value) {
            if ($key != "_token" && $key != "id" && $key != "name")
            {
                array_push($permissions, $value);
            }
        }
        $role = Role::findOrFail($request->id);
        $role->syncPermissions($permissions);
        $role->name = $request->name;
        $role->save();
        Session::flash('module', 'role');
        Session::flash('success', ['title' => 'Success!', 'msg' => 'Role was saved!']);
        return redirect()->route('role.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);

        Session::flash('module', 'role');
        return view('page.role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
