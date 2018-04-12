<?php

use Illuminate\Database\Seeder;

class DataTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('data_types')->delete();
        
        \DB::table('data_types')->insert(array (
            0 => 
            array (
                'id' => 3,
                'name' => 'users',
                'slug' => 'users',
                'display_name_singular' => 'User',
                'display_name_plural' => 'Users',
                'icon' => 'voyager-person',
                'model_name' => 'TCG\\Voyager\\Models\\User',
                'controller' => '',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'created_at' => '2017-05-07 21:33:07',
                'updated_at' => '2017-05-07 21:33:07',
            ),
            1 => 
            array (
                'id' => 5,
                'name' => 'menus',
                'slug' => 'menus',
                'display_name_singular' => 'Menu',
                'display_name_plural' => 'Menus',
                'icon' => 'voyager-list',
                'model_name' => 'TCG\\Voyager\\Models\\Menu',
                'controller' => '',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'created_at' => '2017-05-07 21:33:07',
                'updated_at' => '2017-05-07 21:33:07',
            ),
            2 => 
            array (
                'id' => 6,
                'name' => 'roles',
                'slug' => 'roles',
                'display_name_singular' => 'Role',
                'display_name_plural' => 'Roles',
                'icon' => 'voyager-lock',
                'model_name' => 'TCG\\Voyager\\Models\\Role',
                'controller' => '',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'created_at' => '2017-05-07 21:33:07',
                'updated_at' => '2017-05-07 21:33:07',
            ),
            3 => 
            array (
                'id' => 7,
                'name' => 'conditions',
                'slug' => 'conditions',
                'display_name_singular' => 'Condition',
                'display_name_plural' => 'Conditions',
                'icon' => NULL,
                'model_name' => 'App\\Models\\Condition',
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'created_at' => '2017-05-07 22:24:08',
                'updated_at' => '2017-05-07 22:24:08',
            ),
            4 => 
            array (
                'id' => 8,
                'name' => 'data_participants',
                'slug' => 'data-participants',
                'display_name_singular' => 'Data Participant',
                'display_name_plural' => 'Data Participants',
                'icon' => 'voyager-people',
                'model_name' => 'App\\Models\\DataParticipant',
                'controller' => NULL,
                'description' => 'A place where you can see all the people that have been joined the study so far.',
                'generate_permissions' => 1,
                'server_side' => 1,
                'created_at' => '2017-05-07 22:38:35',
                'updated_at' => '2017-06-08 16:14:56',
            ),
            5 => 
            array (
                'id' => 9,
                'name' => 'designs',
                'slug' => 'designs',
                'display_name_singular' => 'Design',
                'display_name_plural' => 'Designs',
                'icon' => 'voyager-paint-bucket',
                'model_name' => 'App\\Models\\Design',
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'created_at' => '2017-05-07 22:46:22',
                'updated_at' => '2017-05-07 22:46:22',
            ),
            6 => 
            array (
                'id' => 10,
                'name' => 'instructions',
                'slug' => 'instructions',
                'display_name_singular' => 'Instruction',
                'display_name_plural' => 'Instructions',
                'icon' => 'voyager-news',
                'model_name' => 'App\\Models\\Instruction',
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'created_at' => '2017-05-07 22:55:26',
                'updated_at' => '2017-05-07 22:55:26',
            ),
            7 => 
            array (
                'id' => 11,
                'name' => 'form_elements',
                'slug' => 'form-elements',
                'display_name_singular' => 'Form Element',
                'display_name_plural' => 'Form Elements',
                'icon' => NULL,
                'model_name' => 'App\\Models\\FormElement',
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'created_at' => '2017-05-07 23:37:07',
                'updated_at' => '2017-05-07 23:37:07',
            ),
            8 => 
            array (
                'id' => 12,
                'name' => 'select_options',
                'slug' => 'select-options',
                'display_name_singular' => 'Select Option',
                'display_name_plural' => 'Select Options',
                'icon' => NULL,
                'model_name' => 'App\\Models\\SelectOption',
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'created_at' => '2017-05-07 23:41:09',
                'updated_at' => '2017-05-07 23:41:09',
            ),
            9 => 
            array (
                'id' => 13,
                'name' => 'studies',
                'slug' => 'studies',
                'display_name_singular' => 'Study',
                'display_name_plural' => 'Studies',
                'icon' => NULL,
                'model_name' => 'App\\Models\\Study',
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'created_at' => '2017-05-07 23:44:35',
                'updated_at' => '2017-05-07 23:44:35',
            ),
            10 => 
            array (
                'id' => 15,
                'name' => 'study_loaders',
                'slug' => 'study-loaders',
                'display_name_singular' => 'Study Loader',
                'display_name_plural' => 'Study Loaders',
                'icon' => NULL,
                'model_name' => 'App\\Models\\StudyLoader',
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'created_at' => '2017-05-07 23:52:51',
                'updated_at' => '2017-05-07 23:52:51',
            ),
            11 => 
            array (
                'id' => 16,
                'name' => 'personality_items',
                'slug' => 'personality-items',
                'display_name_singular' => 'Personality Item',
                'display_name_plural' => 'Personality Items',
                'icon' => NULL,
                'model_name' => 'App\\Models\\PersonalityItem',
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'created_at' => '2017-05-07 23:55:27',
                'updated_at' => '2017-05-07 23:55:27',
            ),
            12 => 
            array (
                'id' => 17,
                'name' => 'item_scales',
                'slug' => 'item-scales',
                'display_name_singular' => 'Item Scale',
                'display_name_plural' => 'Item Scales',
                'icon' => NULL,
                'model_name' => 'App\\Models\\ItemScale',
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'created_at' => '2017-05-07 23:59:09',
                'updated_at' => '2017-05-07 23:59:09',
            ),
        ));
        
        
    }
}