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

    #region demographic form elements

        #region gender options

        // male
        \App\Models\SelectOption::create([
            'form_element_id' => 2,
            'order' => 1,
            'value' => 0,
            'text' => 'male'
        ]);

        // female
        \App\Models\SelectOption::create([
            'form_element_id' => 2,
            'order' => 2,
            'value' => 1,
            'text' => 'female'
        ]);

        // rather not say
        \App\Models\SelectOption::create([
            'form_element_id' => 2,
            'order' => 3,
            'value' => 2,
            'text' => 'rather not say'
        ]);

        #endregion


        #region marital status options

        // single
        \App\Models\SelectOption::create([
            'form_element_id' => 3,
            'order' => 1,
            'value' => 1,
            'text' => 'single'
        ]);

        // in a relationship
        \App\Models\SelectOption::create([
            'form_element_id' => 3,
            'order' => 2,
            'value' => 2,
            'text' => 'in a relationship'
        ]);

        // married
        \App\Models\SelectOption::create([
            'form_element_id' => 3,
            'order' => 3,
            'value' => 3,
            'text' => 'married'
        ]);

        // separated
        \App\Models\SelectOption::create([
            'form_element_id' => 3,
            'order' => 4,
            'value' => 4,
            'text' => 'separated'
        ]);

        // other
        \App\Models\SelectOption::create([
            'form_element_id' => 3,
            'order' => 5,
            'value' => 5,
            'text' => 'other'
        ]);

        #endregion


        #region ethnicity options

        // African-American (non-Hispanic)
        \App\Models\SelectOption::create([
            'form_element_id' => 4,
            'order' => 1,
            'value' => 1,
            'text' => 'African-American (non-Hispanic)'
        ]);

        // Asian/Pacific Islanders
        \App\Models\SelectOption::create([
            'form_element_id' => 4,
            'order' => 2,
            'value' => 2,
            'text' => 'Asian/Pacific Islanders'
        ]);

        // Caucasian (non-Hispanic)
        \App\Models\SelectOption::create([
            'form_element_id' => 4,
            'order' => 3,
            'value' => 3,
            'text' => 'Caucasian (non-Hispanic)'
        ]);

        // Latino or Hispanic
        \App\Models\SelectOption::create([
            'form_element_id' => 4,
            'order' => 4,
            'value' => 4,
            'text' => 'Latino or Hispanic'
        ]);

        // Native American or Aleut
        \App\Models\SelectOption::create([
            'form_element_id' => 4,
            'order' => 5,
            'value' => 5,
            'text' => 'Native American or Aleut'
        ]);

        #endregion


        #region education options

        // no schooling completed
        \App\Models\SelectOption::create([
            'form_element_id' => 5,
            'order' => 1,
            'value' => 1,
            'text' => 'no schooling completed'
        ]);

        // some high school, no diploma
        \App\Models\SelectOption::create([
            'form_element_id' => 5,
            'order' => 2,
            'value' => 2,
            'text' => 'some high school, no diploma'
        ]);

        // high school graduate, diploma or the equivalent
        \App\Models\SelectOption::create([
            'form_element_id' => 5,
            'order' => 3,
            'value' => 3,
            'text' => 'high school graduate, diploma or the equivalent'
        ]);

        // trade/ technical/ vocational training
        \App\Models\SelectOption::create([
            'form_element_id' => 5,
            'order' => 4,
            'value' => 4,
            'text' => 'trade/ technical/ vocational training'
        ]);

        // associate degree
        \App\Models\SelectOption::create([
            'form_element_id' => 5,
            'order' => 5,
            'value' => 5,
            'text' => 'associate degree'
        ]);

        // bachelor’s degree
        \App\Models\SelectOption::create([
            'form_element_id' => 5,
            'order' => 6,
            'value' => 6,
            'text' => 'bachelor’s degree'
        ]);

        // master’s degree
        \App\Models\SelectOption::create([
            'form_element_id' => 5,
            'order' => 7,
            'value' => 7,
            'text' => 'master’s degree'
        ]);

        // professional degree
        \App\Models\SelectOption::create([
            'form_element_id' => 5,
            'order' => 8,
            'value' => 8,
            'text' => 'professional degree'
        ]);

        // doctorate degree
        \App\Models\SelectOption::create([
            'form_element_id' => 5,
            'order' => 9,
            'value' => 9,
            'text' => 'doctorate degree'
        ]);

        // other
        \App\Models\SelectOption::create([
            'form_element_id' => 5,
            'order' => 10,
            'value' => 10,
            'text' => 'other'
        ]);

        #endregion


        #region employment options

        // employment
        \App\Models\SelectOption::create([
            'form_element_id' => 6,
            'order' => 1,
            'value' => 1,
            'text' => 'employment'
        ]);

        // self-employed
        \App\Models\SelectOption::create([
            'form_element_id' => 6,
            'order' => 2,
            'value' => 2,
            'text' => 'self-employed'
        ]);

        // out of work and looking for work
        \App\Models\SelectOption::create([
            'form_element_id' => 6,
            'order' => 3,
            'value' => 3,
            'text' => 'out of work and looking for work'
        ]);

        // out of work but not currently looking for work
        \App\Models\SelectOption::create([
            'form_element_id' => 6,
            'order' => 4,
            'value' => 4,
            'text' => 'out of work but not currently looking for work'
        ]);

        // homemaker
        \App\Models\SelectOption::create([
            'form_element_id' => 6,
            'order' => 5,
            'value' => 5,
            'text' => 'homemaker'
        ]);

        // student
        \App\Models\SelectOption::create([
            'form_element_id' => 6,
            'order' => 6,
            'value' => 6,
            'text' => 'student'
        ]);

        // retired
        \App\Models\SelectOption::create([
            'form_element_id' => 6,
            'order' => 7,
            'value' => 7,
            'text' => 'retired'
        ]);

        // unable to work
        \App\Models\SelectOption::create([
            'form_element_id' => 6,
            'order' => 8,
            'value' => 8,
            'text' => 'unable to work'
        ]);

        // other
        \App\Models\SelectOption::create([
            'form_element_id' => 6,
            'order' => 9,
            'value' => 9,
            'text' => 'other'
        ]);

        #endregion

    #endregion


    #region expectation

        # region understanding options

        // yes
        \App\Models\SelectOption::create([
            'form_element_id' => 7,
            'order' => 1,
            'value' => 1,
            'text' => 'yes'
        ]);

        // no
        \App\Models\SelectOption::create([
            'form_element_id' => 7,
            'order' => 0,
            'value' => 0,
            'text' => 'no'
        ]);

        #endregion


        #region expectation options

        // competitive
        \App\Models\SelectOption::create([
            'form_element_id' => 8,
            'order' => 1,
            'value' => 1,
            'text' => 'competitive'
        ]);

        // cooperative
        \App\Models\SelectOption::create([
            'form_element_id' => 8,
            'order' => 2,
            'value' => 2,
            'text' => 'cooperative'
        ]);

        // neutral
        \App\Models\SelectOption::create([
            'form_element_id' => 8,
            'order' => 3,
            'value' => 3,
            'text' => 'neutral'
        ]);

        #endregion

    #endregion


    #region feedback form elements

        #region related options

        // yes
        \App\Models\SelectOption::create([
            'form_element_id' => 10,
            'order' => 1,
            'value' => 1,
            'text' => 'yes'
        ]);

        // no
        \App\Models\SelectOption::create([
            'form_element_id' => 10,
            'order' => 1,
            'value' => 0,
            'text' => 'no'
        ]);

        #endregion

    #endregion

    }
}
