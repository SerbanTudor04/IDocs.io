<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;


class AdminDocumentsController extends Controller
{
    public function show(){
        $title="Documentations management";
        $codes=$this->get_rights();
        return view('admin.documentations',['title' => $title,"rights" => $codes]);
    }

    public function get_delete($id){
        $title="Documentations management - Delete ";
        $codes=$this->get_rights();
        $doc=Documents::where("id","=",$id)->first();
        return view('admin.documentations_delete',['title' => $title,"rights" => $codes,"doc"=>$doc]);
    }

    public function post_delete(Request $req){
        $codes=$this->get_rights();
        
        if (!(in_array('P001', $codes) || in_array('P002', $codes) )){
            return response($this->get_access_denied(),403);
        }
        if(!$req->id){
            return response($this->make_message("error","Unable to find this id!",[
            ]),400);
        }



        // Documents::where("id","=",$req->id)->delete();
        $doc=Documents::where("id","=",$req->id)->first();

        $doc->is_active=false;

        $doc->save();
        Artisan::call('index:documents --id='.$req->id);
        

        return redirect(route("admin.documentations"))->withInput()->with('success', 'Doc arhived successfully!');
        
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
}
