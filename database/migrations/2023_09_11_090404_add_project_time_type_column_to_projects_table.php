<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProjectTimeTypeColumnToProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('project_time_type')->nullable();
            $table->string('time_period')->nullable();
            $table->string('contract_number')->nullable();
            $table->string('contractor_name')->nullable();
            $table->string('contractor_address')->nullable();
            $table->string('contractor_contact')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('project_time_type');
            $table->dropColumn('time_period');
            $table->dropColumn('contract_number');
            $table->dropColumn('contractor_name');
            $table->dropColumn('contractor_address');
            $table->dropColumn('contractor_contact');
            
        });
    }
}
