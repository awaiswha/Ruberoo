<?php

use Illuminate\Database\Seeder;

class UserProfile extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_profiles')->insert([
            [
                'first_name' => 'Abid',
                'user_idFk' => 1
            ],[
                'first_name' => 'Kashif',
                'user_idFk' => 2
            ],[
                'first_name' => 'Administrator',
                'user_idFk' => 3
            ]
        ]);
    }
}
