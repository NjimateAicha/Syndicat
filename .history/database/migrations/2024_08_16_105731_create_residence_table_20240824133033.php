<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Schema::create('residences', function (Blueprint $table) {
        //     $table->id(); // Creates an auto-incrementing primary key column named 'id'
        //     $table->string('nomResidence'); // Creates a string column named 'nomResidence'
        //     $table->text('description');
        //     $table->timestamps(); // Adds created_at and updated_at columns
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residences'); // Drops the table if it exists
    }
};
