<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('teams', static function (Blueprint $table) {
            $table->string('description', 2500)->change();
            $table->string('image_url')->nullable()->change();
            $table->softDeletes();
        });
    }
    public function down(): void
    {
        //
    }
};
