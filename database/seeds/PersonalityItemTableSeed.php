<?php

use Illuminate\Database\Seeder;

class PersonalityItemTableSeed extends Seeder
{
    /**
     * Run the personality_items table seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('personality_items')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');


        #region hexaco items

        App\Models\PersonalityItem::create([
            'order' => '1',
            'text' => 'Item 1'
        ]);

        App\Models\PersonalityItem::create([
            'order' => '2',
            'text' => 'Item 2'
        ]);

        App\Models\PersonalityItem::create([
            'order' => '3',
            'text' => 'Item 3'
        ]);

        App\Models\PersonalityItem::create([
            'order' => '4',
            'text' => 'Item 4'
        ]);

        App\Models\PersonalityItem::create([
            'order' => '5',
            'text' => 'Item 5'
        ]);

        #endregion


        #region bfi items

        App\Models\PersonalityItem::create([
            'order' => '1',
            'text' => 'Item 1',
            'name' => 'bfi'
        ]);

        App\Models\PersonalityItem::create([
            'order' => '2',
            'text' => 'Item 2',
            'name' => 'bfi'
        ]);

        App\Models\PersonalityItem::create([
            'order' => '3',
            'text' => 'Item 3',
            'name' => 'bfi'
        ]);

        App\Models\PersonalityItem::create([
            'order' => '4',
            'text' => 'Item 4',
            'name' => 'bfi'
        ]);

        App\Models\PersonalityItem::create([
            'order' => '5',
            'text' => 'Item 5',
            'name' => 'bfi'
        ]);

        #endregion

    }
}
