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
        Schema::create('Person', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('gender');
            $table->date('birthdate');
            $table->string('phone_number');
            $table->string('address');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('User')->onDelete('cascade');
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('Company')->onDelete('cascade');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Person');
    }
};
