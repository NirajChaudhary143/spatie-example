<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(){
        return view('admin.addRole');
    }

    public function storeRole(Request $request){
        $request->validate([
            'name'=>'required|min:3'
        ]);
        $role = Role::create(['name'=>$request->input('name')]);
        return redirect('/admin');
    }
    public function viewRoles(){
      $roles = Role::all();
        return view('admin.viewRole',compact('roles'));
    }
    public function deleteRole($id){
       $res=  Role::find($id)->delete();
       if($res){
        return redirect('/admin/view-roles');
       }

    }
    public function editRole($id){
        $role = Role::find($id);
        return view('admin.editRole',compact('role'));
    }
    public function updateRole($id, Request $request){
        // $request
        $request->validate([
            'name'=>'required|min:3'
        ]);
        // echo "<pre/>";
        // print_r($request->toArray());
        $role = Role::find($id);
        $role->name=$request['name'];
        $role->save();
        return redirect('/admin/view-roles');

    }
}
