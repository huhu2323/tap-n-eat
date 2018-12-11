<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// Category::create(['name' => 'Category 1', 'description' => 'Category 1']);
    	$category = new Category;
    	$category->name = "Category 1";
    	$category->description = "Category Description";
    	$category->save();
    }
}
