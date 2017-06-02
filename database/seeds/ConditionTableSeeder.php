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
            'text_chain' => 'comp#You are going to play with another player. The money units (MUs) you can earn in each situation are shown in the below displayed table.<br><br>If you choose for option 1 and the other player chooses option 2, you will receive 12 MUs and the other player will receive 8 MUs. If the other player however chooses option 1 as well, you both receive 4 MUs. If you choose option 2 and the other player chooses option 1, the other player will receive 12 MUs and you will receive 8 MUs. If the other player however also chooses option 2, you both receive 1 MU.'
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
            'text_chain' => 'comp#You are going to play the Wall Street Game with an opponent player. The money units (MUs) that you earn in every situation, are shown in the below displayed table. In the Wall Street Game every player plays for him or her selves. At the end of the game you receive the MUs that you have earned.<br><br>Robin is instructed to be competitive, meaning that the other player wants to get as much MUs as possible and allows you the least MUs possible. ;coop#You are going to play the Wall Street Game with an opponent player. The MUs that you earn in every situation, are shown in the below displayed table. In the Wall Street Game every player plays for him or her selves. At the end of the game you receive the MUs that you have earned.<br><br>Robin is instructed to be cooperative and wants both players to receive and earn the same amount of MUs. ;neut#You are going to play the Wall Street Game with an opponent player. The MUs that you earn in every situation, are shown in the below displayed table. In the Wall Street Game every player plays for him or her selves. At the end of the game you receive the MUs that you have earned.<br><br> Robin is instructed to be cooperative and sometimes competitive.',
            'text_division' => 'Because you are playing the Wall Street Game, you receive the MUs that you have earned.<br><br>You earn {{user_gains}} and the other player earns {{pc_gains}}.'
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
            'text_chain' => 'comp#You are going to play the Community Game with a teammate. The money units (MUs) that you earn in every situation, are shown in below displayed table. In a Community Game all MUs earned by both players are added up and equally divided.<br><br> Robin is instructed to be competitive, meaning that the other player wants to get as much point as possible and allows you the least MUs possible. ;coop#You are going to play the Community Game with a teammate. The MUs that you earn in every situation, are shown in below displayed table. In a Community Game all MUs earned by both players are added up and equally divided.<br><br> Robin is instructed to be cooperative and wants both players to receive and earn the same amount of MUs. ;neut#You are going to play the Community Game with a teammate. The MUs that you earn in every situation, are shown in below displayed table. In a Community Game all MUs earned by both players are added up and equally divided.<br><br> Robin is instructed to be cooperative and sometimes competitive.',
            'text_division' => 'Because you are playing the Community Game, all MUs earned by both players are added up and equally divided.<br><br>You earn {{user_gains}} and the other player earns {{pc_gains}}.'
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
            'text_chain' => 'comp#You are going to play Point Game with another player. The money units (MUs) that you earn in every situation, are shown in below displayed table. In the Point Game, you will receive 25% of the other player\'s MUs, and you have to give 25% of your MUs to the other player, you can keep the rest of your MUs.<br><br> Robin is instructed to be competitive, meaning that the other player wants to get as much point as possible and allows you the least MUs possible. ;coop#You are going to play Point Game with another player. The MUs that you earn in every situation, are shown in below displayed table. In the Point Game, you will receive 25% of the other player\'s MUs, and you have to give 25% of your MUs to the other player, you can keep the rest of your MUs.<br><br>Robin is instructed to be cooperative and wants both players to receive and earn the same amount of MUs. ;neut#You are going to play Point Game with another player. The MUs that you earn in every situation, are shown in below displayed table. In the Point Game, you will receive 25% of the other player\'s MUs, and you have to give 25% of your MUs to the other player, you can keep the rest of your MUs.<br><br> Robin is instructed to be cooperative and sometimes competitive.',
            'text_division' => 'Because you are playing the Point Game, you will receive 25% of the other player\'s MUs, and you have to give 25% of your MUs to the other player. You get to keep the remaining 75% of your own MUs.<br><br>You earn {{user_gains}} and the other player earns {{pc_gains}}.'
        ]);
    }
}