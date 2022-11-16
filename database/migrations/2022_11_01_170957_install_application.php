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
        Schema::create('apps', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->dateTime('created_at')->nullable()->default(Carbon::now()->toDateTimeString());
            $table->dateTime('updated_at')->nullable()->default(Carbon::now()->toDateTimeString());
        });

        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->binary('image')->nullable();
            $table->integer('app_id')->default(1);
            $table->foreign('app_id')->references('id')->on('apps')->onDelete('cascade');
            $table->boolean('is_staff')->default(false);
        });

        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->foreign('email')->references('email')->on('users')->onDelete('cascade');
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });

        Schema::create('apps_documents',function(Blueprint $table){
            $table->uuid('id')->primary();
            $table->string('name');
            $table->longText('content')->nullable()->default('text');
            $table->uuid('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->dateTime('created_at')->nullable()->default(Carbon::now()->toDateTimeString());
            $table->uuid('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->dateTime('updated_at')->nullable()->default(Carbon::now()->toDateTimeString());
            $table->string('short_description');
        });

        Schema::create('apps_documents_comments',function(Blueprint $table){
            $table->uuid('id')->nullable();
            $table->longText('content')->nullable()->default('text');
            $table->uuid('created_by')->nullable();
            $table->uuid('updated_by')->nullable();
            $table->uuid('document_id');
            $table->foreign('document_id')->references('id')->on('apps_documents')->onDelete('cascade');
            $table->uuid('users_id');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->dateTime('updated_at')->nullable()->default(Carbon::now()->toDateTimeString());
            $table->dateTime('created_at')->nullable()->default(Carbon::now()->toDateTimeString());

        });

        Schema::create('apps_documents_attachements',function(Blueprint $table){
            $table->uuid('id')->primary();
            $table->longText('content')->nullable()->default('text');
            $table->string('mime_type')->nullable();
            $table->string('file_name')->nullable();
            $table->integer('file_zile')->nullable();
            $table->uuid('created_by')->nullable();
            $table->uuid('updated_by')->nullable();
            $table->uuid('document_id');
            $table->foreign('document_id')->references('id')->on('apps_documents')->onDelete('cascade');

        });
        Schema::create('apps_documents_ratings',function(Blueprint $table){
            $table->uuid('id')->primary();
            $table->longText('content')->nullable()->default('text');
            $table->integer('rating')->nullable()->default(5);
            $table->uuid('created_by')->nullable();
            $table->uuid('updated_by')->nullable();
            $table->uuid('document_id');
            $table->foreign('document_id')->references('id')->on('apps_documents')->onDelete('cascade');
            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users');

        });
        Schema::create('apps_documents_ratings_aggregated',function(Blueprint $table){
            $table->uuid('id')->primary();
            $table->longText('content')->nullable()->default('text');
            $table->decimal('rating')->nullable()->default(5);
            $table->uuid('created_by')->nullable();
            $table->uuid('updated_by')->nullable();
            $table->uuid('document_id');
            $table->foreign('document_id')->references('id')->on('apps_documents')->onDelete('cascade');

        });

        Schema::create('apps_links', function (Blueprint $table) {
            $table->integer('id')->primaryKey();
            $table->integer('app_id')->foreign('app_id')->references('id')->on('apps')->onDelete('cascade');
            $table->string('name');
            $table->string('url')->nullable();
            $table->string('icon')->nullable();
            $table->dateTime('created_at')->default(Carbon::now()->toDateTimeString());
            $table->dateTime('updated_at')->default(Carbon::now()->toDateTimeString());
        });

        Schema::create('apps_documents_searches', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->integer('count')->default(0);
            $table->uuid('created_by')->nullable();
            $table->uuid('updated_by')->nullable();
            $table->dateTime('created_at')->default(Carbon::now()->toDateTimeString());
            $table->dateTime('updated_at')->default(Carbon::now()->toDateTimeString());
        }); 

        Schema::create('apps_documents_clicks', function (Blueprint $table) {
            $table->id();
            $table->uuid('document_id')->index();
            $table->foreign('document_id')->references('id')->on('apps_documents');
            $table-> uuid('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('password_resets');
        Schema::dropIfExists('failed_jobs');
        Schema::dropIfExists('personal_access_tokens');
        Schema::dropIfExists('apps_documents_comments');
        Schema::dropIfExists('apps_documents_attachements');
        Schema::dropIfExists('apps_documents_ratings_aggregated');
        Schema::dropIfExists('apps_documents_ratings');
        Schema::dropIfExists('apps_documents_searches');
        Schema::dropIfExists('apps_documents_clicks');
        Schema::dropIfExists('apps_documents');
        Schema::dropIfExists('users');
        Schema::dropIfExists('apps_links');
        Schema::dropIfExists('apps');
        
        
    }
};
