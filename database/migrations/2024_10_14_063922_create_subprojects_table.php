<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('subprojects', function (Blueprint $table) {
            $table->id();
            $table->string('proponent');
            $table->string('cluster')->nullable();
            $table->string('region')->nullable();
            $table->string('province');
            $table->string('municipality');
            $table->string('barangay');
            $table->string('projectName');
            $table->string('projectType');
            $table->string('projectCategory');
            $table->string('fundSource')->nullable();
            $table->decimal('indicativeCost', 15, 2)->default(0.0)->nullable();
            $table->string('letterOfInterest')->nullable();
            $table->string('letterofRequest')->nullable();
            $table->string('letterofEndorsement')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subprojects');
    }
};
