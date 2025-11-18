<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c1 = Category::create(['name'=>'Category 1']);
        Category::create(['name'=>'Category 1-1', 'parent_id' => $c1->id]);
        Category::create(['name'=>'Category 1-2', 'parent_id' => $c1->id]);

        $c2 = Category::create(['name'=>'Category 2']);
        Category::create(['name'=>'Category 2-1', 'parent_id' => $c2->id]);
        Category::create(['name'=>'Category 2-2', 'parent_id' => $c2->id]);
    }
}
