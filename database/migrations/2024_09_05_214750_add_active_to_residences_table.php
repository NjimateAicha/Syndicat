<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('residences', function (Blueprint $table) {
            $table->boolean('active')->default(0)->after('description'); // 0 means inactive by default
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('residences', function (Blueprint $table) {
            $table->dropColumn('active');
        });
    }
};
