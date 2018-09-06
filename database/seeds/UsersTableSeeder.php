<?php

use App\User;
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
    	User::truncate();

        $suSytian = new User();
        $suSytian->username = 'admin';
        $suSytian->first_name = 'James';
        $suSytian->contact = '09302077586';
        $suSytian->address = '158 NPC Area B Talipapa Caloocan City';
        $suSytian->last_name = 'Masangcay';
        $suSytian->email = 'james.sytian@gmail.com';
        $suSytian->password = bcrypt('admin123');
        
        $suSytian->save();

    }
}
