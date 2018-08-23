<?php

use App\Models\StudyLoader;
use Illuminate\Database\Seeder;

class StudyLoaderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // lock the primary key and drop what's in already
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('study_loaders')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        // Training
        StudyLoader::create([
            // 'load_study' => '2017_04_game_theory_02',
            'load_study' => '2018_08_game_theory_10',
        ]);
    }
}
