<?php

namespace Database\Seeders;
use App\Models\Feedback;
use DB;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('users')->insert([
//            'name' => 'admin',
//            'email' => 'admin@admin.ru',
//            'password' => bcrypt('LsdgFds345$s')
//        ]);
        DB::table('users')->insert([
            'name' => 'ruslan',
            'email' => 'ruslan@admin.ru',
            'password' => bcrypt('ruslan')
        ]);

    }
}
