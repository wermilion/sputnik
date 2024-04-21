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
        Schema::create('lottery_games', function (Blueprint $table) {
            $table->id()->comment('Идентификатор игры');

            $table->string('name')->comment('Название');
            $table->integer('gamer_count')->comment('Количество игроков');
            $table->integer('reward_points')->comment('Количество призовых очков');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lottery_games');
    }
};
