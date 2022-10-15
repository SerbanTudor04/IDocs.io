<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddDocumentRequest;
use App\Models\Documents;
use Illuminate\Http\Request;
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
                    'updated_by'=>$user_id
                ]
        );

        Artisan::command('import:documents',function($user){
            echo "Documents indexed";
        })->purpose('Indexing documents in database');
        


        $doc_id=$document->id;

        return redirect('/doc/view/'.$doc_id)->with('success', "Account successfully registered.");
        
    }

    public function viewDoc_show($id){

        $doc=DB::table('documents')->where('id',$id)->first();

        return view('documents.view',['doc'=>$doc]);

    }
}
