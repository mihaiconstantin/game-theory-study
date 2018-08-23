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

        \App\Models\Study::create([
            'name' => '2018_08_game_theory_10',
            'condition_set' => 'A2, B2, C2, D2, E2, F2, G2, H2, A1, B1, C1, D1, E1, F1, G1, H1',
            'practice' => 'training'
        ]);
    }

}
