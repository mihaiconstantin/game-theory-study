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
            'text_chain' => 'comp#You are going to play a practice game with another player. The money units (MUs) you can earn in each round are shown in the displayed table below.<br><br>If you choose for option 1 and the other player chooses option 2, you will receive 12 MUs and the other player will receive 8 MUs. If the other player however chooses option 1 as well, you both receive 4 MUs. If you choose option 2 and the other player chooses option 1, the other player will receive 12 MUs and you will receive 8 MUs. If the other player however also chooses option 2, you both receive 1 MU.'
        ]);


        #region with incentive

        Condition::create([
            'name' => 'A2',
            'design_chain' => 'comp#MD;coop#MD;neut#MD;comp#PD;coop#PD;neut#PD;comp#PT;coop#PT;neut#PT',
            'bias_chain' => 'comp#80;coop#20;neut#50',
            'random_design_iteration' => 1,
            'random_design_chain' => 1,
            'opponent' => 'Robin',
            'title' => 'A2',
            'text_chain' => 'comp#You are going to play a game with another player, called Robin. In the context in which you and the other player play the game, players are usually cooperative, even though some players may not be. The money units (MUs) that you earn in every round, are shown in the table displayed on the left of your screen. In the context of this game, all MUs earned by both players in the game are added up and equally divided.<br><br> <b>{{incentive_text}}</b> <br><br>Robin is instructed to be competitive, meaning that Robin wants to get as many money units (MUs) as possible and for you to get as few MUs as possible.;coop#You are going to play a game with another player, called Robin. In the context in which you and the other player play the game, players are usually cooperative, even though some players may not be. The money units (MUs) that you earn in every round, are shown in the table displayed on the left of your screen. In the context of this game, all MUs earned by both players in the game are added up and equally divided.<br><br> <b>{{incentive_text}}</b> <br><br>Robin is instructed to be sometimes cooperative and sometimes competitive.;neut#You are going to play a game with another player, called Robin. In the context in which you and the other player play the game, players are usually cooperative, even though some players may not be. The money units (MUs) that you earn in every round, are shown in the table displayed on the left of your screen. In the context of this game, all MUs earned by both players in the game are added up and equally divided.<br><br> <b>{{incentive_text}}</b> <br><br>Robin is instructed to be cooperative, meaning that Robin wants both players to get the same amount of MUs.',
            'text_division' => 'In this game, all MUs earned by both players were added up and equally divided. You receive {{user_gains}} MUs that are converted to real money and transferred to your bonus account. The other player received {{pc_gains}} MUs.',
            'incentive' => 1,
            'incentive_text' => 'The MUs you receive are worth real money. At the end of each game (after 10 rounds), the MUs you receive for the last 10 rounds are converted into Dollar Cents at a rate of 1 MU = 0.1 Dollar Cent and credited to your bonus account. Of course, if at the end of the experiment, you have nothing in your bonus account, you will not be paid a bonus, but you will not have to pay anything either.'
        ]);

        Condition::create([
            'name' => 'B2',
            'design_chain' => 'comp#MD;coop#MD;neut#MD;comp#PD;coop#PD;neut#PD;comp#PT;coop#PT;neut#PT',
            'bias_chain' => 'comp#80;coop#20;neut#50',
            'random_design_iteration' => 1,
            'random_design_chain' => 1,
            'opponent' => 'Robin',
            'title' => 'B2',
            'text_chain' => 'comp#You are going to play a game with another player, called Robin. In the context in which you and the other player play the game, players are usually cooperative, even though some players may not be. The money units (MUs) that you earn in every round, are shown in the table displayed on the left of your screen. In the context of this game, both players keep the MUs they individually earned in the game.<br><br> <b>{{incentive_text}}</b> <br><br>Robin is instructed to be competitive, meaning that Robin wants to get as many money units (MUs) as possible and for you to get as few MUs as possible.;coop#You are going to play a game with another player, called Robin. In the context in which you and the other player play the game, players are usually cooperative, even though some players may not be. The money units (MUs) that you earn in every round, are shown in the table displayed on the left of your screen. In the context of this game, both players keep the MUs they individually earned in the game.<br><br> <b>{{incentive_text}}</b> <br><br>Robin is instructed to be sometimes cooperative and sometimes competitive.;neut#You are going to play a game with another player, called Robin. In the context in which you and the other player play the game, players are usually cooperative, even though some players may not be. The money units (MUs) that you earn in every round, are shown in the table displayed on the left of your screen. In the context of this game, both players keep the MUs they individually earned in the game.<br><br> <b>{{incentive_text}}</b> <br><br>Robin is instructed to be cooperative, meaning that Robin wants both players to get the same amount of MUs.',
            'text_division' => 'In this game, both players keep the MUs they individually earned. You receive {{user_gains}} MUs that are converted to real money and transferred to your bonus account. The other player received {{pc_gains}} MUs.',
            'incentive' => 1,
            'incentive_text' => 'The MUs you receive are worth real money. At the end of each game (after 10 rounds), the MUs you receive for the last 10 rounds are converted into Dollar Cents at a rate of 1 MU = 0.1 Dollar Cent and credited to your bonus account. Of course, if at the end of the experiment, you have nothing in your bonus account, you will not be paid a bonus, but you will not have to pay anything either.'
        ]);

        Condition::create([
            'name' => 'C2',
            'design_chain' => 'comp#MD;coop#MD;neut#MD;comp#PD;coop#PD;neut#PD;comp#PT;coop#PT;neut#PT',
            'bias_chain' => 'comp#80;coop#20;neut#50',
            'random_design_iteration' => 1,
            'random_design_chain' => 1,
            'opponent' => 'Robin',
            'title' => 'C2',
            'text_chain' => 'comp#You are going to play a game with another player, called Robin. In the context in which you and the other player play the game, players are usually competitive, even though some players may not be. The money units (MUs) that you earn in every round, are shown in the table displayed on the left of your screen. In the context of this game, all MUs earned by both players in the game are added up and equally divided.<br><br> <b>{{incentive_text}}</b> <br><br>Robin is instructed to be competitive, meaning that Robin wants to get as many money units (MUs) as possible and for you to get as few MUs as possible.;coop#You are going to play a game with another player, called Robin. In the context in which you and the other player play the game, players are usually competitive, even though some players may not be. The money units (MUs) that you earn in every round, are shown in the table displayed on the left of your screen. In the context of this game, all MUs earned by both players in the game are added up and equally divided.<br><br> <b>{{incentive_text}}</b> <br><br>Robin is instructed to be sometimes cooperative and sometimes competitive.;neut#You are going to play a game with another player, called Robin. In the context in which you and the other player play the game, players are usually competitive, even though some players may not be. The money units (MUs) that you earn in every round, are shown in the table displayed on the left of your screen. In the context of this game, all MUs earned by both players in the game are added up and equally divided.<br><br> <b>{{incentive_text}}</b> <br><br>Robin is instructed to be cooperative, meaning that Robin wants both players to get the same amount of MUs.',
            'text_division' => 'In this game, all MUs earned by both players were added up and equally divided. You receive {{user_gains}} MUs that are converted to real money and transferred to your bonus account. The other player received {{pc_gains}} MUs.',
            'incentive' => 1,
            'incentive_text' => 'The MUs you receive are worth real money. At the end of each game (after 10 rounds), the MUs you receive for the last 10 rounds are converted into Dollar Cents at a rate of 1 MU = 0.1 Dollar Cent and credited to your bonus account. Of course, if at the end of the experiment, you have nothing in your bonus account, you will not be paid a bonus, but you will not have to pay anything either.'
        ]);

        Condition::create([
            'name' => 'D2',
            'design_chain' => 'comp#MD;coop#MD;neut#MD;comp#PD;coop#PD;neut#PD;comp#PT;coop#PT;neut#PT',
            'bias_chain' => 'comp#80;coop#20;neut#50',
            'random_design_iteration' => 1,
            'random_design_chain' => 1,
            'opponent' => 'Robin',
            'title' => 'D2',
            'text_chain' => 'comp#You are going to play a game with another player, called Robin. In the context in which you and the other player play the game, players are usually competitive, even though some players may not be. The money units (MUs) that you earn in every round, are shown in the table displayed on the left of your screen. In the context of this game, both players keep the MUs they individually earned in the game.<br><br> <b>{{incentive_text}}</b> <br><br>Robin is instructed to be competitive, meaning that Robin wants to get as many money units (MUs) as possible and for you to get as few MUs as possible.;coop#You are going to play a game with another player, called Robin. In the context in which you and the other player play the game, players are usually competitive, even though some players may not be. The money units (MUs) that you earn in every round, are shown in the table displayed on the left of your screen. In the context of this game, both players keep the MUs they individually earned in the game.<br><br> <b>{{incentive_text}}</b> <br><br>Robin is instructed to be sometimes cooperative and sometimes competitive.;neut#You are going to play a game with another player, called Robin. In the context in which you and the other player play the game, players are usually competitive, even though some players may not be. The money units (MUs) that you earn in every round, are shown in the table displayed on the left of your screen. In the context of this game, both players keep the MUs they individually earned in the game.<br><br> <b>{{incentive_text}}</b> <br><br>Robin is instructed to be cooperative, meaning that Robin wants both players to get the same amount of MUs.',
            'text_division' => 'In this game, both players keep the MUs they individually earned. You receive {{user_gains}} MUs that are converted to real money and transferred to your bonus account. The other player received {{pc_gains}} MUs.',
            'incentive' => 1,
            'incentive_text' => 'The MUs you receive are worth real money. At the end of each game (after 10 rounds), the MUs you receive for the last 10 rounds are converted into Dollar Cents at a rate of 1 MU = 0.1 Dollar Cent and credited to your bonus account. Of course, if at the end of the experiment, you have nothing in your bonus account, you will not be paid a bonus, but you will not have to pay anything either.'
        ]);

        Condition::create([
            'name' => 'E2',
            'design_chain' => 'comp#MD;coop#MD;neut#MD;comp#PD;coop#PD;neut#PD;comp#PT;coop#PT;neut#PT',
            'bias_chain' => 'comp#80;coop#20;neut#50',
            'random_design_iteration' => 1,
            'random_design_chain' => 1,
            'opponent' => 'Robin',
            'title' => 'E2',
            'text_chain' => 'comp#You are going to play a game with another player, called Robin. The money units (MUs) that you earn in every round, are shown in the table displayed on the left of your screen. In the context of this game, all MUs earned by both players in the game are added up and equally divided.<br><br> <b>{{incentive_text}}</b> <br><br>Robin is instructed to be competitive, meaning that Robin wants to get as many money units (MUs) as possible and for you to get as few MUs as possible.;coop#You are going to play a game with another player, called Robin. The money units (MUs) that you earn in every round, are shown in the table displayed on the left of your screen. In the context of this game, all MUs earned by both players in the game are added up and equally divided.<br><br> <b>{{incentive_text}}</b> <br><br>Robin is instructed to be sometimes cooperative and sometimes competitive.;neut#You are going to play a game with another player, called Robin. The money units (MUs) that you earn in every round, are shown in the table displayed on the left of your screen. In the context of this game, all MUs earned by both players in the game are added up and equally divided.<br><br> <b>{{incentive_text}}</b> <br><br>Robin is instructed to be cooperative, meaning that Robin wants both players to get the same amount of MUs.',
            'text_division' => 'In this game, all MUs earned by both players were added up and equally divided. You receive {{user_gains}} MUs that are converted to real money and transferred to your bonus account. The other player received {{pc_gains}} MUs.',
            'incentive' => 1,
            'incentive_text' => 'The MUs you receive are worth real money. At the end of each game (after 10 rounds), the MUs you receive for the last 10 rounds are converted into Dollar Cents at a rate of 1 MU = 0.1 Dollar Cent and credited to your bonus account. Of course, if at the end of the experiment, you have nothing in your bonus account, you will not be paid a bonus, but you will not have to pay anything either.'
        ]);

        Condition::create([
            'name' => 'F2',
            'design_chain' => 'comp#MD;coop#MD;neut#MD;comp#PD;coop#PD;neut#PD;comp#PT;coop#PT;neut#PT',
            'bias_chain' => 'comp#80;coop#20;neut#50',
            'random_design_iteration' => 1,
            'random_design_chain' => 1,
            'opponent' => 'Robin',
            'title' => 'F2',
            'text_chain' => 'comp#You are going to play a game with another player, called Robin. The money units (MUs) that you earn in every round, are shown in the table displayed on the left of your screen. In the context of this game, both players keep the MUs they individually earned.<br><br> <b>{{incentive_text}}</b> <br><br>Robin is instructed to be competitive, meaning that Robin wants to get as many money units (MUs) as possible and for you to get as few MUs as possible.;coop#You are going to play a game with another player, called Robin. The money units (MUs) that you earn in every round, are shown in the table displayed on the left of your screen. In the context of this game, both players keep the MUs they individually earned.<br><br> <b>{{incentive_text}}</b> <br><br>Robin is instructed to be sometimes cooperative and sometimes competitive.;neut#You are going to play a game with another player, called Robin. The money units (MUs) that you earn in every round, are shown in the table displayed on the left of your screen. In the context of this game, both players keep the MUs they individually earned.<br><br> <b>{{incentive_text}}</b> <br><br>Robin is instructed to be cooperative, meaning that Robin wants both players to get the same amount of MUs.',
            'text_division' => 'In this game, both players keep the MUs they individually earned. You receive {{user_gains}} MUs that are converted to real money and transferred to your bonus account. The other player received {{pc_gains}} MUs.',
            'incentive' => 1,
            'incentive_text' => 'The MUs you receive are worth real money. At the end of each game (after 10 rounds), the MUs you receive for the last 10 rounds are converted into Dollar Cents at a rate of 1 MU = 0.1 Dollar Cent and credited to your bonus account. Of course, if at the end of the experiment, you have nothing in your bonus account, you will not be paid a bonus, but you will not have to pay anything either.'
        ]);

        Condition::create([
            'name' => 'G2',
            'design_chain' => 'comp#MD;coop#MD;neut#MD;comp#PD;coop#PD;neut#PD;comp#PT;coop#PT;neut#PT',
            'bias_chain' => 'comp#80;coop#20;neut#50',
            'random_design_iteration' => 1,
            'random_design_chain' => 1,
            'opponent' => 'Robin',
            'title' => 'G2',
            'text_chain' => 'comp# You are going to play a game with another player, called Robin. In the context in which you and the other player play the game, players are usually cooperative, even though some players may not be. The money units (MUs) that you earn in every round, are shown in the table displayed on the left of your screen.<br><br> <b>{{incentive_text}}</b> <br><br>Robin is instructed to be competitive, meaning that Robin wants to get as many money units (MUs) as possible and for you to get as few MUs as possible.;coop# You are going to play a game with another player, called Robin. In the context in which you and the other player play the game, players are usually cooperative, even though some players may not be. The money units (MUs) that you earn in every round, are shown in the table displayed on the left of your screen.<br><br> <b>{{incentive_text}}</b> <br><br>Robin is instructed to be sometimes cooperative and sometimes competitive.;neut#You are going to play a game with another player, called Robin. In the context in which you and the other player play the game, players are usually cooperative, even though some players may not be. The money units (MUs) that you earn in every round, are shown in the table displayed on the left of your screen.<br><br> <b>{{incentive_text}}</b> <br><br>Robin is instructed to be cooperative, meaning that Robin wants both players to get the same amount of MUs.',
            'text_division' => 'You receive {{user_gains}} MUs. The other player received {{pc_gains}} MUs.',
            'incentive' => 1,
            'incentive_text' => 'The MUs you receive are worth real money. At the end of each game (after 10 rounds), the MUs you receive for the last 10 rounds are converted into Dollar Cents at a rate of 1 MU = 0.1 Dollar Cent and credited to your bonus account. Of course, if at the end of the experiment, you have nothing in your bonus account, you will not be paid a bonus, but you will not have to pay anything either.'
        ]);

        Condition::create([
            'name' => 'H2',
            'design_chain' => 'comp#MD;coop#MD;neut#MD;comp#PD;coop#PD;neut#PD;comp#PT;coop#PT;neut#PT',
            'bias_chain' => 'comp#80;coop#20;neut#50',
            'random_design_iteration' => 1,
            'random_design_chain' => 1,
            'opponent' => 'Robin',
            'title' => 'H2',
            'text_chain' => 'comp#You are going to play a game with another player, called Robin. In the context in which you and the other player play the game, players are usually competitive, even though some players may not be. The money units (MUs) that you earn in every round, are shown in the table displayed on the left of your screen.<br><br> <b>{{incentive_text}}</b> <br><br>Robin is instructed to be competitive, meaning that Robin wants to get as many money units (MUs) as possible and for you to get as few MUs as possible.;coop#You are going to play a game with another player, called Robin. In the context in which you and the other player play the game, players are usually competitive, even though some players may not be. The money units (MUs) that you earn in every round, are shown in the table displayed on the left of your screen.<br><br> <b>{{incentive_text}}</b> <br><br>Robin is instructed to be sometimes cooperative and sometimes competitive.;neut#You are going to play a game with another player, called Robin. In the context in which you and the other player play the game, players are usually competitive, even though some players may not be. The money units (MUs) that you earn in every round, are shown in the table displayed on the left of your screen.<br><br> <b>{{incentive_text}}</b> <br><br>Robin is instructed to be cooperative, meaning that Robin wants both players to get the same amount of MUs.',
            'text_division' => 'You receive {{user_gains}} MUs. The other player received {{pc_gains}} MUs.',
            'incentive' => 1,
            'incentive_text' => 'The MUs you receive are worth real money. At the end of each game (after 10 rounds), the MUs you receive for the last 10 rounds are converted into Dollar Cents at a rate of 1 MU = 0.1 Dollar Cent and credited to your bonus account. Of course, if at the end of the experiment, you have nothing in your bonus account, you will not be paid a bonus, but you will not have to pay anything either.'
        ]);

        #endregion


        #region without incentive

        Condition::create([
            'name' => 'A1',
            'design_chain' => 'comp#MD;coop#MD;neut#MD;comp#PD;coop#PD;neut#PD;comp#PT;coop#PT;neut#PT',
            'bias_chain' => 'comp#80;coop#20;neut#50',
            'random_design_iteration' => 1,
            'random_design_chain' => 1,
            'opponent' => 'Robin',
            'title' => 'A1',
            'text_chain' => 'comp#You are going to play a game with another player, called Robin. In the context in which you and the other player play the game, players are usually cooperative, even though some players may not be. The money units (MUs) that you earn in every round, are shown in the table displayed on the left of your screen. In the context of this game, all MUs earned by both players in the game are added up and equally divided.<br><br>Robin is instructed to be competitive, meaning that Robin wants to get as many money units (MUs) as possible and for you to get as few MUs as possible.;coop#You are going to play a game with another player, called Robin. In the context in which you and the other player play the game, players are usually cooperative, even though some players may not be. The money units (MUs) that you earn in every round, are shown in the table displayed on the left of your screen. In the context of this game, all MUs earned by both players in the game are added up and equally divided.<br><br>Robin is instructed to be sometimes cooperative and sometimes competitive.;neut#You are going to play a game with another player, called Robin. In the context in which you and the other player play the game, players are usually cooperative, even though some players may not be. The money units (MUs) that you earn in every round, are shown in the table displayed on the left of your screen. In the context of this game, all MUs earned by both players in the game are added up and equally divided.<br><br>Robin is instructed to be cooperative, meaning that Robin wants both players to get the same amount of MUs.',
            'text_division' => 'In this game, all MUs earned by both players were added up and equally divided. You receive {{user_gains}} MUs. The other player received {{pc_gains}} MUs.',
            'incentive' => 0
        ]);

        Condition::create([
            'name' => 'B1',
            'design_chain' => 'comp#MD;coop#MD;neut#MD;comp#PD;coop#PD;neut#PD;comp#PT;coop#PT;neut#PT',
            'bias_chain' => 'comp#80;coop#20;neut#50',
            'random_design_iteration' => 1,
            'random_design_chain' => 1,
            'opponent' => 'Robin',
            'title' => 'B1',
            'text_chain' => 'comp#You are going to play a game with another player, called Robin. In the context in which you and the other player play the game, players are usually cooperative, even though some players may not be. The money units (MUs) that you earn in every round, are shown in the table displayed on the left of your screen. In the context of this game, both players keep the MUs they individually earned in the game. <br><br>Robin is instructed to be competitive, meaning that Robin wants to get as many money units (MUs) as possible and for you to get as few MUs as possible.;coop#You are going to play a game with another player, called Robin. In the context in which you and the other player play the game, players are usually cooperative, even though some players may not be. The money units (MUs) that you earn in every round, are shown in the table displayed on the left of your screen. In the context of this game, both players keep the MUs they individually earned in the game.<br><br>Robin is instructed to be sometimes cooperative and sometimes competitive.;neut#You are going to play a game with another player, called Robin. In the context in which you and the other player play the game, players are usually cooperative, even though some players may not be. The money units (MUs) that you earn in every round, are shown in the table displayed on the left of your screen. In the context of this game, both players keep the MUs they individually earned in the game.<br><br>Robin is instructed to be cooperative, meaning that Robin wants both players to get the same amount of MUs.',
            'text_division' => 'In this game, both players keep the MUs they individually earned. You receive {{user_gains}} MUs that are converted to real money and transferred to your bonus account. The other player received {{pc_gains}} MUs.',
            'incentive' => 0
        ]);

        Condition::create([
            'name' => 'C1',
            'design_chain' => 'comp#MD;coop#MD;neut#MD;comp#PD;coop#PD;neut#PD;comp#PT;coop#PT;neut#PT',
            'bias_chain' => 'comp#80;coop#20;neut#50',
            'random_design_iteration' => 1,
            'random_design_chain' => 1,
            'opponent' => 'Robin',
            'title' => 'C1',
            'text_chain' => 'comp#You are going to play a game with another player, called Robin. In the context in which you and the other player play the game, players are usually competitive, even though some players may not be. The money units (MUs) that you earn in every round, are shown in the table displayed on the left of your screen. In the context of this game, all MUs earned by both players in the game are added up and equally divided.<br><br>Robin is instructed to be competitive, meaning that Robin wants to get as many money units (MUs) as possible and for you to get as few MUs as possible.;coop#You are going to play a game with another player, called Robin. In the context in which you and the other player play the game, players are usually competitive, even though some players may not be. The money units (MUs) that you earn in every round, are shown in the table displayed on the left of your screen. In the context of this game, all MUs earned by both players in the game are added up and equally divided.<br><br>Robin is instructed to be sometimes cooperative and sometimes competitive.;neut#You are going to play a game with another player, called Robin. In the context in which you and the other player play the game, players are usually competitive, even though some players may not be. The money units (MUs) that you earn in every round, are shown in the table displayed on the left of your screen. In the context of this game, all MUs earned by both players in the game are added up and equally divided.<br><br>Robin is instructed to be cooperative, meaning that Robin wants both players to get the same amount of MUs.',
            'text_division' => 'In this game, all MUs earned by both players were added up and equally divided. You receive {{pc_gains}} MUs. The other player received {{pc_gains}} MUs.',
            'incentive' => 0
        ]);

        Condition::create([
            'name' => 'D1',
            'design_chain' => 'comp#MD;coop#MD;neut#MD;comp#PD;coop#PD;neut#PD;comp#PT;coop#PT;neut#PT',
            'bias_chain' => 'comp#80;coop#20;neut#50',
            'random_design_iteration' => 1,
            'random_design_chain' => 1,
            'opponent' => 'Robin',
            'title' => 'D1',
            'text_chain' => 'comp#You are going to play a game with another player, called Robin. In the context in which you and the other player play the game, players are usually competitive, even though some players may not be. The money units (MUs) that you earn in every round, are shown in the table displayed on the left of your screen. In the context of this game, both players keep the MUs they individually earned in the game.<br><br>Robin is instructed to be competitive, meaning that Robin wants to get as many money units (MUs) as possible and for you to get as few MUs as possible.;coop#You are going to play a game with another player, called Robin. In the context in which you and the other player play the game, players are usually competitive, even though some players may not be. The money units (MUs) that you earn in every round, are shown in the table displayed on the left of your screen. In the context of this game, both players keep the MUs they individually earned in the game.<br><br>Robin is instructed to be sometimes cooperative and sometimes competitive.;neut#You are going to play a game with another player, called Robin. In the context in which you and the other player play the game, players are usually competitive, even though some players may not be. The money units (MUs) that you earn in every round, are shown in the table displayed on the left of your screen. In the context of this game, both players keep the MUs they individually earned in the game.<br><br>Robin is instructed to be cooperative, meaning that Robin wants both players to get the same amount of MUs.',
            'text_division' => 'In this game, both players keep the MUs they individually earned. You receive {{user_gains}} MUs that are converted to real money and transferred to your bonus account. The other player received {{pc_gains}} MUs.',
            'incentive' => 0
        ]);

        Condition::create([
            'name' => 'F1',
            'design_chain' => 'comp#MD;coop#MD;neut#MD;comp#PD;coop#PD;neut#PD;comp#PT;coop#PT;neut#PT',
            'bias_chain' => 'comp#80;coop#20;neut#50',
            'random_design_iteration' => 1,
            'random_design_chain' => 1,
            'opponent' => 'Robin',
            'title' => 'F1',
            'text_chain' => 'comp#You are going to play a game with another player, called Robin. The money units (MUs) that you earn in every round, are shown in the table displayed on the left of your screen. In the context of this game, both players keep the MUs they individually earned.<br><br>Robin is instructed to be competitive, meaning that Robin wants to get as many money units (MUs) as possible and for you to get as few MUs as possible.;coop#You are going to play a game with another player, called Robin. The money units (MUs) that you earn in every round, are shown in the table displayed on the left of your screen. In the context of this game, both players keep the MUs they individually earned.<br><br>Robin is instructed to be sometimes cooperative and sometimes competitive.;neut#You are going to play a game with another player, called Robin. The money units (MUs) that you earn in every round, are shown in the table displayed on the left of your screen. In the context of this game, both players keep the MUs they individually earned.<br><br>Robin is instructed to be cooperative, meaning that Robin wants both players to get the same amount of MUs.',
            'text_division' => 'In this game, both players keep the MUs they individually earned. You receive {{user_gains}} MUs that are converted to real money and transferred to your bonus account. The other player received {{pc_gains}} MUs.',
            'incentive' => 0
        ]);

        Condition::create([
            'name' => 'E1',
            'design_chain' => 'comp#MD;coop#MD;neut#MD;comp#PD;coop#PD;neut#PD;comp#PT;coop#PT;neut#PT',
            'bias_chain' => 'comp#80;coop#20;neut#50',
            'random_design_iteration' => 1,
            'random_design_chain' => 1,
            'opponent' => 'Robin',
            'title' => 'E1',
            'text_chain' => 'comp#You are going to play a game with another player, called Robin. The money units (MUs) that you earn in every round, are shown in the table displayed on the left of your screen. In the context of this game, all MUs earned by both players in the game are added up and equally divided.<br><br>Robin is instructed to be competitive, meaning that Robin wants to get as many money units (MUs) as possible and for you to get as few MUs as possible.;coop#You are going to play a game with another player, called Robin. The money units (MUs) that you earn in every round, are shown in the table displayed on the left of your screen. In the context of this game, all MUs earned by both players in the game are added up and equally divided.<br><br>Robin is instructed to be sometimes cooperative and sometimes competitive.;neut#You are going to play a game with another player, called Robin. The money units (MUs) that you earn in every round, are shown in the table displayed on the left of your screen. In the context of this game, all MUs earned by both players in the game are added up and equally divided.<br><br>Robin is instructed to be cooperative, meaning that Robin wants both players to get the same amount of MUs.',
            'text_division' => 'In this game, all MUs earned by both players were added up and equally divided. You receive {{user_gains}} MUs. The other player received {{pc_gains}} MUs.',
            'incentive' => 0
        ]);

        Condition::create([
            'name' => 'G1',
            'design_chain' => 'comp#MD;coop#MD;neut#MD;comp#PD;coop#PD;neut#PD;comp#PT;coop#PT;neut#PT',
            'bias_chain' => 'comp#80;coop#20;neut#50',
            'random_design_iteration' => 1,
            'random_design_chain' => 1,
            'opponent' => 'Robin',
            'title' => 'G1',
            'text_chain' => 'comp#You are going to play a game with another player, called Robin. In the context in which you and the other player play the game, players are usually cooperative, even though some players may not be. The money units (MUs) that you earn in every round, are shown in the table displayed on the left of your screen. <br><br>Robin is instructed to be competitive, meaning that Robin wants to get as many money units (MUs) as possible and for you to get as few MUs as possible.;coop#You are going to play a game with another player, called Robin. In the context in which you and the other player play the game, players are usually cooperative, even though some players may not be. The money units (MUs) that you earn in every round, are shown in the table displayed on the left of your screen. <br><br>Robin is instructed to be sometimes cooperative and sometimes competitive.;neut#You are going to play a game with another player, called Robin. In the context in which you and the other player play the game, players are usually cooperative, even though some players may not be. The money units (MUs) that you earn in every round, are shown in the table displayed on the left of your screen. <br><br>Robin is instructed to be cooperative, meaning that Robin wants both players to get the same amount of MUs.',
            'text_division' => 'You receive {{user_gains}} MUs. The other player received {{pc_gains}} MUs.',
            'incentive' => 0
        ]);

        Condition::create([
            'name' => 'H1',
            'design_chain' => 'comp#MD;coop#MD;neut#MD;comp#PD;coop#PD;neut#PD;comp#PT;coop#PT;neut#PT',
            'bias_chain' => 'comp#80;coop#20;neut#50',
            'random_design_iteration' => 1,
            'random_design_chain' => 1,
            'opponent' => 'Robin',
            'title' => 'H1',
            'text_chain' => 'comp#You are going to play a game with another player, called Robin. In the context in which you and the other player play the game, players are usually competitive, even though some players may not be. The money units (MUs) that you earn in every round, are shown in the table displayed on the left of your screen.<br><br>Robin is instructed to be competitive, meaning that Robin wants to get as many money units (MUs) as possible and for you to get as few MUs as possible.;coop#You are going to play a game with another player, called Robin. In the context in which you and the other player play the game, players are usually competitive, even though some players may not be. The money units (MUs) that you earn in every round, are shown in the table displayed on the left of your screen.<br><br>Robin is instructed to be sometimes cooperative and sometimes competitive.;neut#You are going to play a game with another player, called Robin. In the context in which you and the other player play the game, players are usually competitive, even though some players may not be. The money units (MUs) that you earn in every round, are shown in the table displayed on the left of your screen.<br><br>Robin is instructed to be cooperative, meaning that Robin wants both players to get the same amount of MUs.',
            'text_division' => 'You receive {{user_gains}} MUs. The other player received {{pc_gains}} MUs.',
            'incentive' => 0
        ]);

        #endregion

    }
}