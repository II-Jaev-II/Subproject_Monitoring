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
        Schema::create('iplan_rank_and_composites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('checklistId')->constrained('iplan_checklists')->onDelete('cascade');
            $table->string('evsaRankMango')->nullable();
            $table->string('compositeIndexMango')->nullable();
            $table->string('evsaRankOnion')->nullable();
            $table->string('compositeIndexOnion')->nullable();
            $table->string('evsaRankGoat')->nullable();
            $table->string('compositeIndexGoat')->nullable();
            $table->string('evsaRankPeanut')->nullable();
            $table->string('compositeIndexPeanut')->nullable();
            $table->string('evsaRankTomato')->nullable();
            $table->string('compositeIndexTomato')->nullable();
            $table->string('evsaRankMungbean')->nullable();
            $table->string('compositeIndexMungbean')->nullable();
            $table->string('evsaRankBangus')->nullable();
            $table->string('compositeIndexBangus')->nullable();
            $table->string('evsaRankGarlic')->nullable();
            $table->string('compositeIndexGarlic')->nullable();
            $table->string('evsaRankCoffee')->nullable();
            $table->string('compositeIndexCoffee')->nullable();
            $table->string('evsaRankHogs')->nullable();
            $table->string('compositeIndexHogs')->nullable();
            $table->integer('userId');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iplan_rank_and_composites');
    }
};
