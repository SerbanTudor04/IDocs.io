<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
class UtilsController extends Controller
{

    public static function get_username($id){
        $user=DB::table('users')->where('id',$id)->first();
        return $user->username;
    }
}
