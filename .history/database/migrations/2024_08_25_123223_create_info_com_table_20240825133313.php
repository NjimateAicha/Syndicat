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
            $table->timestamps();
        });
    }

   
    Schema::create('info_com', function (Blueprint $table) {
        $table->id();
        $table->string('titre');
        $table->text('description');
        $table->timestamp('date_info')->nullable();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->timestamps();
    });

    // Créer la table pivot pour les résidences liées aux informations
    Schema::create('info_com_residence', function (Blueprint $table) {
        $table->id();
        $table->foreignId('info_com_id')->constrained('info_com')->onDelete('cascade');
        $table->foreignId('residence_id')->constrained()->onDelete('cascade');
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
    Schema::dropIfExists('info_com_residence');
    Schema::dropIfExists('info_com');
}
};
