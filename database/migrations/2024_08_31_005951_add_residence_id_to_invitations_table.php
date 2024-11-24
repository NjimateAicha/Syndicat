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
        Schema::table('invitations', function (Blueprint $table) {
            $table->unsignedBigInteger('residence_id')->after('role')->nullable();

            // If you have a residences table, you can add a foreign key constraint
            $table->foreign('residence_id')->references('id')->on('residences')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('invitations', function (Blueprint $table) {
            $table->dropForeign(['residence_id']);
            $table->dropColumn('residence_id');
        });
    }
};
