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
        Schema::create('iplan_checklists', function (Blueprint $table) {
            $table->id();
            $table->string('explanation')->nullable();
            $table->string('justificationFile')->nullable();
            $table->string('linkedVca');
            $table->string('valueChainSegment')->nullable();
            $table->string('opportunity')->nullable();
            $table->string('specificIntervention')->nullable();
            $table->string('pageMatrixVca')->nullable();
            $table->string('pcip')->nullable();
            $table->string('pageMatrixPcip')->nullable();
            $table->string('sensitivity');
            $table->string('exposure');
            $table->string('adaptiveCapacity');
            $table->string('overallVulnerability');
            $table->string('recommendation');
            $table->string('generalRecommendation')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iplan_checklists');
    }
};
