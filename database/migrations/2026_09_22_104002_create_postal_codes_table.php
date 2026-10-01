<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('postal_codes', function (Blueprint $table) {
            $table->id();
            $table->string('postal_code', 10)->index();
            $table->string('urban_village');
            $table->string('sub_district');
            $table->string('district_city');
            $table->string('province');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('postal_codes');
    }
};
