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
        Schema::create('Company', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->string('address');
            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id')->references('id')->on('Department')->onDelete('cascade');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Company');
    }
};
