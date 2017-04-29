<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(StudyTableSeeder::class);
         $this->call(DesignTableSeeder::class);
         $this->call(ConditionTableSeeder::class);
         $this->call(InstructionTableSeeder::class);
         $this->call(FormElementTableSeeder::class);
         $this->call(SelectOptionTableSeeder::class);
         $this->call(PersonalityItemTableSeed::class);
         $this->call(ItemScaleTableSeed::class);
    }
}
