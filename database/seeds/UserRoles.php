<?php

use Illuminate\Database\Seeder;

class UserRoles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_roles')->insert([
            [
                'role_title' => 'Super Admin'
            ],[
                'role_title' => 'Admin'
            ],[
                'role_title' => 'Seller'
            ],[
                'role_title' => 'Buyer'
            ]
        ]);
    }
}
