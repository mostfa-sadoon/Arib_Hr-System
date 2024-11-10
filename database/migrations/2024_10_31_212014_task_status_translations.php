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
        Schema::create('task_status_translations', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('status_id')->unsigned();
            $table->string('locale')->index();
            $table->string('name');

            $table->unique(['status_id', 'locale']);
            $table->foreign('status_id')->references('id')->on('task_statuses')->onDelete('cascade');


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
