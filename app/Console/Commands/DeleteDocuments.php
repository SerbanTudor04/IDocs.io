<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Elasticsearch;


class DeleteDocuments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete_index:documents';

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
        try{
            Elasticsearch::indices()->delete(['index' => 'i_documents']);
        } catch (Exception $e) {
            $this->info($e->getMessage());
        }
        return Command::SUCCESS;
    }
}
