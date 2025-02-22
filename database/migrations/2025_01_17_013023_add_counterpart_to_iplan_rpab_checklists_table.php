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
        Schema::table('iplan_rpab_checklists', function (Blueprint $table) {
            $table->string('counterpart')->after('percentageAccomplishment');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('iplan_rpab_checklists', function (Blueprint $table) {
            //
        });
    }
};
