<?php

use Illuminate\Database\Seeder;
use \App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Aayushi Shah',
            'email' => 'aayushi@gmail.com',
            'password' => bcrypt('password')
        ]);

        $user->resturants()->create([
            'name'=> 'Highway Street',
            'location' => 'Bhuvandas Road, NH14 Dadar, Mumbai',
            'tables' =>10,
        ]);

        $user->resturants()->create([
            'name'=> 'Mainland China',
            'location' => 'Platinum Tech Park Vashi, Navi Mumbai',
            'tables' =>15,
        ]);

        $user->resturants()->create([
            'name'=> 'The Machan',
            'location' => 'Lonavala Lake Road, Lonavala',
            'tables' =>8,
        ]);
    }
}
