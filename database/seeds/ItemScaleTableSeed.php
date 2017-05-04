<?php

use Illuminate\Database\Seeder;

class ItemScaleTableSeed extends Seeder
{
    /**
     * Run the item_scales table seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('item_scales')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');


        #region hexaco scale

        App\Models\ItemScale::create([
            'order' => '1',
            'text' => 'strongly disagree'
        ]);

        App\Models\ItemScale::create([
            'order' => '2',
            'text' => 'disagree'
        ]);

        App\Models\ItemScale::create([
            'order' => '3',
            'text' => 'neither agree nor disagree'
        ]);

        App\Models\ItemScale::create([
            'order' => '4',
            'text' => 'agree'
        ]);

        App\Models\ItemScale::create([
            'order' => '5',
            'text' => 'strongly agree'
        ]);

        #endregion


        #region bfi scale

        App\Models\ItemScale::create([
            'order' => '1',
            'text' => 'strongly disagree',
            'name' => 'bfi'
        ]);

        App\Models\ItemScale::create([
            'order' => '2',
            'text' => 'disagree',
            'name' => 'bfi'
        ]);

        App\Models\ItemScale::create([
            'order' => '3',
            'text' => 'neither agree nor disagree',
            'name' => 'bfi'
        ]);

        App\Models\ItemScale::create([
            'order' => '4',
            'text' => 'agree',
            'name' => 'bfi'
        ]);

        App\Models\ItemScale::create([
            'order' => '5',
            'text' => 'strongly agree',
            'name' => 'bfi'
        ]);

        #endregion


        #region in-between-games scale

        App\Models\ItemScale::create([
            'order' => '1',
            'text' => 'strongly disagree',
            'name' => 'game_question'
        ]);

        App\Models\ItemScale::create([
            'order' => '2',
            'text' => 'disagree',
            'name' => 'game_question'
        ]);

        App\Models\ItemScale::create([
            'order' => '3',
            'text' => 'neither agree nor disagree',
            'name' => 'game_question'
        ]);

        App\Models\ItemScale::create([
            'order' => '4',
            'text' => 'agree',
            'name' => 'game_question'
        ]);

        App\Models\ItemScale::create([
            'order' => '5',
            'text' => 'strongly agree',
            'name' => 'game_question'
        ]);

        #endregion

    }
}
