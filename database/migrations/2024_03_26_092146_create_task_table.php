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
        Schema::create('task', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('Project')->onDelete('cascade');
            $table->unsignedBigInteger('person_id');
            $table->foreign('person_id')->references('id')->on('Person')->onDelete('cascade');
            $table->date('start_time');
            $table->date('end_time');
            $table->string('priority');
            $table->string('name');
            $table->string('description');
            $table->string('status');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task');
    }
};
