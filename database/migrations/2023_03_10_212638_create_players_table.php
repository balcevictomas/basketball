<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('players', static function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->unsignedInteger('country_id');
            $table->unsignedInteger('team');
            $table->unsignedInteger('number')->nullable();
            $table->unsignedInteger('position')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
