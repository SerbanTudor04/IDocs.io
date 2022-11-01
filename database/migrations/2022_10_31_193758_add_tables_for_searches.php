<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;



return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('documents_searches', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->integer('count')->default(0);
            $table->integer('created_by')->nullable()->default(12);
            $table->integer('updated_by')->nullable()->default(12);
            $table->dateTime('created_at')->default(Carbon::now()->toDateTimeString());
            $table->dateTime('updated_at')->default(Carbon::now()->toDateTimeString());
        }); 

        Schema::create('documents_clicks', function (Blueprint $table) {
            $table->id();
            $table->uuid('document_id')->index();
            $table->foreign('document_id')->references('id')->on('documents');
            $table-> integer('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('created_by')->nullable()->default(12);
            $table->integer('updated_by')->nullable()->default(12);
            $table->dateTime('created_at')->default(Carbon::now()->toDateTimeString());
            $table->dateTime('updated_at')->default(Carbon::now()->toDateTimeString());
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
