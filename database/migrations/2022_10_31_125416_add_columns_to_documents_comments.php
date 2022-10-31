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
        Schema::table('documents_comments', function (Blueprint $table) {
            $table->dateTime('created_at')->default(Carbon::now()->toDateTimeString());
            $table->dateTime('updated_at')->default(Carbon::now()->toDateTimeString());
            // $table->uuid('created_by');
            // $table->uuid('updated_by');
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documents_comments', function (Blueprint $table) {
            $table->integer('created_by')->nullable()->default(12);
            $table->integer('updated_by')->nullable()->default(12);
            //
        });
    }
};
