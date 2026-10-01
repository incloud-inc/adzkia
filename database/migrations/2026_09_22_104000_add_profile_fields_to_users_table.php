<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->unique()->nullable()->after('email');
            $table->string('whatsapp_number')->nullable()->after('email_verified_at');
            $table->timestamp('whatsapp_verified_at')->nullable()->after('whatsapp_number');
            $table->string('postal_code')->nullable()->after('whatsapp_verified_at');
            $table->text('address')->nullable()->after('postal_code');
            $table->string('profile_photo_path', 2048)->nullable()->after('address');
            $table->string('cover_photo_path', 2048)->nullable()->after('profile_photo_path');
            $table->string('bio', 255)->nullable()->after('cover_photo_path');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'username',
                'whatsapp_number',
                'whatsapp_verified_at',
                'postal_code',
                'address',
                'profile_photo_path',
                'cover_photo_path',
                'bio',
            ]);
        });
    }
};
