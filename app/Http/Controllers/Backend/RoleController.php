<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User; 
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function AllPermission(){
        $permissions = Permission::all();
        return view('admin.backend.pages.permission.all_permission',compact('permissions')); 
    }
    // End Method 

     public function AddPermission(){ 
        return view('admin.backend.pages.permission.add_permission'); 
    }
    // End Method 

    public function StorePermission(Request $request){

        Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);

        $notification = array(
            'message' => 'Permission Inserted Successfully',
            'alert-type' => 'success'
         ); 
         return redirect()->route('all.permission')->with($notification); 
    }
     // End Method 

     public function EditPermission($id){
        $permissions = Permission::find($id);
        return view('admin.backend.pages.permission.edit_permission',compact('permissions'));

     }
     // End Method 

     public function UpdatePermission(Request $request){
        $per_id = $request->id;

        Permission::find($per_id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);

        $notification = array(
            'message' => 'Permission Updated Successfully',
            'alert-type' => 'success'
         ); 
         return redirect()->route('all.permission')->with($notification); 
    }
     // End Method 

     public function DeletePermission($id){
        Permission::find($id)->delete();

        $notification = array(
            'message' => 'Permission Deleted Successfully',
            'alert-type' => 'success'
         ); 
         return redirect()->back()->with($notification); 

     }
      // End Method 


    public function AllRoles(){
        $roles = Role::all();
        return view('admin.backend.pages.role.all_role',compact('roles')); 
    }
    // End Method 

    public function AddRoles(){ 
        return view('admin.backend.pages.role.add_role'); 
    }
    // End Method 

    public function StoreRoles(Request $request){

        Role::create([
            'name' => $request->name, 
        ]);

        $notification = array(
            'message' => 'Role Inserted Successfully',
            'alert-type' => 'success'
         ); 
         return redirect()->route('all.roles')->with($notification); 
    }
     // End Method 


      public function EditRoles($id){
        $roles = Role::find($id);
        return view('admin.backend.pages.role.edit_role',compact('roles'));

     }
     // End Method 

     public function UpdateRoles(Request $request){
        $role_id = $request->id;

        Role::find($role_id)->update([
            'name' => $request->name, 
        ]);

        $notification = array(
            'message' => 'Role Updated Successfully',
            'alert-type' => 'success'
         ); 
         return redirect()->route('all.roles')->with($notification); 
    }
     // End Method 

       public function DeleteRoles($id){
        Role::find($id)->delete();

        $notification = array(
            'message' => 'Role Deleted Successfully',
            'alert-type' => 'success'
         ); 
         return redirect()->back()->with($notification); 

     }
      // End Method
      
    ///////////////// Add Role Permission All Methods /////////

    public function AddRolesPermission(){
        $roles = Role::all();
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('admin.backend.pages.rolesetup.add_roles_permission',compact('roles','permissions','permission_groups'));

    }
     // End Method

     public function RolePermissionStore(Request $request){

        $data = array();
        $permissions = $request->permission;

        foreach ($permissions as $key => $item){
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;

            DB::table('role_has_permissions')->insert($data);
        } // End Foreach

        

        $notification = array(
            'message' => 'Role Permission Added Successfully',
            'alert-type' => 'success'
         ); 
         return redirect()->route('all.roles')->with($notification); 

     }
      // End Method







}
