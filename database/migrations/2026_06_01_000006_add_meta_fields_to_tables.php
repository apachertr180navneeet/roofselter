<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        $tables = ['services', 'blogs', 'abouts'];
        foreach ($tables as $table) {
            if (Schema::hasTable($table)) {
                Schema::table($table, function (Blueprint $t) use ($table) {
                    if (!Schema::hasColumn($table, 'meta_title')) {
                        $t->string('meta_title')->nullable()->after('status');
                    }
                    if (!Schema::hasColumn($table, 'meta_description')) {
                        $t->text('meta_description')->nullable()->after('meta_title');
                    }
                    if (!Schema::hasColumn($table, 'meta_keywords')) {
                        $t->text('meta_keywords')->nullable()->after('meta_description');
                    }
                });
            }
        }
    }

    public function down()
    {
        $tables = ['services', 'blogs', 'abouts'];
        foreach ($tables as $table) {
            if (Schema::hasTable($table)) {
                Schema::table($table, function (Blueprint $t) {
                    $t->dropColumn(['meta_title', 'meta_description', 'meta_keywords']);
                });
            }
        }
    }
};
