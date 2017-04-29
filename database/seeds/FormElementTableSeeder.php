<?php

use Illuminate\Database\Seeder;

class FormElementTableSeeder extends Seeder
{
    /**
     * Seeds the form_elements seeds.
     *
     * @return void
     */
    public function run()
    {
        // lock the primary key and drop what's in already
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('form_elements')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        #region seeds for form/demographics

        // participant number
        \App\Models\FormElement::create([
            'current_url' => 'form.demographics',
            'name' => 'demographics.number',
            'order' => '1',
            'tag_type' => 'input',
            'attr_name' => 'number',
            'attr_id' => 'number',
            'label' => 'Participant number',
            'attr_type' => 'number',
            'attr_placeholder' => 'e.g., 123'
        ]);

        // gender select
        \App\Models\FormElement::create([
            'current_url' => 'form.demographics',
            'name' => 'demographics.gender',
            'order' => '2',
            'tag_type' => 'select',
            'attr_name' => 'gender',
            'attr_id' => 'gender',
            'label' => 'Participant gender',
        ]);

        // age
        \App\Models\FormElement::create([
            'current_url' => 'form.demographics',
            'name' => 'demographics.age',
            'order' => '3',
            'tag_type' => 'input',
            'attr_name' => 'age',
            'attr_id' => 'age',
            'label' => 'Participant age',
            'attr_type' => 'number',
            'attr_placeholder' => 'e.g., 24'
        ]);

        // job
        \App\Models\FormElement::create([
            'current_url' => 'form.demographics',
            'name' => 'demographics.job',
            'order' => '4',
            'tag_type' => 'input',
            'attr_name' => 'job',
            'attr_id' => 'job',
            'label' => 'Participant job',
            'attr_type' => 'text',
            'attr_placeholder' => 'e.g., programmer'
        ]);

        #endregion


        #region seeds for form/expectation

        // participant expectation
        \App\Models\FormElement::create([
            'current_url' => 'form.expectation',
            'name' => 'expectation.expectation',
            'order' => '1',
            'tag_type' => 'textarea',
            'attr_name' => 'expectation',
            'attr_id' => 'expectation',
            'label' => 'Participant\'s expectation',
            'attr_placeholder' => 'e.g., your expectation'
        ]);

        #endregion


        #region seeds for form/feedback

        // participant feedback
        \App\Models\FormElement::create([
            'current_url' => 'form.feedback',
            'name' => 'expectation.feedback',
            'order' => '1',
            'tag_type' => 'textarea',
            'attr_name' => 'feedback',
            'attr_id' => 'feedback',
            'label' => 'Participant\'s feedback',
            'attr_placeholder' => 'e.g., your feedback'
        ]);

        #endregion
    }
}