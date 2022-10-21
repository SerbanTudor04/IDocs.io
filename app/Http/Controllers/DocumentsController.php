<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddDocumentRequest;
use App\Models\Documents;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class DocumentsController extends Controller
{
    public function add_show(){
        return view('documents.add');
    }

    public function add_perform(AddDocumentRequest $request){
        
        $user_id=auth()->user()->id;

        

        $document=Documents::create(
                [
                    'name'=>$request->name,
                    'content'=>$request->content,
                    'created_by'=>$user_id,
                    'updated_by'=>$user_id,
                    'short_description'=>$request->short_description,
                ]
        );

        Artisan::command('index:documents',function($user){
            echo "Documents indexed";
        })->purpose('Indexing documents in database');
        


        $doc_id=$document->id;

        return redirect('/doc/view/'.$doc_id)->with('success', "Account successfully registered.");
        
    }

    public function viewDoc_show($id){

        $doc=DB::table('documents')->where('id',$id)->first();

        $content="<p>Buna ce mai <strong>zici</strong>?</p>";

        return view('documents.view',['doc'=>$doc,'content'=>$content]);

    }
}
