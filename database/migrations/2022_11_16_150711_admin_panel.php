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
        Schema::create('users_staff_groups', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('description');
            $table->integer('app_id')->default(1);
            $table->foreign('app_id')->references('id')->on('apps')->onDelete('cascade');
            $table->timestamps();

        });

        Schema::create('users_staff_groups_memberships', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('group_id');
            $table->foreign('group_id')->references('id')->on('users_staff_groups');
            $table->uuid('users_id');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('users_staff_groups_permissions',function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('description');
            $table->string('code')->index()->unique();
            $table->timestamps();


        });

        Schema::create('users_staff_groups_permissions_relation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('group_id');
            $table->foreign('group_id')->references('id')->on('users_staff_groups');
            $table->integer('permission_id');
            $table->foreign('permission_id')->references('id')->on('users_staff_groups_permissions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_staff_groups_permissions_relation');
        Schema::dropIfExists('users_staff_groups_permissions');
        Schema::dropIfExists('users_staff_groups_memberships');
        Schema::dropIfExists('users_staff_groups');

    }
};
