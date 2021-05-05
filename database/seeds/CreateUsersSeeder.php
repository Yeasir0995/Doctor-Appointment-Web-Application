<?php

use Illuminate\Database\Seeder;
use App\User;
class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=[
            [
                'name'=>'Admin',
                'lastname'=>'tahmid',
                'dob'=>'1996-06-26',
                'email'=>'t@gmail.com',
                'is_Admin'=>'1',
                'password'=>bcrypt('78945698'),


            ],
            [
                'name'=>'User',
                'email'=>'sm@gmail.com',
                 'is_admin'=>'0',
                'password'=> bcrypt('12345686'),
             ],
            ];
            foreach($user as $key =>$value)
            {
                User::create($value);
            }
    }
}
