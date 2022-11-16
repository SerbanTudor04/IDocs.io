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
    public function up()
    {
        Schema::create('apps_logs', function (Blueprint $table){
            $table->uuid('id')->primary();
            $table->text('message');
            $table->dateTime('logged_on')->nullable()->default(Carbon::now()->toDateTimeString());  
            $table->string('logged_by')->nullable()->default(Carbon::now()->toDateTimeString());  
            $table->integer('status_code');
            
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
