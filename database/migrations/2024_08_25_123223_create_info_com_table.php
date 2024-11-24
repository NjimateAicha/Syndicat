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
        Schema::create('info_com', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('description');
            $table->timestamp('date_info')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('from_id')->nullable();
            $table->foreignId('residence_id')->constrained('residences')->onDelete('cascade'); // Relation avec residence
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
    Schema::dropIfExists('info_com');
}
};
