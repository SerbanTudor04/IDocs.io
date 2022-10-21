<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents_ratings_aggregated',function(Blueprint $table){
            $table->uuid('id')->primary();
            $table->longText('content')->nullable()->default('text');
            $table->float('rating')->nullable()->default(5);
            $table->integer('created_by')->nullable()->default(12);
            $table->integer('updated_by')->nullable()->default(12);
            $table->uuid('document_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
