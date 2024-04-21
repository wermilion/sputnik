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
        Schema::create('lottery_game_matches', function (Blueprint $table) {
            $table->id()->comment('Идентификатор матча');

            $table->foreignId('game_id')->comment('Идентификатор игры')
                ->constrained(table: 'lottery_games');
            $table->foreignId('winner_id')->comment('Идентификатор победителя')
                ->constrained(table: 'users');

            $table->date('start_date')->comment('Дата начала');
            $table->time('start_time')->comment('Время начала');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lottery_game_matches');
    }
};
