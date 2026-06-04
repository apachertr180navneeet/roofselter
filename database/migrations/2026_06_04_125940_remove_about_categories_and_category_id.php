<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('about_categories');

        Schema::table('abouts', function (Blueprint $table) {
            $table->dropColumn('category_id');
        });
    }

    public function down(): void
    {
        Schema::create('about_categories', function (Blueprint $table) {
            $table->id();
            $table->string('category_name');
            $table->string('slug');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });

        Schema::table('abouts', function (Blueprint $table) {
            $table->integer('category_id')->nullable()->after('title');
        });
    }
};
