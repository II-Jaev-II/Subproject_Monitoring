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
        Schema::table('subprojects', function (Blueprint $table) {
            $table->string('iPLAN')->after('report');
            $table->string('iPLANRemarks')->after('iPLAN');
            $table->string('iBUILD')->after('iPLANRemarks');
            $table->string('iBUILDRemarks')->after('iBUILD');
            $table->string('econ')->after('iBUILDRemarks');
            $table->string('econRemarks')->after('econ');
            $table->string('ses')->after('econRemarks');
            $table->string('sesRemarks')->after('ses');
            $table->string('ggu')->after('sesRemarks');
            $table->string('gguRemarks')->after('ggu');
            $table->string('compliance')->after('gguRemarks');
            $table->string('complianceRemarks')->after('compliance');
            $table->string('finance')->after('complianceRemarks');
            $table->string('financeRemarks')->after('finance');
            $table->string('procurement')->after('financeRemarks');
            $table->string('procurementRemarks')->after('procurement');
            $table->integer('total')->after('procurementRemarks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subprojects', function (Blueprint $table) {});
    }
};
