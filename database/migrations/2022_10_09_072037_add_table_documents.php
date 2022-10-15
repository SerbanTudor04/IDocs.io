<?php

use Carbon\Carbon;
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
        Schema::create('documents',function(Blueprint $table){
            $table->uuid('id')->primary();
            $table->string('name');
            $table->longText('content')->nullable()->default('text');
            $table->integer('created_by')->nullable()->default(12);
            $table->dateTime('created_at')->nullable()->default(Carbon::now()->toDateTimeString());
            $table->integer('updated_by')->nullable()->default(12);
            $table->dateTime('updated_at')->nullable()->default(Carbon::now()->toDateTimeString());
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
        
    }
};
