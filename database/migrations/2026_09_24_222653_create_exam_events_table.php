<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('exam_events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exam_session_id')->constrained('exam_sessions')->cascadeOnDelete();

            /**
             * Anti-cheat event types:
             * tab_switch       - Siswa berpindah tab / jendela lain
             * focus_lost       - Window menjadi tidak aktif (blur)
             * fullscreen_exit  - Keluar dari mode layar penuh
             * offline          - Koneksi internet terputus
             * online           - Koneksi internet kembali
             * paste_detected   - Tindakan paste terdeteksi
             * idle_warning     - Tidak ada aktivitas dalam X menit
             * resume           - Melanjutkan sesi setelah jeda
             * submit_attempt   - Percobaan kumpulkan
             */
            $table->string('event_type', 50);
            $table->json('payload')->nullable(); // Data tambahan (URL, element, dsb)
            $table->string('ip', 45)->nullable();
            $table->timestamp('occurred_at')->useCurrent();

            $table->index(['exam_session_id', 'event_type']);
            $table->index('occurred_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exam_events');
    }
};
