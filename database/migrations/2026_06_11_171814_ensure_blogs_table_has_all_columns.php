<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            if (!Schema::hasColumn('blogs', 'location')) {
                $table->string('location')->nullable()->after('image');
            }
            if (!Schema::hasColumn('blogs', 'service_type')) {
                $table->string('service_type')->nullable()->after('location');
            }
            if (!Schema::hasColumn('blogs', 'completion_date')) {
                $table->date('completion_date')->nullable()->after('service_type');
            }
            if (!Schema::hasColumn('blogs', 'meta_title')) {
                $table->string('meta_title')->nullable()->after('status');
            }
            if (!Schema::hasColumn('blogs', 'meta_description')) {
                $table->text('meta_description')->nullable()->after('meta_title');
            }
            if (!Schema::hasColumn('blogs', 'meta_keywords')) {
                $table->text('meta_keywords')->nullable()->after('meta_description');
            }
        });
    }

    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $columns = ['location', 'service_type', 'completion_date', 'meta_title', 'meta_description', 'meta_keywords'];
            foreach ($columns as $column) {
                if (Schema::hasColumn('blogs', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
