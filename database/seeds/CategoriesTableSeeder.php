<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(array(

            'name' => 'Software',
            
        ));


        Category::create(array(

            'name' => 'Hardware',
            
        ));


        Category::create(array(

            'name' => 'Internet',
           
        ));
    }
}
