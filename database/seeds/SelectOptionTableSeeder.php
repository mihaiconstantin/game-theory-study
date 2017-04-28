<?php

use Illuminate\Database\Seeder;

class SelectOptionTableSeeder extends Seeder
{
    /**
     * Run the select_options seeds.
     *
     * @return void
     */
    public function run()
    {
        // lock the primary key and drop what's in already
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('select_options')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        #region seeds for demographic.gender from form_elements

        // option 1
        \App\Models\SelectOption::create([
            'form_element_id' => 2,
            'order' => 1,
            'value' => 'option 1'
        ]);

        // option 2
        \App\Models\SelectOption::create([
            'form_element_id' => 2,
            'order' => 2,
            'value' => 'option 2'
        ]);

        // option 3
        \App\Models\SelectOption::create([
            'form_element_id' => 2,
            'order' => 3,
            'value' => 'option 3'
        ]);

        #endregion

    }
}
