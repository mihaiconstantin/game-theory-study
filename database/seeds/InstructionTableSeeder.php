<?php

use App\Models\Instruction;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class InstructionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('instructions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        // amazon-code
        Instruction::create([
            'current_url' => 'instruction.amazon-code',
            'next_url' => 'instruction.start',
            'title' => 'Amazon code',
            'text' => 'Generating amazon code here and saying "bye-bye miss American Pie"'
        ]);

        // end-game/{gameNumber}
        Instruction::create([
            'current_url' => 'instruction.end-game',
            'next_url' => 'form.game-question',
            'title' => 'End of game {gameNumber}',
            'text' => 'Game {gameNumber} has just ended. The user will be redirected to "form/game-question/{gameNumber}"'
        ]);

        // game-overview-one
        Instruction::create([
            'current_url' => 'instruction.game-overview-one',
            'next_url' => 'instruction.practice',
            'title' => 'General instructions one',
            'text' => 'The user finds out that he is going to play a game and then he is redirected to "instruction/practice"'
        ]);

        // game-overview-two
        Instruction::create([
            'current_url' => 'instruction.game-overview-two',
            'next_url' => 'form.expectation',
            'title' => 'General instructions two',
            'text' => 'Final instruction before the games start. Redirects to "form/expectation"'
        ]);

        // new-game/{gameNumber}
        Instruction::create([
            'current_url' => 'instruction.new-game',
            'next_url' => 'game.play',
            'title' => 'New game {gameNumber}',
            'text' => 'User finds out that a new game is about to start. Redirects to "game/play/{gameNumber}/{phaseNumber}"'
        ]);

        // practice
        Instruction::create([
            'current_url' => 'instruction.practice',
            'next_url' => 'game.play',
            'title' => 'Practice phase instructions',
            'text' => 'Practice instructions then user is redirected to "game/play/{0}/{1}'
        ]);

        // start
        Instruction::create([
            'current_url' => 'instruction.start',
            'next_url' => 'form.demographics',
            'title' => 'Welcome instructions',
            'text' => 'The user has landed on the welcome page. Redirects to "form/demographics'
        ]);

        # # #

        // form/demographics
        Instruction::create([
            'current_url' => 'form.demographics',
            'next_url' => 'form.hexaco',
            'title' => 'Form demographics title',
            'text' => 'Form demographics instructions. Redirects to "form/personality'
        ]);

        // form/hexaco
        Instruction::create([
            'current_url' => 'form.hexaco',
            'next_url' => 'instruction.game-overview-one',
            'title' => 'Form hexaco title',
            'text' => 'Form hexaco instructions. Redirects to "form/game-overview-one'
        ]);

    }

}
