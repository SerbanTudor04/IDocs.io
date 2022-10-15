<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Elasticsearch;

class HomeController extends Controller
{
    public function index() 
    {
        return view('home.index',['q'=>'']);
    }
    public function results(Request $request){
        $query = $request->input('q');
        

        $q=Elasticsearch::search([
            'index' => 'i_documents',
            'body'  => [
                'query' => [
                    'multi_match' => [
                        'query' => $query,
                        'fields' => [
                            'name',
                            'content'
                        ]
                    ]
                ]
            ]
        ]);

        $response=$q['hits']['hits'];


        return view('home.results',['q'=> $query,'response'=>$response]);

    }
}
