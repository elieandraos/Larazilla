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
        $this->call(UserTableSeeder::class);
        $this->command->info('Users are seeded in db!'); 

        $this->call(ComponentTypeTableSeeder::class);
        $this->command->info('Components types are seeded in db!'); 

    }

    /**
     * truncates the table before seeding
     * @param type $table name
     * @return type
     */
    public function cleanUp($table)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table($table)->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}