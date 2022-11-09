<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddRatings;
use App\Models\DocumentsRatings;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class RatingsController extends Controller
{
    public function add2doc(AddRatings $request){
        $user_id=auth()->user()->id;
        if($this->checkIfUserHasAlreadyRatedDocument($user_id,$request->document_id)){
            return redirect()->back()->withInput()->with('errors', 'One rating is allowed!');
        }

        DocumentsRatings::create(
            [
                'id' =>Str::uuid()->toString(),
                'rating' => $request->rating,
                'document_id' => $request->document_id,
                'user_id' => $user_id,
            ]
        );

        return redirect()->back()->withInput()->with('success', 'Rating added successfully!');


    }
    
    private function checkIfUserHasAlreadyRatedDocument($user_id,$document_id){
        $doc=DB::table('apps_documents_ratings')->where('document_id','=',$document_id)->where('user_id','=',$user_id)->get();
		if(!count($doc))return false;
		return true;
    }



}
