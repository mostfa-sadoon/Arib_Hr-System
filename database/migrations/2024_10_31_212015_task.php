<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('emp_id')->unsigned()->nullable();
            $table->foreign('emp_id')->references('id')->on('employees')->onDelete('SET NULL');

            $table->bigInteger('created_by')->unsigned();
            $table->foreign('created_by')->references('id')->on('employees')->onDelete('restrict');

            $table->bigInteger('status_id')->unsigned()->nullable();
            $table->foreign('status_id')->references('id')->on('task_statuses')->onDelete('SET NULL');

            $table->string('title');
            $table->text('description');

            $table->dateTime('completed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
