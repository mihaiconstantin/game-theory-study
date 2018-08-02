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

        // age
        \App\Models\FormElement::create([
            'current_url' => 'form.demographics',
            'name' => 'demographics.age',
            'order' => '1',
            'tag_type' => 'input',
            'attr_name' => 'age',
            'attr_id' => 'age',
            'label' => 'What is your age age?',
            'attr_type' => 'number',
            'attr_placeholder' => 'e.g., 30'
        ]);

        // gender select
        \App\Models\FormElement::create([
            'current_url' => 'form.demographics',
            'name' => 'demographics.gender',
            'order' => '2',
            'tag_type' => 'select',
            'attr_name' => 'gender',
            'attr_id' => 'gender',
            'label' => 'What is your gender?',
        ]);

        // marital status select
        \App\Models\FormElement::create([
            'current_url' => 'form.demographics',
            'name' => 'demographics.martial',
            'order' => '3',
            'tag_type' => 'select',
            'attr_name' => 'marital',
            'attr_id' => 'marital',
            'label' => 'What is your marital status?',
        ]);

        // ethnicity select
        \App\Models\FormElement::create([
            'current_url' => 'form.demographics',
            'name' => 'demographics.ethnicity',
            'order' => '4',
            'tag_type' => 'select',
            'attr_name' => 'ethnicity',
            'attr_id' => 'ethnicity',
            'label' => 'To which racial or ethnic group do you most identify?',
        ]);

        // education select
        \App\Models\FormElement::create([
            'current_url' => 'form.demographics',
            'name' => 'demographics.education',
            'order' => '5',
            'tag_type' => 'select',
            'attr_name' => 'education',
            'attr_id' => 'education',
            'label' => 'What is the highest degree or level of school you have completed?',
        ]);

        // employment select
        \App\Models\FormElement::create([
            'current_url' => 'form.demographics',
            'name' => 'demographics.employment',
            'order' => '6',
            'tag_type' => 'select',
            'attr_name' => 'employment',
            'attr_id' => 'employment',
            'label' => 'What is your current employment status?',
        ]);
        #endregion


        #region seeds for form/expectation

        // participant understanding
        \App\Models\FormElement::create([
            'current_url' => 'form.expectation',
            'name' => 'expectation.understanding',
            'order' => '1',
            'tag_type' => 'select',
            'attr_name' => 'understanding',
            'attr_id' => 'understanding',
            'label' => 'Do you understand how this game is played?',
        ]);


        // participant expectation
        \App\Models\FormElement::create([
            'current_url' => 'form.expectation',
            'name' => 'expectation.expectation',
            'order' => '2',
            'tag_type' => 'select',
            'attr_name' => 'expectation',
            'attr_id' => 'expectation',
            'label' => 'How do you expect your opponent to behave throughout the games?',
        ]);

        #endregion


        #region seeds for form/feedback

        // unclear parts
        \App\Models\FormElement::create([
            'current_url' => 'form.feedback',
            'name' => 'feedback.unclear',
            'order' => '1',
            'tag_type' => 'textarea',
            'attr_name' => 'unclear',
            'attr_id' => 'unclear',
            'label' => 'I did not understand the following instructions:',
        ]);

        // related parts
        \App\Models\FormElement::create([
            'current_url' => 'form.feedback',
            'name' => 'feedback.related',
            'order' => '2',
            'tag_type' => 'select',
            'attr_name' => 'related',
            'attr_id' => 'related',
            'label' => 'Do you think the different components of this study are related?',
        ]);

        // details
        \App\Models\FormElement::create([
            'current_url' => 'form.feedback',
            'name' => 'feedback.details',
            'order' => '3',
            'tag_type' => 'textarea',
            'attr_name' => 'details',
            'attr_id' => 'details',
            'attr_required' => 0,
            'label' => 'If yes, please explain why you think the different components of this study are related',
        ]);

        #endregion


        #region elements already belonging to a region and added at later stages
        // They must be here because, at the moment, the ID is autogenerated and the `select_options` table will get out of sync.

        // (parent region: form/demographics) origin country
        \App\Models\FormElement::create([
            'current_url' => 'form.demographics',
            'name' => 'demographics.country',
            'order' => '7',
            'tag_type' => 'input',
            'attr_name' => 'country',
            'attr_id' => 'country',
            'label' => 'What is your current country?',
        ]);

        #endregion


        #region seeds for form/opponent-evaluation

        \App\Models\FormElement::create([
            'current_url' => 'form.opponent-evaluation',
            'name' => 'opponent-evaluation.opinion',
            'order' => '1',
            'tag_type' => 'select',
            'attr_name' => 'opinion',
            'attr_id' => 'opinion',
            'label' => 'Opinion?',
        ]);

        \App\Models\FormElement::create([
            'current_url' => 'form.opponent-evaluation',
            'name' => 'opponent-evaluation.realization',
            'order' => '2',
            'tag_type' => 'select',
            'attr_name' => 'realization',
            'attr_id' => 'realization',
            'label' => 'Realization?',
        ]);

        #endregion

    }
}
