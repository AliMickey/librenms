<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('vrfs', function (Blueprint $table) {
            if (! Schema::hasColumn('vrfs', 'snmp_context')) {
                $table->string('snmp_context', 128)->nullable()->after('vrf_name');
            }
        });
    }

    public function down(): void
    {
        Schema::table('vrfs', function (Blueprint $table) {
            if (Schema::hasColumn('vrfs', 'snmp_context')) {
                $table->dropColumn('snmp_context');
            }
        });
    }
};
