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
        Schema::create('subproject_commodities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subprojectId');
            $table->string('commodity')->nullable();
            $table->timestamps();

            $table->foreign('subprojectId')->references('id')->on('subprojects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subproject_commodities');
    }
};
