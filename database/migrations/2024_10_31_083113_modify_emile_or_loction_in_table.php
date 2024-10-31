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
            $table->dropUnique(['email']);  // إزالة القيد الفريد من عمود email
            $table->dropUnique(['location']); // إزالة القيد الفريد من عمود location
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('main_infos', function (Blueprint $table) {
            $table->unique('email');
            $table->unique('location');
        });
    }
};
