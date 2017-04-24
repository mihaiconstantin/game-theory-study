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
            'name' => 'Training',
            'location' => 'training',
            'design_chain' => 'comp#practice',
            'bias_chain' => '80',
            'opponent_chain' => 'Robin',
            'randomize_design_iterations' => 0,
            'randomize_design_chain' => 0,
            'description_competitive' => 'Training - competitive description',
            'description_cooperative' => 'Training - cooperative description',
            'description_neutral' => 'Training - neutral description'
        ]);

        // Wall Street
        Condition::create([
            'name' => 'Wall Street',
            'location' => 'wallstreet',
            'design_chain' => 'comp#MD;coop#MD;neut#MD;comp#PD;coop#PD;neut#PD;comp#PT;coop#PT;neut#PT;',
            'bias_chain' => 'comp#80;coop#20;neut#50',
            'opponent_chain' => 'Robin',
            'randomize_design_iterations' => 1,
            'randomize_design_chain' => 1,
            'description_competitive' => 'Wall Street - competitive description',
            'description_cooperative' => 'Wall Street - cooperative description',
            'description_neutral' => 'Wall Street - neutral description'
        ]);

        // Community
        Condition::create([
            'name' => 'Community',
            'location' => 'community',
            'design_chain' => 'comp#MD;coop#MD;neut#MD;comp#PD;coop#PD;neut#PD;comp#PT;coop#PT;neut#PT;',
            'bias_chain' => 'comp#80;coop#20;neut#50',
            'opponent_chain' => 'Robin',
            'randomize_design_iterations' => 1,
            'randomize_design_chain' => 1,
            'description_competitive' => 'Community - competitive description',
            'description_cooperative' => 'Community - cooperative description',
            'description_neutral' => 'Community - neutral description'
        ]);

        // Point Game
        Condition::create([
            'name' => 'Point Game',
            'location' => 'pointgame',
            'design_chain' => 'comp#MD;coop#MD;neut#MD;comp#PD;coop#PD;neut#PD;comp#PT;coop#PT;neut#PT;',
            'bias_chain' => 'comp#80;coop#20;neut#50',
            'opponent_chain' => 'Robin',
            'randomize_design_iterations' => 1,
            'randomize_design_chain' => 1,
            'description_competitive' => 'Point Game - competitive description',
            'description_cooperative' => 'Point Game - cooperative description',
            'description_neutral' => 'Point Game - neutral description'
        ]);
    }
}