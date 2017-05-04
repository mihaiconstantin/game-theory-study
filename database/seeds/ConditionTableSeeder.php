<?php

use App\Models\Condition;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ConditionTableSeeder extends Seeder
{
    /**
     * Seeds the conditions table.
     *
     * @return void
     */
    public function run()
    {
        // lock the primary key and drop what's in already
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('conditions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        // Training
        Condition::create([
            'name' => 'training',
            'design_chain' => 'comp#PR',
            'bias_chain' => 'comp#50',
            'random_design_iteration' => 1,
            'random_design_chain' => 1,
            'opponent' => 'no name',
            'title' => 'Practice phase',
            'text_chain' => 'comp#You are going to play with another player. The money units you can earn in each situation are shown in the below displayed table.<br><br>If you choose for option 1 and the other player chooses option 2, you will receive 12 money units and the other player will receive 8 money units. If the other player however chooses option 1 as well, you both receive 4 money units. If you choose option 2 and the other player chooses option 1, the other player will receive 12 money units and you will receive 8 money units. If the other player however also chooses option 2, you both receive 1 money unit.'
        ]);

        // Wall Street
        Condition::create([
            'name' => 'wallstreet',
            'design_chain' => 'comp#MD;coop#MD;neut#MD;comp#PD;coop#PD;neut#PD;comp#PT;coop#PT;neut#PT',
            'bias_chain' => 'comp#80;coop#20;neut#50',
            'random_design_iteration' => 1,
            'random_design_chain' => 1,
            'opponent' => 'Robin',
            'title' => 'Wall Street',
            'text_chain' => 'comp#You are going to play the Wall Street Game with an opponent player. The points that you earn in every situation, are shown in the below displayed table. In the Wall Street Game every player plays for him or her selves. At the end of the game you receive the points that you have earned.<br><br>Robin is instructed to be competitive, meaning that the other player wants to get as much points as possible and allows you the least points possible. ;coop#You are going to play the Wall Street Game with an opponent player. The points that you earn in every situation, are shown in the below displayed table. In the Wall Street Game every player plays for him or her selves. At the end of the game you receive the points that you have earned.<br><br>Robin is instructed to be cooperative and wants both players to receive and earn the same amount of points. ;neut#You are going to play the Wall Street Game with an opponent player. The points that you earn in every situation, are shown in the below displayed table. In the Wall Street Game every player plays for him or her selves. At the end of the game you receive the points that you have earned.<br><br> Robin is instructed to be cooperative and sometimes competitive.'
        ]);

        // Community
        Condition::create([
            'name' => 'community',
            'design_chain' => 'comp#MD;coop#MD;neut#MD;comp#PD;coop#PD;neut#PD;comp#PT;coop#PT;neut#PT',
            'bias_chain' => 'comp#80;coop#20;neut#50',
            'random_design_iteration' => 1,
            'random_design_chain' => 1,
            'opponent' => 'Robin',
            'title' => 'Community',
            'text_chain' => 'comp#You are going to play the Community Game with a teammate. The points that you earn in every situation, are shown in below displayed table. In a Community Game all points earned by both players are added up and equally divided.<br><br> Robin is instructed to be competitive, meaning that the other player wants to get as much point as possible and allows you the least points possible. ;coop#You are going to play the Community Game with a teammate. The points that you earn in every situation, are shown in below displayed table. In a Community Game all points earned by both players are added up and equally divided.<br><br> Robin is instructed to be cooperative and wants both players to receive and earn the same amount of points. ;neut#You are going to play the Community Game with a teammate. The points that you earn in every situation, are shown in below displayed table. In a Community Game all points earned by both players are added up and equally divided.<br><br> Robin is instructed to be cooperative and sometimes competitive.'
        ]);

        // Point Game
        Condition::create([
            'name' => 'point',
            'design_chain' => 'comp#MD;coop#MD;neut#MD;comp#PD;coop#PD;neut#PD;comp#PT;coop#PT;neut#PT',
            'bias_chain' => 'comp#80;coop#20;neut#50',
            'random_design_iteration' => 1,
            'random_design_chain' => 1,
            'opponent' => 'Robin',
            'title' => 'Point Game',
            'text_chain' => 'comp#You are going to play Point Game with another player. The points that you earn in every situation, are shown in below displayed table. In the Point Game, you will receive 50% of the points you earned. The other 50% you earned, will be equally divided by you and the other player.<br><br> Robin is instructed to be competitive, meaning that the other player wants to get as much point as possible and allows you the least points possible. ;coop#You are going to play Point Game with another player. The points that you earn in every situation, are shown in below displayed table.In the Point Game, you will receive 50% of the points you earned. The other 50% you earned, will be equally divided by you and the other player.<br><br>Robin is instructed to be cooperative and wants both players to receive and earn the same amount of points. ;neut#You are going to play Point Game with another player. The points that you earn in every situation, are shown in below displayed table. In the Point Game, you will receive 50% of the points you earned. The other 50% you earned, will be equally divided by you and the other player.<br><br> Robin is instructed to be cooperative and sometimes competitive.'
        ]);
    }
}