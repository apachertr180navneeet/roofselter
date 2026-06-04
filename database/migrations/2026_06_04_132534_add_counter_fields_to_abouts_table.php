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
        Schema::table('abouts', function (Blueprint $table) {
            $table->string('counter1_number')->nullable()->after('status');
            $table->string('counter1_label')->nullable()->after('counter1_number');
            $table->string('counter2_number')->nullable()->after('counter1_label');
            $table->string('counter2_label')->nullable()->after('counter2_number');
            $table->string('counter3_number')->nullable()->after('counter2_label');
            $table->string('counter3_label')->nullable()->after('counter3_number');
            $table->string('counter4_number')->nullable()->after('counter3_label');
            $table->string('counter4_label')->nullable()->after('counter4_number');
        });
    }

    public function down(): void
    {
        Schema::table('abouts', function (Blueprint $table) {
            $table->dropColumn([
                'counter1_number', 'counter1_label',
                'counter2_number', 'counter2_label',
                'counter3_number', 'counter3_label',
                'counter4_number', 'counter4_label',
            ]);
        });
    }
};
