<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminAPIController extends Controller
{
    
    // API ENDPOINTS

    /**
     * Api function prefix means is a api endpoint
     * Get in name represent the http method
     * store represent post
     */

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

    public function api_getTotalUsers(){

        $result=DB::table('users');

        $total_users=$result->count();

        return response($total_users);
    }

    public function api_getTotalDocuments(){

        $result=DB::table('apps_documents');

        $total_docs=$result->count();

        return response($total_docs);
    }

    public function get_Users(){

        $codes=$this->get_rights();

        if(!(in_array('P001',$codes) || (in_array('P005',$codes) && in_array('P003',$codes)))){
            return response([
                'error'=>'Permission denied'
            ],403
            );
        }

        $users=DB::select("select i.id,i.name,i.username,i.email,(select k.name from apps k where k.id = i.app_id ) app,i.app_id,i.is_staff  from users i");

        return response($users);


    }

    public function get_documents(){
        $codes=$this->get_rights();


        if(!(in_array('P001',$codes) || in_array('P002',$codes))){
            return response([
                'error'=>'Permission denied'
            ],403
            );
        }
        $docs=DB::select("select i.id,i.short_description,i.name,i.created_at,i.created_by,(select k.username from users k where id=i.created_by ) username from apps_documents i where i.is_active = true");

        return response($docs);
    }

    

}
