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
            'next_url' => 'practice.play',
            'title' => 'Practice phase instructions',
            'text' => 'Practice instructions then user is redirected to "practice/play/{1}/{1}'
        ]);

        // start
        Instruction::create([
            'current_url' => 'instruction.start',
            'next_url' => 'form.consent',
            'title' => 'Welcome',
            'text' => 'Welcome in this study to human behavior. First of all, we want to thank you for participation!<br><br>This study consists of several blocks:<ul><li>Self-report questionnaire</li><li>Practice phase of a game</li><li>Playing a game (9 times)</li><li>Self-report questionnaire about a game (9 times)</li><li>End questions</li></ul>Before you start please fill in the consent form.'
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

        // form/consent
        Instruction::create([
            'current_url' => 'form.consent',
            'next_url' => 'form.demographics',
            'title' => 'Informed consent',
            'text' => 'Name of the study: Knowledge and Insight<br><br>You have been invited to participate in this study. Before you begin, we kindly ask you to read this form carefully and sign for consent.<br><br>Researchers:<br>Prof. Dr. J. J. A. Denissen (j.j.a.denissen@uvt.nl) <br>Department of Social Psychology and Department of Developmental Psychology Tilburg University<br><br>Background:The intention of this study is to research and gain knowledge of human behavior. Firstly, we would like to ask you to fill out a questionnaire about how you think about yourself. Subsequently, you will play a game. We are interested in how you make decisions during that game.<br> <br>Procedure:This study will take about 45 minutes. If you at any point wish to withdraw your consent and stop the study, you have the right to do so and will not be penalized. <br><br>Compensation:<br>For your participation you will receive the credit stated on Amazon Mechanical Turk.Confidentiality:<br>When your role with this project is complete, your data will be anonymized. From that time, there will be no record that links the data collected from you with any personal data from which you could be identified. Once anonymized, these data may be made available to researchers via accessible data repositories and possibly used for novel purposes.<br><br>If you have any questions during your participation, you can email the test leader (e.dietvorst@uvt.nl). If you have other questions regarding the study, you can contact the project leader prof. Dr. J. J. A. Denissen (j.j.a.denissen@uvt.nl)'
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
