<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('settings')->delete();
        
        \DB::table('settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'key' => 'admin_description',
                'display_name' => 'Login description',
                'value' => 'Welcome to the Game Theory and Personality dashboard!',
                'details' => NULL,
                'type' => 'text_area',
                'order' => 0,
            ),
            1 => 
            array (
                'id' => 2,
                'key' => 'admin_title',
                'display_name' => 'Admin Title',
                'value' => 'Individual Differences',
                'details' => NULL,
                'type' => 'text',
                'order' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'key' => 'admin_icon_image',
                'display_name' => 'Admin Icon Image',
                'value' => 'settings/June2017/NAWo5NV7ipzxqzDG5x76.png',
                'details' => NULL,
                'type' => 'image',
                'order' => 2,
            ),
            3 => 
            array (
                'id' => 4,
                'key' => 'admin_bg_image',
                'display_name' => 'Background image',
                'value' => 'settings/April2018/gZLKnh8aRy9tdTr6xPNl.jpg',
                'details' => NULL,
                'type' => 'image',
                'order' => 3,
            ),
            4 => 
            array (
                'id' => 5,
                'key' => 'admin_favicon',
                'display_name' => 'Admin Favicon',
                'value' => 'settings/June2017/E7PTqwEfDRIxw5k7GIoy.png',
                'details' => NULL,
                'type' => 'image',
                'order' => 4,
            ),
            5 => 
            array (
                'id' => 6,
                'key' => 'admin_message',
                'display_name' => 'Admin Message',
                'value' => '<p>If you wish to leave a message to your test leader, or anybody else that uses the platform, here is the place to do it.</p>
<p>Feel free to use the \'rich text\' buttons to <span style="color: #ff6600;">e</span>n<span style="color: #003366;">h</span>a<span style="background-color: #339966;">n</span>c<strong>e</strong> <span style="text-decoration: underline;"><span style="color: #003366; text-decoration: underline;">the text</span></span>&nbsp;however you see fit.</p>
<p style="text-align: left;">You can also add <strong>images</strong> and <strong>tables</strong>.</p>',
                'details' => NULL,
                'type' => 'rich_text_box',
                'order' => 5,
            ),
            6 => 
            array (
                'id' => 7,
                'key' => 'user_dimmer_image',
                'display_name' => 'User dimmer image',
                'value' => 'settings/April2018/CVqecMZOzc8J9ZOBNnqn.jpg',
                'details' => NULL,
                'type' => 'image',
                'order' => 6,
            ),
        ));
        
        
    }
}