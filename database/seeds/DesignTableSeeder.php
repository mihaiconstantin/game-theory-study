<?php

use App\Models\Design;
use Illuminate\Database\Seeder;

class DesignTableSeeder extends Seeder
{
    /**
     * Seeds the designs table.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('designs')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        // practice
        Design::create([
            'name' => 'PR',
            'iterations' => 2,
            'outcome_1_value' => '1#1;+4#+4',
            'outcome_2_value' => '1#2;+12#+8',
            'outcome_3_value' => '2#1;+8#+12',
            'outcome_4_value' => '2#2;+1#+1',
            'label' => 'points',
            'outcome_1_description' => '1#1; one - one',
            'outcome_2_description' => '1#2; one - two',
            'outcome_3_description' => '2#1; two - one',
            'outcome_4_description' => '2#2; two - two',
        ]);

        // MD
        Design::create([
            'name' => 'MD',
            'iterations' => 2,
            'outcome_1_value' => '1#1;+80#+80',
            'outcome_2_value' => '1#2;-20#+40',
            'outcome_3_value' => '2#1;+40#-20',
            'outcome_4_value' => '2#2;+5#+5',
            'label' => 'points',
            'outcome_1_description' => '1#1; one - one',
            'outcome_2_description' => '1#2; one - two',
            'outcome_3_description' => '2#1; two - one',
            'outcome_4_description' => '2#2; two - two',
        ]);

        // PD
        Design::create([
            'name' => 'PD',
            'iterations' => 2,
            'outcome_1_value' => '1#1;+40#+40',
            'outcome_2_value' => '1#2;-20#+80',
            'outcome_3_value' => '2#1;+80#-20',
            'outcome_4_value' => '2#2;+5#+5',
            'label' => 'points',
            'outcome_1_description' => '1#1; one - one',
            'outcome_2_description' => '1#2; one - two',
            'outcome_3_description' => '2#1; two - one',
            'outcome_4_description' => '2#2; two - two',
        ]);

        // PT
        Design::create([
            'name' => 'PT',
            'iterations' => 2,
            'outcome_1_value' => '1#1;+10#+10',
            'outcome_2_value' => '1#2;+10#+10',
            'outcome_3_value' => '2#1;+10#+10',
            'outcome_4_value' => '2#2;+10#+10',
            'label' => 'points',
            'outcome_1_description' => '1#1; one - one',
            'outcome_2_description' => '1#2; one - two',
            'outcome_3_description' => '2#1; two - one',
            'outcome_4_description' => '2#2; two - two',
        ]);
    }

}