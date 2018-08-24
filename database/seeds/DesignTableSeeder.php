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
            'iterations' => 3,
            'outcome_1_value' => '1#1;+4#+4',
            'outcome_2_value' => '1#2;+12#+8',
            'outcome_3_value' => '2#1;+8#+12',
            'outcome_4_value' => '2#2;+1#+1',
            'label' => 'MUs',
            'outcome_1_description' => '1#1;You both choose option 1. You both receive 4 MUs.',
            'outcome_2_description' => '1#2;The other player chooses option 2, while you choose option 1. De other player receives 12 MUs. You receive 8 MUs.',
            'outcome_3_description' => '2#1;The other player chooses option 1, while you choose option 2. The other player receives 8 MUs. You receive 12 MUs.',
            'outcome_4_description' => '2#2;You both choose option 2. You both receive 1 MU.'
        ]);

        // MD
        Design::create([
            'name' => 'MD',
            'iterations' => 10,
            'outcome_1_value' => '1#1;+80#+80',
            'outcome_2_value' => '1#2;-20#+40',
            'outcome_3_value' => '2#1;+40#-20',
            'outcome_4_value' => '2#2;+5#+5',
            'label' => 'MUs',
            'outcome_1_description' => '1#1;You both choose option 1. You both receive 80 MUs.',
            'outcome_2_description' => '1#2;The other player chooses option 2, while you choose option 1. The other player receives 40 MUs. You lose 20 MUs.',
            'outcome_3_description' => '2#1;The other player chooses option 1, while you choose option 2. The other player loses 20 MUs. You receive 40 MUs.',
            'outcome_4_description' => '2#2;You both choose option 2. You both receive 5 MUs.'
        ]);

        // PD
        Design::create([
            'name' => 'PD',
            'iterations' => 10,
            'outcome_1_value' => '1#1;+40#+40',
            'outcome_2_value' => '1#2;-20#+80',
            'outcome_3_value' => '2#1;+80#-20',
            'outcome_4_value' => '2#2;+5#+5',
            'label' => 'MUs',
            'outcome_1_description' => '1#1;You both choose option 1. You both receive 40 MUs.',
            'outcome_2_description' => '1#2;The other player chooses option 2, while you choose option 1. The other player receives 80 MUs. You lose 20 MUs.',
            'outcome_3_description' => '2#1;The other player chooses option 1, while you choose option 2. The other player loses 20 MUs. You receive 80 MUs.',
            'outcome_4_description' => '2#2;You both choose option 2. You both receive 5 MUs.'
        ]);

        // PT
        Design::create([
            'name' => 'PT',
            'iterations' => 10,
            'outcome_1_value' => '1#1;+52.5#+52.5',
            'outcome_2_value' => '1#2;0#+52.5',
            'outcome_3_value' => '2#1;+52.5#0',
            'outcome_4_value' => '2#2;0#0',
            'label' => 'MUs',
            'outcome_1_description' => '1#1;You both choose option 1. You both receive 52.5 MUs.',
            'outcome_2_description' => '1#2;The other player chooses option 2, while you choose option 1. The other player receives 52.5 MUs. You receive 0 MUs.',
            'outcome_3_description' => '2#1;The other player chooses option 1, while you choose option 2. The other player receives 0 MUs. You receive 52.5 MUs.',
            'outcome_4_description' => '2#2;You both choose option 2. You both receive 0 MUs.'
        ]);
    }

}