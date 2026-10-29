<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SystemSetting extends Model
{
    protected $fillable = [
        'key',
        'value',
    ];

    /**
     * Ambil nilai pengaturan dari cache/database.
     */
    public static function get(string $key, ?string $default = null): ?string
    {
        try {
            $all = self::allSettings();

            return $all[$key] ?? $default;
        } catch (\Throwable $e) {
            return $default;
        }
    }

    /**
     * Simpan atau perbarui nilai pengaturan.
     */
    public static function set(string $key, ?string $value): void
    {
        try {
            self::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
            Cache::forget('system:settings:all');
        } catch (\Throwable $e) {
            report($e);
        }
    }

    /**
     * Simpan banyak pengaturan sekaligus.
     *
     * @param  array<string, ?string>  $settings
     */
    public static function setMany(array $settings): void
    {
        try {
            foreach ($settings as $key => $value) {
                self::updateOrCreate(
                    ['key' => $key],
                    ['value' => $value]
                );
            }
            Cache::forget('system:settings:all');
        } catch (\Throwable $e) {
            report($e);
        }
    }

    /**
     * Ambil seluruh pengaturan dalam satu query ter-cache.
     *
     * @return array<string, ?string>
     */
    public static function allSettings(): array
    {
        try {
            return Cache::remember('system:settings:all', 86400, function () {
                return self::pluck('value', 'key')->toArray();
            });
        } catch (\Throwable $e) {
            return [];
        }
    }
}
