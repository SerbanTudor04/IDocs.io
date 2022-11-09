<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Webutils extends Controller
{
    public static function getAppName(){
        $doc=DB::table('apps')->where('id',1)->first();
        return $doc->name;
    }
}
