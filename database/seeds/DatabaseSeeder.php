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
        /* App seeders. */
        $this->call(StudyTableSeeder::class);
        $this->call(DesignTableSeeder::class);
        $this->call(ConditionTableSeeder::class);
        $this->call(InstructionTableSeeder::class);
        $this->call(FormElementTableSeeder::class);
        $this->call(SelectOptionTableSeeder::class);
        $this->call(PersonalityItemTableSeeder::class);
        $this->call(ItemScaleTableSeeder::class);
        $this->call(StudyLoaderTableSeeder::class);
        
        /* Auto-generated Voyager seeders. */
        $this->call(DataTypesTableSeeder::class);
        $this->call(DataRowsTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(MenuItemsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
