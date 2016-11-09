<?php

use Illuminate\Database\Seeder;

class SizeCategories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('size_categories')->insert([
            [
                's_cat_name' => 'Small'
            ],[
                's_cat_name' => 'Medium'
            ],[
                's_cat_name' => 'Large'
            ]
        ]);
    }
}
