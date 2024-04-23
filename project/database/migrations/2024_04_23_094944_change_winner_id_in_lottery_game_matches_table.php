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
        Schema::table('lottery_game_matches', function (Blueprint $table) {
            $table->dropForeign(['winner_id']);

            $table->foreignId('winner_id')->nullable()->change()->comment('Идентификатор победителя')
                ->constrained(table: 'users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lottery_game_matches', function (Blueprint $table) {
            $table->dropColumn('winner_id');

            $table->foreignId('winner_id')->change()->comment('Идентификатор победителя')
                ->constrained(table: 'users');
        });
    }
};
