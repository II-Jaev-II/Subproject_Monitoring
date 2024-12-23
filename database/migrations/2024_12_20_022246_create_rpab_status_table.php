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
        Schema::create('rpab_status', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subprojectId');
            $table->string('iBUILD')->nullable();
            $table->string('iPLAN')->nullable();
            $table->string('iREAP')->nullable();
            $table->string('ECON')->nullable();
            $table->string('SES')->nullable();
            $table->string('GGU')->nullable();
            $table->timestamps();

            $table->foreign('subprojectId')->references('id')->on('subprojects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rpab_status');
    }
};
