<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('players', static function (Blueprint $table) {
            $table->string('image_url')->after('country_id')->nullable();
            $table->boolean('active')->after('position');
        });
    }

    public function down(): void
    {
        Schema::table('players', static function (Blueprint $table) {
            $table->dropColumn('image_url');
            $table->dropColumn('active');
        });
    }
};
