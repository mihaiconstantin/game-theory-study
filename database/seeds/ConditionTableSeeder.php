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
            'bias_chain' => 'comp#80',
            'random_design_iteration' => 0,
            'random_design_chain' => 0,
            'opponent' => 'Robin',
            'title' => 'Training',
            'text_chain' => 'comp#Text comp'
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
            'text_chain' => 'comp#Text comp;coop#Text coop;neut#Text neut'
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
            'text_chain' => 'comp#Text comp;coop#Text coop;neut#Text neut'
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
            'text_chain' => 'comp#Text comp;coop#Text coop;neut#Text neut'
        ]);
    }
}