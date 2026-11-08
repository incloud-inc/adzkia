<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Isi username bagi user lama yang belum memiliki username
        $usersWithoutUsername = DB::table('users')
            ->whereNull('username')
            ->orWhere('username', '')
            ->select('id', 'name', 'email')
            ->get();

        foreach ($usersWithoutUsername as $user) {
            $source = $user->email ? explode('@', (string) $user->email)[0] : (string) $user->name;
            $uniqueUsername = User::generateUniqueUsername((string) $source, (int) $user->id);

            DB::table('users')
                ->where('id', $user->id)
                ->update(['username' => $uniqueUsername]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Operasi backfill data tidak perlu dibatalkan
    }
};
