<?php

use Illuminate\Database\Seeder;
use App\Models\Users\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'over_name' => '髙原' ,
                'under_name' => '鋼' ,
                'over_name_kana' => 'タカハラ' ,
                'under_name_kana' => 'ハガネ' ,
                'mail_address' => 'hagane@gmail.com',
                'sex' => '1',
                'birth_day' => '19990801',
                'role' => '4',
                'password' =>  bcrypt('pikachu')
            ]
        ]);

        // DB::table('users')->insert([
        //     [
        //         'over_name' => 'pika' ,
        //         'under_name' => 'chu' ,
        //         'over_name_kana' => 'ピカ' ,
        //         'under_name_kana' => 'チュウ' ,
        //         'mail_address' => 'pika@gmail.com',
        //         'sex' => '1',
        //         'birth_day' => '19990225',
        //         'role' => '1',
        //         'password' =>  bcrypt('pikapika')
        //     ]
        // ]);
    }
}