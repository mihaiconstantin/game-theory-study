<?php

use Illuminate\Database\Seeder;

class StudyTableSeeder extends Seeder
{
    /**
     * Seeds the studies table.
     *
     * @return void
     */
    public function run()
    {
        // lock the primary key and drop what's in already
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('studies')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        \App\Models\Study::create([
            'name' => '2017_04_game_theory_02',
            'condition_set' => 'community, point, wallstreet',
            'practice' => 'training'
        ]);
    }

}
