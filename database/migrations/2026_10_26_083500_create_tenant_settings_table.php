<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (! Schema::hasTable('tenant_settings')) {
            Schema::create('tenant_settings', function (Blueprint $table) {
                $table->id();
                $table->foreignId('tenant_id')->unique()->constrained('tenants')->cascadeOnDelete();

                // Jenjang Pendidikan yang Diaktifkan (Indexed / Boolean)
                $table->boolean('show_grade_sd')->default(true);
                $table->boolean('show_grade_smp')->default(true);
                $table->boolean('show_grade_sma')->default(true);
                $table->boolean('show_grade_tka_sd')->default(true);
                $table->boolean('show_grade_tka_smp')->default(true);
                $table->boolean('show_grade_tka_sma')->default(true);
                $table->boolean('show_grade_utbk')->default(true);
                $table->boolean('show_grade_skd')->default(true);

                // Branding & Whitelabel
                $table->boolean('hide_adzkia_branding')->default(true);
                $table->string('app_name')->nullable();
                $table->string('theme_color', 50)->nullable();
                $table->string('theme_palette', 50)->default('light');
                $table->string('sender_email')->nullable();
                $table->string('sender_name')->nullable();
                $table->string('certificate_title')->nullable();
                $table->string('certificate_subtitle')->nullable();

                // Katalog Asesmen Adzkia yang Diaktifkan (Khusus Enterprise)
                $table->json('adzkia_assessments_enabled')->nullable();

                // Pengaturan Tambahan / Fleksibel Lainnya
                $table->json('extra_settings')->nullable();

                $table->timestamps();

                $table->index(['tenant_id', 'show_grade_sd', 'show_grade_smp', 'show_grade_sma']);
            });
        }

        // Migrasi Data Eksisting dari kolom tenants.settings ke tenant_settings
        $tenants = DB::table('tenants')->get();
        foreach ($tenants as $tenant) {
            $settings = [];
            if (! empty($tenant->settings)) {
                $decoded = json_decode($tenant->settings, true);
                if (is_array($decoded)) {
                    $settings = $decoded;
                }
            }

            $alreadyExists = DB::table('tenant_settings')->where('tenant_id', $tenant->id)->exists();
            if (! $alreadyExists) {
                DB::table('tenant_settings')->insert([
                    'tenant_id' => $tenant->id,
                    'show_grade_sd' => (bool) ($settings['show_grade_sd'] ?? true),
                    'show_grade_smp' => (bool) ($settings['show_grade_smp'] ?? true),
                    'show_grade_sma' => (bool) ($settings['show_grade_sma'] ?? true),
                    'show_grade_tka_sd' => (bool) ($settings['show_grade_tka_sd'] ?? true),
                    'show_grade_tka_smp' => (bool) ($settings['show_grade_tka_smp'] ?? true),
                    'show_grade_tka_sma' => (bool) ($settings['show_grade_tka_sma'] ?? true),
                    'show_grade_utbk' => (bool) ($settings['show_grade_utbk'] ?? true),
                    'show_grade_skd' => (bool) ($settings['show_grade_skd'] ?? true),
                    'hide_adzkia_branding' => (bool) ($settings['hide_adzkia_branding'] ?? true),
                    'app_name' => $settings['app_name'] ?? null,
                    'theme_color' => $settings['theme_color'] ?? null,
                    'theme_palette' => $settings['theme_palette'] ?? 'light',
                    'sender_email' => $settings['sender_email'] ?? null,
                    'sender_name' => $settings['sender_name'] ?? null,
                    'certificate_title' => $settings['certificate_title'] ?? null,
                    'certificate_subtitle' => $settings['certificate_subtitle'] ?? null,
                    'adzkia_assessments_enabled' => isset($settings['adzkia_assessments_enabled']) ? json_encode($settings['adzkia_assessments_enabled']) : null,
                    'extra_settings' => ! empty($settings) ? json_encode($settings) : null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenant_settings');
    }
};
