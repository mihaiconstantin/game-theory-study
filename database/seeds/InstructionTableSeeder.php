<?php

use App\Models\Instruction;
use Illuminate\Database\Seeder;


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
            'text' => 'Welcome in this study to human behavior. First of all, we want to thank you for participation!<br><br>This study consists of several blocks:<ul><li>Self-report questionnaire</li><li>Practice phase of a game</li><li>Playing 9 games, each with 10 rounds</li><li>Self-report questionnaire about a game (9 times)</li><li>End questions</li></ul>Before you start please fill in the informed consent form.'
        ]);


        // form.consent
        Instruction::create([
            'current_url' => 'form.consent',
            'next_url' => 'form.demographics',
            'title' => 'Informed consent',
            'text' => '<b>Name of the study:</b> Knowledge and Insight<br><br>You have been invited to participate in this study. Before you begin, we kindly ask you to read this form carefully and sign for consent.<br><br><b>Researchers:</b><br>Prof. Dr. J. J. A. Denissen<small> - Department of Developmental Psychology Tilburg University</small><br>Prof. Dr. S. M. Lindenberg <small> - Department of Social Psychology Tilburg University</small><br><br><b>Background:</b><br>The intention of this study is to research and gain knowledge of human behavior. Firstly, we would like to ask you to fill out a questionnaire about how you think about yourself. Subsequently, you will play a game. We are interested in how you make decisions during that game.<br><br><b>Procedure:</b><br>This study will take about 45 minutes. If you at any point wish to withdraw your consent and stop the study, you have the right to do so and will not be penalized.<br><br><b>Compensation:</b><br>For your participation you will receive the credit stated on Amazon Mechanical Turk.<br><br><b>Confidentiality:</b><br>When your role with this project is complete, your data will be anonymized. From that time, there will be no record that links the data collected from you with any personal data from which you could be identified. Once anonymized, these data may be made available to researchers via accessible data repositories and possibly used for novel purposes.<br><br>If you have any questions during your participation, you can email the test leader <i>(e.dietvorst@uvt.nl)</i>.<br>If you have other questions regarding the study, the test leader can get you in contact with the project leader prof. Dr. J. J. A. Denissen.'
        ]);


        // form.demographics
        Instruction::create([
            'current_url' => 'form.demographics',
            'next_url' => 'instruction.announcement',
            'title' => 'Demographics',
            'text' => 'Please fill out the following questions about yourself.'
        ]);


        // instruction.announcement
        Instruction::create([
            'current_url' => 'instruction.announcement',
            'next_url' => 'instruction.practice',
            'title' => 'Games introduction',
            'text' => 'In this part of the study you are going to play games with other player. There is first a practice phase to familiarize yourself with playing a game. After that the real games will begin and you will be playing for Money Units (MUs) with a player called Robin. You and Robin will make the decisions at the same time, so you will not know Robin’s choice while making your decision.'
        ]);


        // instruction.practice
        Instruction::create([
            'current_url' => 'instruction.practice',
            'next_url' => 'game.play',
            'title' => 'Practice game',
            'text' => 'You are about to play the practice phase with another player. The practice phase consists of three rounds. The money units you can earn in each situation are displayed in the table of each game.'
        ]);


        // playing here... <- practice/play/{gameNumber}/{phaseNumber} -> to instruction.condition


        // instruction.condition
        Instruction::create([
            'current_url' => 'instruction.condition',
            'next_url' => 'form.expectation',
            'title' => 'Game phase',
            'text' => 'You finished the practice phase and are about to start the game phase.<br><br>You will play 9 different games, and each game will be played 10 times in a row (i.e. 10 rounds). After each round you will be informed about the MUs you earned and the MUs Robin earned. For example, after having played game 6 for the 4th time you will see a screen "Your MUs xx", "Robin’s MUs xx", "game 6/9, round 4/10". After each game, you are invited to answer questions about the game you played.<br><br><b>Please pay attention: <span class="text-danger">there are some variations in each game, please read carefully.</span></b><br><br>{{incentive_text}}<br><br>Good luck!'
        ]);


        // form.expectation
        Instruction::create([
            'current_url' => 'form.expectation',
            'next_url' => 'game.play',
            'title' => 'Understanding',
            'text' => 'Please fill out the following question.'
        ]);


        // playing here... <- game/play/{gameNumber}/{phaseNumber} -> to instruction.score/{gameNumber}


        // instruction.score/{gameNumber}
        Instruction::create([
            'current_url' => 'instruction.score',
            'next_url' => 'form.opponent-evaluation',
            'title' => 'Money Units transfer',
            'text' => 'Dynamically pulled from the conditions table.'
        ]);


        // form.opponentEvaluation/{gameNumber}
        Instruction::create([
            'current_url' => 'form.opponent-evaluation',
            'next_url' => 'form.game-question',
            'title' => 'Opponent evaluation',
            'text' => 'Please fill out the following question.'
        ]);


        // form.gameQuestion/{gameNumber}
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
            'title' => 'New Game',
            'text' => 'You are about to start a new game. Please click the button to continue.'
        ]);


        // last instruction.new-game/{gameNumber} will output that there are no games left


        // form.study-evaluation-form
        Instruction::create([
            'current_url' => 'form.study-evaluation-form',
            'next_url' => 'form.study-evaluation-question',
            'title' => 'Study evaluation',
            'text' => 'As you could read in the introduction to this experiment, Robin was ‘instructed’ to be cooperative in some games, competitive in other games, and sometimes cooperative and sometimes competitive in the same game.'
        ]);


        // form.study-evaluation-question/{wallstreet}
        Instruction::create([
            'current_url' => 'form.study-evaluation-question.wallstreet',
            'next_url' => 'form.study-evaluation-question',
            'title' => 'Understanding of the label',
            'text' => 'Please indicate the degree to which you agree or disagree with the following statements. When I play a game with others that is called <b>"Wall Street Game"</b> I think that people who play this game generally...'
        ]);


        // form.study-evaluation-question/{community}
        Instruction::create([
            'current_url' => 'form.study-evaluation-question.community',
            'next_url' => 'instruction.debriefing',
            'title' => 'Understanding of the label',
            'text' => 'Please indicate the degree to which you agree or disagree with the following statements. When I play a game with others that is called <b>"Community Game"</b> I think that people who play this game generally...'
        ]);


        // debriefing
        Instruction::create([
            'current_url' => 'instruction.debriefing',
            'next_url' => 'form.feedback',
            'title' => 'Debriefing',
            'text' => 'While playing this experiment you were told to play with another player. However, during the whole time this was a computer.<br><br>We find it important to debrief you about this because the reactions of the computer might have affected you, positively or negatively.<br><br><b>Now you know it was a computer</b>, so you know you do not have to take these responses personal.'
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
            'text' => 'Thank you for you participation. If you have any questions concerning this study please contact our test leader <i>(e.dietvorst@uvt.nl)</i>.<br><br>Lastly, you automatically receive a random code in order to fill out on Amazon Mechanical Turk. This code is evidence that you participated and finished our study.'
        ]);


        // in case he refused the consent

        // end
        Instruction::create([
            'current_url' => 'instruction.end',
            'next_url' => 'instruction.start',
            'title' => 'We respect your choice',
            'text' => 'Hope to see you next time. Best of luck!'
        ]);


        // in case he tries to play again

        // end
        Instruction::create([
            'current_url' => 'instruction.not-allowed',
            'next_url' => 'instruction.start',
            'title' => 'Not allowed',
            'text' => '<span class="text-danger"><b>You already participated in this experiment.</b></span> If you think this message is a mistake, please contact our test leader <i>(e.dietvorst@uvt.nl)</i> in order to clarify the situation.'
        ]);



    }

}