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

        // personality items
        App\Models\ItemScale::create([
            'order' => '1',
            'text' => 'step 1'
        ]);

        App\Models\ItemScale::create([
            'order' => '2',
            'text' => 'step 2'
        ]);

        App\Models\ItemScale::create([
            'order' => '3',
            'text' => 'step 3'
        ]);

        App\Models\ItemScale::create([
            'order' => '4',
            'text' => 'step 4'
        ]);

        App\Models\ItemScale::create([
            'order' => '5',
            'text' => 'step 5'
        ]);

    }
}
