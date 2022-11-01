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
        Schema::create('apps_links', function (Blueprint $table) {
            $table->integer('id')->primaryKey();
            $table->integer('app_id')->foreign('app_id')->references('id')->on('apps')->onDelete('cascade');
            $table->string('name');
            $table->string('url')->nullable();
            $table->string('icon')->nullable();
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
