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


        #region standalone instructions

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
            'next_url' => 'form.consent',
            'title' => 'Welcome instructions',
            'text' => 'The user has landed on the welcome page. Redirects to "form/consent'
        ]);

        // end
        Instruction::create([
            'current_url' => 'instruction.end',
            'next_url' => 'form.consent',
            'title' => 'Bye bye instructions',
            'text' => 'The user has landed on the ending page. Redirects to nowhere.'
        ]);


        #endregion


        #region form instructions

        // form/demographics
        Instruction::create([
            'current_url' => 'form.consent',
            'next_url' => 'form.demographics',
            'title' => 'Form consent title',
            'text' => 'Form consent instructions. Redirects to "form/demographics"'
        ]);

        // form/demographics
        Instruction::create([
            'current_url' => 'form.demographics',
            'next_url' => 'form.personality',
            'title' => 'Form demographics title',
            'text' => 'Form demographics instructions. Redirects to "form/personality"'
        ]);

        // form/personality
        Instruction::create([
            'current_url' => 'form.personality',
            'next_url' => 'instruction.game-overview-one',
            'title' => 'Form hexaco title',
            'text' => 'Form hexaco instructions (or whatever questionnaire will be used). Redirects to "form/game-overview-one'
        ]);

        // form/expectation
        Instruction::create([
            'current_url' => 'form.expectation',
            'next_url' => 'game.play',
            'title' => 'Form expectation title',
            'text' => 'Form expectation instructions. Redirects to "game/play/{9}/{9}"'
        ]);

        // form/feedback
        Instruction::create([
            'current_url' => 'form.feedback',
            'next_url' => 'instruction.amazon-code',
            'title' => 'Form feedback title',
            'text' => 'Form feedback instructions. Redirects to "instruction/amazon-code"'
        ]);

        // form/game-question/(gameNumber)
        Instruction::create([
            'current_url' => 'form.game-question',
            'next_url' => 'instruction.new-game',
            'title' => 'Form game-question/{gameNumber} title',
            'text' => 'Form game-question/{gameNumber} instructions. Redirects to "instruction/new-game/{gameNumber}"'
        ]);

        #endregion


    }

}
