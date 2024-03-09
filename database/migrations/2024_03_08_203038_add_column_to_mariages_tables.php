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
        Schema::table('mariages', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Femme::class)
                ->constrained()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mariages_tables', function (Blueprint $table) {
            $table->dropForeignIdFor(\App\Models\Femme::class);
        });
    }
};
