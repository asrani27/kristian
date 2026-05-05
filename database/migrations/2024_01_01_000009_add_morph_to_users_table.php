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
        Schema::table('users', function (Blueprint $table) {
            $table->string('usable_type')->nullable()->after('role');
            $table->unsignedBigInteger('usable_id')->nullable()->after('usable_type');
            $table->index(['usable_type', 'usable_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex(['usable_type', 'usable_id']);
            $table->dropColumn(['usable_type', 'usable_id']);
        });
    }
};
