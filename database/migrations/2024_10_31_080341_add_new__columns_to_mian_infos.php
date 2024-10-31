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
        Schema::table('main_infos', function (Blueprint $table) {
            $table->string('provider');
            $table->string('cv');
            $table->date('birthday');
            $table->integer('contact_number');
            $table->string('email')->unique();
            $table->string('location')->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('main_infos', function (Blueprint $table) {
            //
        });
    }
};
