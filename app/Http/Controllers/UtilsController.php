<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
class UtilsController extends Controller
{

    public static function get_username($id){
        $user=DB::table('users')->where('id',$id)->first();
        return $user->username;
    }
    public  static function get_gravatar( $email, $s = 80, $d = 'mp', $r = 'g', $img = false, $atts = array() ) {
		$url = 'https://www.gravatar.com/avatar/';
		$url .= md5( strtolower( trim( $email ) ) );
		$url .= "?s=$s&d=$d&r=$r";
		if ( $img ) {
			$url = '<img src="' . $url . '"';
			foreach ( $atts as $key => $val )
				$url .= ' ' . $key . '="' . $val . '"';
			$url .= ' />';
		}
		return $url;
	}

	public static function get_app_links(){
		$links=DB::table('apps_links')->where('app_id',1)->get();
		return $links->toArray();
	}
}