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
        Schema::table('subjects', function (Blueprint $table) {
            $table->unsignedBigInteger('lecturer_id')->default(3); // Gantilah 1 dengan id dosen default yang sesuai
            $table->string('semester')->after('lecturer_id')->default('semester 3');
            $table->string('academic_year')->after('semester')->default('2022');
            $table->string('sks')->after('academic_year')->default('8');
            $table->string('code')->after('sks')->nullable();
            $table->string('description')->default('ini merupakan descripsi');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subjects', function (Blueprint $table) {
            $table->dropColumn('semester');
            $table->dropColumn('academic_year');
            $table->dropColumn('sks');
            $table->dropColumn('code');
            $table->dropColumn('description');
        });
    }
};
