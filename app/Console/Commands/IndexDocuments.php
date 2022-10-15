<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Documents;

use Elasticsearch;
class IndexDocuments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'index:documents';

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
        $docs = Documents::all(['id','name','content']);
        echo 'Documents obtained.';


        
        foreach($docs as $doc){
            
            $data=[
                'body'=>[
                    'name'=>$doc->name,
                    'content'=>$doc->content,
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
