<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  
    /**
     * Reverse the migrations.
     */
   
    public function up(): void
    {
        Schema::table('parameters', function (Blueprint $table) {
            $table->text('json_file_content')->nullable(); // Store the content of the JSON file
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('parameters', function (Blueprint $table) {
            $table->dropColumn('json_file_content');
        });
    }
};
