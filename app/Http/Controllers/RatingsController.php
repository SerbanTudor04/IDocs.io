<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddRatings;
use Illuminate\Http\Request;

class RatingsController extends Controller
{
    public function add2doc(AddRatings $request){
        $user_id=auth()->user()->id;

    }
    public function checkRating(){
        $user_id=auth()->user()->id;
        $doc=DB::table('documents_ratings')->where('id',$id)->first();
    }
}
