<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->foreignId('office_id')->constrained('offices')->cascadeOnUpdate()->cascadeOnDelete()->nullable();
            $table->foreignId('project_type_id')->constrained('project_types')->cascadeOnUpdate()->cascadeOnDelete()->nullable();
            $table->string('municipality')->nullable();
            $table->string('district')->nullable();
            $table->string('ward_no')->nullable();
            $table->foreignId('fiscal_year_id')->constrained('fiscal_years')->cascadeOnUpdate()->cascadeOnDelete()->nullable();
            $table->integer('budget')->nullable();
            $table->string('population_to_be_benefited')->nullable();
            $table->string('tender_amount')->nullable();
            $table->string('agreement_date')->nullable();
            $table->string('project_start_date')->nullable();
            $table->integer('physical_progress')->nullable();
            $table->boolean('status')->default(false);
            $table->string('project_completion_date')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
