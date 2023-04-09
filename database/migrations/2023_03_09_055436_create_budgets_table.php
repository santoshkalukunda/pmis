<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained('projects')->cascadeOnUpdate()->cascadeOnDelete()->nullable();
            $table->foreignId('budget_source_id')->constrained('budget_sources')->cascadeOnUpdate()->cascadeOnDelete()->nullable();
            $table->foreignId('fiscal_year_id')->constrained('fiscal_years')->cascadeOnUpdate()->cascadeOnDelete()->nullable();
            $table->string('date')->nullable();
            $table->integer('budget')->nullable();
            $table->string('budget_subtitle')->nullable();
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
        Schema::dropIfExists('budgets');
    }
}
