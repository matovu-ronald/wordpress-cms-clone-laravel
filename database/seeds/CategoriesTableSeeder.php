<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // \DB::table('categories')->truncate();
        factory(App\Category::class, 5)
            ->create();
    }
}
