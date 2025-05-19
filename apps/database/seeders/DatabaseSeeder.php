<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345'),
            'username' => 'admin',
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
