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


        // instructions.start
        Instruction::create([
            'current_url' => 'instruction.start',
            'next_url' => 'form.consent',
            'title' => 'Welcome',
            'text' => 'Welcome in this study to human behavior. First of all, we want to thank you for participation!<br><br>This study consists of several blocks:<ul><li>Self-report questionnaire</li><li>Practice phase of a game</li><li>Playing a game (9 times)</li><li>Self-report questionnaire about a game (9 times)</li><li>End questions</li></ul>Before you start please fill in the consent form.'
        ]);


        // form.consent
        Instruction::create([
            'current_url' => 'form.consent',
            'next_url' => 'form.demographics',
            'title' => 'Informed consent',
            'text' => 'Name of the study: Knowledge and Insight<br><br>You have been invited to participate in this study. Before you begin, we kindly ask you to read this form carefully and sign for consent.<br><br>Researchers:<br>Prof. Dr. J. J. A. Denissen (j.j.a.denissen@uvt.nl) <br>Department of Social Psychology and Department of Developmental Psychology Tilburg University<br><br>Background:The intention of this study is to research and gain knowledge of human behavior. Firstly, we would like to ask you to fill out a questionnaire about how you think about yourself. Subsequently, you will play a game. We are interested in how you make decisions during that game.<br> <br>Procedure:This study will take about 45 minutes. If you at any point wish to withdraw your consent and stop the study, you have the right to do so and will not be penalized. <br><br>Compensation:<br>For your participation you will receive the credit stated on Amazon Mechanical Turk.Confidentiality:<br>When your role with this project is complete, your data will be anonymized. From that time, there will be no record that links the data collected from you with any personal data from which you could be identified. Once anonymized, these data may be made available to researchers via accessible data repositories and possibly used for novel purposes.<br><br>If you have any questions during your participation, you can email the test leader (e.dietvorst@uvt.nl). If you have other questions regarding the study, you can contact the project leader prof. Dr. J. J. A. Denissen (j.j.a.denissen@uvt.nl)'
        ]);


        // form.demographics
        Instruction::create([
            'current_url' => 'form.demographics',
            'next_url' => 'form.questionnaire',
            'title' => 'Demographics',
            'text' => 'Please fill out the following questions about yourself:'
        ]);


        // form.questionnaire/{hexaco}
        Instruction::create([
            'current_url' => 'form.questionnaire',
            'next_url' => 'instruction.game-announcement',
            'title' => 'Questionnaire',
            'text' => 'On the following pages, you will find a series of statements about you. Please read each statement and decide how much you agree or disagree with that statement. Then indicate your response using the following scale:<ul>	<li>5 = strongly agree</li><li>4 = agree</li><li>3 = neutral (neither agree nor disagree)</li><li>2 = disagree</li><li>1 = strongly disagree</li></ul>Please answer every statement, even if you are not completely sure of your response.'
        ]);


        // instruction.game-announcement
        Instruction::create([
            'current_url' => 'instruction.announcement',
            'next_url' => 'instruction.practice',
            'title' => 'Games introduction',
            'text' => 'In this part of the study you are going to play a game with another player. The game consists of a practice phase and a game phase. In each round you both have to make a decision between two alternatives. You make the decision at the same time, so you will not know the choice of the other player while making your decision. The choice of both players together states the amount of money units you both deserve. In each game you will see a table with the amount of money units that are possible to earn in each situation.'
        ]);


        // instruction.practice
        Instruction::create([
            'current_url' => 'instruction.practice',
            'next_url' => 'practice.play',
            'title' => 'Practice game',
            'text' => 'You are about to play the practice phase with another player. The practice phase consists of three rounds. The money units you can earn in each situation are displayed in the table of each game.'
        ]);


        // playing here... <- practice/play/{gameNumber}/{phaseNumber} -> to instruction.condition


        // instruction.condition
        Instruction::create([
            'current_url' => 'instruction.condition',
            'next_url' => 'form.expectation',
            'title' => 'Game phase',
            'text' => 'You finished the practice phase and are about to start the game phase.<br><br>You are expected to play 9 games, each consisting of 10 rounds. After each game you are invited to answer questions about the game you played.<br><br>Please pay attention: there are little variations in each games, therefore always read the text and take a close look at the table before making a decision. <br><br>Good luck!'
        ]);


        // form.expectation
        Instruction::create([
            'current_url' => 'form.expectation',
            'next_url' => 'game.play',
            'title' => 'Expectations',
            'text' => 'How do you expect your opponent to behave throughout the games?'
        ]);


        // playing here... <- game/play/{gameNumber}/{phaseNumber} -> to form.game-question/{gameNumber}


        // form.game-question/{gameNumber}
        Instruction::create([
            'current_url' => 'form.game-question',
            'next_url' => 'instruction.new-game',
            'title' => 'Evaluation',
            'text' => 'Please indicate how much you agree or disagree with that statement using the following scale:<ul><li>5 = strongly agree</li><li>4 = agree</li><li>3 = neutral (neither agree nor disagree)</li><li>2 = disagree</li><li>1 = strongly disagree</li></ul>Please answer every statement, even if you are not completely sure of your response.'
        ]);


        // instruction.new-game/{gameNumber}
        Instruction::create([
            'current_url' => 'instruction.new-game',
            'next_url' => 'game.play',
            'title' => 'New game {gameNumber}',
            'text' => 'User finds out that a new game is about to start. Redirects to "game/play/{gameNumber}/{phaseNumber}"'
        ]);


        // last instruction.new-game/{gameNumber} will output that there are no games left


        // debriefing
        Instruction::create([
            'current_url' => 'instruction.debriefing',
            'next_url' => 'form.feedback',
            'title' => 'Debriefing',
            'text' => 'While playing this experiment you were told to play with another player. However, during the whole time this was a computer.<br><br>We find it important to debrief you about this because the reactions of the computer might have affected you, positively or negatively.<br><br>Now you know it was a computer, so you know you do not have to take these responses personal.'
        ]);


        // form/feedback
        Instruction::create([
            'current_url' => 'form.feedback',
            'next_url' => 'instruction.amazon-code',
            'title' => 'Feedback',
            'text' => 'Thank you for filling out the last questionnaire about the game you just played.<br><br>We kindly ask you to answer the following questions about our study.'
        ]);


        // amazon-code
        Instruction::create([
            'current_url' => 'instruction.amazon-code',
            'next_url' => 'instruction.start',
            'title' => 'Finish',
            'text' => 'Thank you for you participation. If you have any questions concerning this study please contact our test leader (e.dietvorst@uvt.nl).<br><br>Lastly, you automatically receive a random code in order to fill out on Amazon Mechanical Turk. This code is evidence that you participated and finished our study.<br><br>Your code is: {randomCode}.'
        ]);


        // in case he refused the consent

        // end
        Instruction::create([
            'current_url' => 'instruction.end',
            'next_url' => 'form.consent',
            'title' => 'Bye bye instructions',
            'text' => 'The user has landed on the ending page. Redirects to nowhere.'
        ]);


    }

}