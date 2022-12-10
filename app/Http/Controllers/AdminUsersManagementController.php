<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class AdminUsersManagementController extends Controller
{
    public function show(){
        $title="Users management";

        $codes=$this->get_rights();
        
        return view('admin.users',['title' => $title,'rights' => $codes]);

    }

    public function get_create_or_edit($id=""){
        $title="Users management - ";
        if($id){
            $title=$title."Edit";
        }else{
            $title=$title."Create";
        }

        
        $codes=$this->get_rights();

        return view('admin.users_create_or_edit',['title' => $title,'rights' => $codes,"id"=>$id]);

    }


    
    public function post_create_or_edit(Request $req){
    
        $rights=$this->get_rights();

        if(!(in_array('P001',$rights) || (in_array('P005',$rights) && in_array('P003',$rights)))){
            return response($this->get_access_denied(),403);
        }

        if($req->id){
            $user=User::where("id","=",$req->id)->first();
            
            if( !(in_array('P001',$rights)) && $user->username !="admin") {
                return response($this->get_access_denied(),403);
            }

            $user->name=$req->name;
            $user->email=$req->email;
            $user->password=Hash::make($req->password);
            $user->app_id=$req->app_id;
            $user->username=$req->username;
            $user->is_staff=$req->is_staff;
            $user->save();

            return response($this->make_message("success","User has been updated successfully!",[]));
        }
         
        $admin_id=Str::uuid()->toString();

        User::create([
            'name' => $req->name,
            'username' => $req->username,
            'email' => $req->email,
            'password' => $req->password,
            'app_id' => $req->app_id,
            'id' =>$admin_id,
            'is_staff' =>$req->is_staff,
        ]);
        
        return response($this->make_message("success","User has been created successfully!",[]));
        
        
    }

    public function get_delete($id){
        $title="Users management - Delete";
        $rights=$this->get_rights();

        $user=User::where("id","=",$id)->first();


        return view('admin.users_delete',['title' => $title,'rights' => $rights,"user"=>$user]);
    }

    public function post_delete(Request $req){
        $rights=$this->get_rights();

        if(!(in_array('P001',$rights) || (in_array('P005',$rights) && in_array('P003',$rights)))){
            return response($this->get_access_denied(),403);
        }
        if(!$req->id){
            return response($this->make_message("error","Unable to find this id!",[
            ]),400);
        }



        User::where('id',$req->id)->delete();


        return redirect(route("admin.users"))->withInput()->with('success', 'User deleted successfully!');


    }



    private function get_rights(){
 
        $user_id=auth()->user()->id;
        $rights=DB::select(
           DB::raw(
            "select k.code from users_staff_groups_permissions k
            where k.id = (select i.permission_id from users_staff_groups_permissions_relation i
                where i.group_id = ( select j.group_id from users_staff_groups_memberships j where j.users_id = ?))"
           ),[$user_id]
        );
        $codes=[];

        foreach( $rights as $right){
            array_push($codes,$right->code);
        }
        
        return $codes;
    }

    public function get_users_editInfo($id){
        $rights=$this->get_rights();
        error_log(json_encode($rights));
        if(!(in_array('P001',$rights) || (in_array('P005',$rights) && in_array('P003',$rights)))){
            return response($this->get_access_denied(),403);
        }

        $result=DB::select("select name, username, email,app_id,is_staff from users where id=? ",[$id]);

        
        return response()->json($result,200);


    }

    private function get_access_denied($message="Access Denied"){
        return [
            "status"=>"denied",
            "message"=>$message,
            "data"=>[]
        ];
    }

    private function make_message($status,$message,$data){
        return [
            "status"=>$status,
            "message"=>$message,
            "data"=>$data
        ];
    }

    public function get_apps(){
        $rights=$this->get_rights();

        if(!(in_array('P001',$rights) || (in_array('P005',$rights) && in_array('P003',$rights)))){
            return response($this->get_access_denied(),403);
        }

        $data=DB::select("select id,name from apps");

        return response()->json($data,200);



    }
}
