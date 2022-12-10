<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


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

        $calc_ratings_proc='
        -- PROCEDURE: internaldocs.io.calc_ratings(integer)

        -- Calculcated the average rating for each documentation

        DROP PROCEDURE IF EXISTS calc_ratings(integer);
        
        CREATE OR REPLACE PROCEDURE calc_ratings(
            p_app_id integer DEFAULT 1)
        LANGUAGE plpgsql
        AS $BODY$
            declare 
                r_doc record;
                l_avg float;
            begin 
                for r_doc in select * from apps_documents -- where app_id=r_apps.id
                loop
                delete from apps_documents_ratings_aggregated where document_id=r_doc.id;
                
                select avg(rating) into l_avg from apps_documents_ratings where document_id=r_doc.id;
                
                
                insert into apps_documents_ratings_aggregated(id,rating,document_id)
                values(gen_random_uuid ()  ,l_avg ,r_doc.id)	;
                end loop;
                commit;
        
            end;
            $BODY$;
        ';
        DB::unprepared($calc_ratings_proc);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists("apps_logs");
    }
};
