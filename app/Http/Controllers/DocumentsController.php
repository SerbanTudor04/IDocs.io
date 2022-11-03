<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddComment2Document;
use App\Http\Requests\AddDocumentRequest;
use App\Models\Documents;
use App\Models\DocumentsComments;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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


        Artisan::call('index:documents');

        $doc_id=$document->id;

        return redirect('/doc/view/'.$doc_id)->with('success', "Account successfully registered.");
        
    }

    public function viewDoc_show($id){

        $doc=DB::table('apps_documents')->where('id',$id)->first();
        $comments=DB::table('apps_documents_comments')->where('document_id',$id)->get();


        return view('documents.view',['doc'=>$doc,'comments'=>$comments]);

    }

    public function add_comment(AddComment2Document $request){
        $user_id=auth()->user()->id;
        DocumentsComments::create(
                [      
                    'id' =>Str::uuid()->toString(),
                    'document_id'=>$request->document_id,
                    'content'=>$request->comment,
                    'created_by'=>$user_id,
                    'updated_by'=>$user_id,
                    'users_id'=>$user_id,
                ]
            );


        return redirect()->back()->withInput()->with('success', 'Comment added successfully!');


    }
}
