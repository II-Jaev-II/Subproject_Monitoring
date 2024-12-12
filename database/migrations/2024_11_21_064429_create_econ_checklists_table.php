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
        Schema::create('econ_checklists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userId');
            $table->unsignedBigInteger('subprojectId');
            $table->date('reviewDate');
            $table->text('summary');
            $table->string('status');
            $table->string('econReport')->nullable();
            $table->timestamps();

            $table->foreign('subprojectId')->references('id')->on('subprojects')->onDelete('cascade');
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('econ_checklists');
    }
};
