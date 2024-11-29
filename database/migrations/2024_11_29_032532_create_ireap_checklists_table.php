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
        Schema::create('ireap_checklists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userId');
            $table->unsignedBigInteger('subprojectId');
            $table->date('reviewDate');
            $table->string('registeredAgency')->nullable();
            $table->string('authenticatedCopy')->nullable();
            $table->string('byLaws')->nullable();
            $table->string('certificateOfRegistration')->nullable();
            $table->string('certificateRegistry')->nullable();
            $table->string('certificates')->nullable();
            $table->string('accomplishmentReports')->nullable();
            $table->string('photographs')->nullable();
            $table->string('existingOrganizationalStructure')->nullable();
            $table->string('secretaryCertificate')->nullable();
            $table->string('fcaMembersProfile')->nullable();
            $table->string('photocopyReceipt')->nullable();
            $table->string('latestFinancialReport')->nullable();
            $table->string('swornAffidavit')->nullable();
            $table->string('moa')->nullable();
            $table->string('releaseOfFunds')->nullable();
            $table->string('priorityCommodity')->nullable();
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
        Schema::dropIfExists('ireap_checklists');
    }
};
