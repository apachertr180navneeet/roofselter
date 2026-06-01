<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {
            if (!Schema::hasColumn('contacts', 'is_read')) {
                $table->boolean('is_read')->default(0)->after('status');
            }
            $table->string('service_required')->nullable()->after('email');
            $table->string('property_address')->nullable()->after('service_required');
            $table->string('enquiry_status')->default('new')->after('is_read');
        });
    }

    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn(['is_read', 'service_required', 'property_address', 'enquiry_status']);
        });
    }
};
