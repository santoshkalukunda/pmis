<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstimatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained('projects')->cascadeOnUpdate()->cascadeOnDelete()->nullable();
            $table->foreignId('fiscal_year_id')->constrained('fiscal_years')->cascadeOnUpdate()->cascadeOnDelete()->nullable();
            $table->string('name');
            $table->string('unit');
            $table->float('rate');
            $table->float('quantity');
            $table->float('yearly_target_quantity')->nullable();
            $table->float('first_quarterly_target_quantity')->nullable();
            $table->float('second_quarterly_target_quantity')->nullable();
            $table->float('third_quarterly_target_quantity')->nullable();
            $table->float('fourth_quarterly_target_quantity')->nullable();

            $table->float('yearly_quantity')->nullable();
            $table->float('first_quarterly_quantity')->nullable();
            $table->float('second_quarterly_quantity')->nullable();
            $table->float('third_quarterly_quantity')->nullable();
            $table->float('fourth_quarterly_quantity')->nullable();

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
        Schema::dropIfExists('estimates');
    }
}
