<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

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
            $table->unsignedBigInteger('project_type_id')->nullable();
            $table->foreign('project_type_id')->references('id')->on('project_types')->onDelete('cascade')->onUpdate('cascade');
            $table->string('municipality')->nullable();
            $table->string('district')->nullable();
            $table->string('ward_no')->nullable();
            $table->foreignId('fiscal_year_id')->constrained('fiscal_years')->cascadeOnUpdate()->cascadeOnDelete()->nullable();
            $table->string('budget_subtitle')->nullable();
            $table->string('budget')->nullable();
            $table->string('expenditure_subtitle')->nullable();
            $table->string('population_to_be_benefited')->nullable();
            $table->string('tender_amount')->nullable();
            $table->string('agreement_date')->nullable();
            $table->string('project_start_date')->nullable();
            $table->string('physical_progress')->nullable();
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
