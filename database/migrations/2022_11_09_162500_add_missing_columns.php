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
        //
        Schema::table('apps_documents_ratings', function (Blueprint $table) {
            $table->dateTime('updated_at')->nullable()->default(Carbon::now()->toDateTimeString());
            $table->dateTime('created_at')->nullable()->default(Carbon::now()->toDateTimeString());
            
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
