<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lottery_game_match_users', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->comment('Идентификатор пользователя')
                ->constrained(table: 'users');
            $table->foreignId('lottery_game_match_id')->comment('Идентификатор матча')
                ->constrained(table: 'lottery_game_matches');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lottery_game_match_users');
    }
};
