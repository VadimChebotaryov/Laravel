<?php


namespace Database\Seeders;

use App\Models\User;

class UsersTableSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->admin()->withEmail('admin@admin.com')->create();
        User::factory(10)->create();
    }
}
