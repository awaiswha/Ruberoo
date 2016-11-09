<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserRoles::class);
        $this->call(User::class);
        $this->call(UserProfile::class);
        $this->call(UserAlloweds::class);
        $this->call(SizeCategories::class);
    }
}
