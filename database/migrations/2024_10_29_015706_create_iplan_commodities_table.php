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
        Schema::create('iplan_commodities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('checklistId')->constrained('iplan_checklists')->onDelete('cascade');
            $table->string('commodityName');
            $table->integer('userId');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iplan_commodities');
    }
};
