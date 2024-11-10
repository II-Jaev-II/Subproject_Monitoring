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
        Schema::table('subprojects', function (Blueprint $table) {
            $table->string('iPLAN')->after('letterOfEndorsement')->nullable();
            $table->string('iPLANRemarks')->after('iPLAN')->nullable();
            $table->string('iBUILD')->after('iPLANRemarks')->nullable();
            $table->string('iBUILDRemarks')->after('iBUILD')->nullable();
            $table->string('econ')->after('iBUILDRemarks')->nullable();
            $table->string('econRemarks')->after('econ')->nullable();
            $table->string('ses')->after('econRemarks')->nullable();
            $table->string('sesRemarks')->after('ses')->nullable();
            $table->string('ggu')->after('sesRemarks')->nullable();
            $table->string('gguRemarks')->after('ggu')->nullable();
            $table->integer('total')->after('gguRemarks')->default(0)->nullable();
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
