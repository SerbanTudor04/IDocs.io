<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Elasticsearch;
use Exception;
class HomeController extends Controller
{
    public function index() 
    {
        // $docs =DB::table('apps_documents_ratings_aggregated')->take(5)->get();

        $docs =DB::select(DB::raw("select * from apps_documents where id in (select i.document_id from apps_documents_ratings_aggregated i limit 5)"));

        return view('home.index',['docs'=>$docs]);
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
                    'sort' =>[
                        "_score" =>[
                            "order"=>"desc"
                        ],
                        "rating"=>[
                            "order"=>"desc"
                        ]
                        ],
                    'query' => [
                        'multi_match' => [
                            'query' => $query,
                            'fields' => [
                                'name',
                                'content',
                                'short_description'
                            ]
                        ]
                    ],
                    
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
