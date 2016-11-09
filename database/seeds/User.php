<?php

use Illuminate\Database\Seeder;

class User extends Seeder
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
                'user_name' => 'Buyer',
                'email' => 'buyer@gmail.com',
                'password' => bcrypt('buyer'),
                'user_role_idFk' => 4
            ],[
                'user_name' => 'Seller',
                'email' => 'seller@gmail.com',
                'password' => bcrypt('seller'),
                'user_role_idFk' => 3
            ],[
                'user_name' => 'Admin',
                'email' => 'admin@ruberoo.com',
                'password' => bcrypt('admin'),
                'user_role_idFk' => 1
            ]
        ]);
    }
}
