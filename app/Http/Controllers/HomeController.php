<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Elasticsearch;
use Exception;
class HomeController extends Controller
{
    public function index() 
    {
        return view('home.index',['q'=>'']);
    }
    public function results(Request $request){
        $query = $request->input('q');
        if(!$query){
            $query = '';
            return view('home.results',['q'=> $query,'response'=>[]]);

        }
        try{
            $q=Elasticsearch::search([
                'index' => 'i_documents',
                'body'  => [
                    'query' => [
                        'multi_match' => [
                            'query' => $query,
                            'fields' => [
                                'name',
                                'content',
                                'short_description'
                            ]
                        ]
                    ]
                ]
        ]);
            $response=$q['hits']['hits'];
        } catch(Exception $e) {
            $response=[];
        }



        return view('home.results',['q'=> $query,'response'=>$response]);

    }
    public function about(){
        return view('home.about');

    }
}
