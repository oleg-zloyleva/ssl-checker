<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'name' => "Admin",
            'email' => "admin@test.com",
            'password' => bcrypt("123456789"),
        ]);
        factory(User::class, 10)->create();
    }
}
