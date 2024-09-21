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
        Schema::create('followers', function (Blueprint $table) {
            $table->id();
            // in this case we dont need to put the table name Users inside the constrained because Laravel knows that we are referencing the table Users
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // we put inside the constrained the name of the table that we want to reference for a column that Laravel won't know to wich table is referencing
            $table->foreignId('follower_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('followers');
    }
};
