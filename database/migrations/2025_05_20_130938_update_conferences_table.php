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
        Schema::table('conferences', function (Blueprint $table) {
            if (!Schema::hasColumn('conferences', 'title')) {
                $table->string('title');
            }
            if (!Schema::hasColumn('conferences', 'description')) {
                $table->text('description');
            }
            if (!Schema::hasColumn('conferences', 'date')) {
                $table->dateTime('date');
            }
            if (!Schema::hasColumn('conferences', 'location')) {
                $table->string('location');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('conferences', function (Blueprint $table) {
            $table->dropColumn(['title', 'description', 'date', 'location']);
        });
    }
};
