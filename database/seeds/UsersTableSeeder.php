<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'role_id' => 1,
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'avatar' => 'users/default.png',
                'password' => '$2y$10$BTSTw2v/x77H4lJ.QmGYFO6tW/sKwgA39q..d1ZNOLURGZQWJA/Lq',
                'remember_token' => NULL,
                'created_at' => '2018-04-12 17:20:22',
                'updated_at' => '2018-04-12 17:20:22',
            ),
        ));
        
        
    }
}