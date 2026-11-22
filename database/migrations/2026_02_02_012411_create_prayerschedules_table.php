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
        Schema::create('prayerschedules', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('subuh');
            $table->string('dhuha');
            $table->string('dzuhur');
            $table->string('ashar');
            $table->string('maghrib');
            $table->string('isya');
            $table->string('dzikirtadarus');
             $table->enum('status', ['active','inactive']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prayerschedules');
    }
};
