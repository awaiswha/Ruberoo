<?php

use Illuminate\Database\Seeder;

class UserAlloweds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_alloweds')->insert([
            [
                'user_idFk' => 2,
                'number_of' => 5,
                'per_project' => 100,
                'price' => 0,
            ]
        ]);
    }
}
