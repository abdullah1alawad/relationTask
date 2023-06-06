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
        if(!Schema::hasTable('families')) {
            Schema::create('families', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('nationalId');
                $table->string('phone');
                $table->unsignedBigInteger('city_id')->nullable();
                $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
                $table->unique(['nationalId']);
                $table->timestamps();
            });
        }
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('families');
    }
};
