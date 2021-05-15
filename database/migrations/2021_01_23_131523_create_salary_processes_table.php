<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalaryProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary_processes', function (Blueprint $table) {
            $table->id();
            $table->year('salary_year');
            $table->integer('salary_month');
            $table->integer('employee_id');
            $table->double('salary_amount', 9, 2);
            $table->double('paid_amount', 9, 2);
            $table->double('due_amount', 9, 2);
            $table->date('salary_date');
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
        Schema::dropIfExists('salary_processes');
    }
}
