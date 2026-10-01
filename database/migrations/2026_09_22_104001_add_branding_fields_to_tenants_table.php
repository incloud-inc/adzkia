<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tenants', function (Blueprint $table) {
            $table->string('tagline')->nullable()->after('plan');
            $table->string('logo_path', 2048)->nullable()->after('tagline');
            $table->string('favicon_path', 2048)->nullable()->after('logo_path');
            $table->string('cover_photo_path', 2048)->nullable()->after('favicon_path');
            $table->json('settings')->nullable()->after('cover_photo_path');
        });
    }

    public function down(): void
    {
        Schema::table('tenants', function (Blueprint $table) {
            $table->dropColumn([
                'tagline',
                'logo_path',
                'favicon_path',
                'cover_photo_path',
                'settings',
            ]);
        });
    }
};
