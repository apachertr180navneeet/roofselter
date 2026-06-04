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
        Schema::table('services', function (Blueprint $table) {
            $table->string('subtitle')->nullable()->after('short_description');
            $table->string('subtitle2')->nullable()->after('subtitle');
            $table->string('features_headings')->nullable()->after('subtitle2');
            $table->longText('features_short_description')->nullable()->after('features_headings');
            $table->string('benefits_headings')->nullable()->after('features_short_description');
            $table->longText('benefits_short_description')->nullable()->after('benefits_headings');
            $table->string('essentials_headings')->nullable()->after('benefits_short_description');
            $table->longText('essentials_short_description')->nullable()->after('essentials_headings');
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn([
                'subtitle',
                'subtitle2',
                'features_headings',
                'features_short_description',
                'benefits_headings',
                'benefits_short_description',
                'essentials_headings',
                'essentials_short_description',
            ]);
        });
    }
};
