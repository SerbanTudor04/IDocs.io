<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

use Elasticsearch;
class IndexDocuments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'index:documents {--id=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $doc_id=$this->option('id');

        if($doc_id!=""){
            $docs=DB::select("select i.id,i.name,i.content,i.short_description, (select k.rating from apps_documents_ratings_aggregated k where k.document_id=i.id  ) rating from apps_documents i where i.id=?",[  $doc_id]);   
        }else{
            $docs=DB::select("select i.id,i.name,i.content,i.short_description, (select k.rating from apps_documents_ratings_aggregated k where k.document_id=i.id  ) rating from apps_documents i ");   
        }
        
        foreach($docs as $doc){
            
            $data=[
                'body'=>[
                    'name'=>$doc->name,
                    'content'=>$doc->content,
                    'short_description'=>$doc->short_description,
                    'rating'=>floatval($doc->rating),
                ],
                'index'=>"i_documents",
                'type'=>'keyword',
                'id'=>$doc->id
            ];
            try{
                Elasticsearch::index($data);
            } catch (Exception $e) {
                $this->info($e->getMessage());
            }
        }   




        return Command::SUCCESS;
    }
}
