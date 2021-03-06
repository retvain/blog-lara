<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [];

        $categoryName = 'Без категории';
        $categories[] = [
            'title' => $categoryName,
            'slug' => Str::slug($categoryName),
            'parent_id' => 0,
        ];


        for ($i = 2; $i <= 11; $i++) {
            $categoryName = 'Категория #'.$i;
            $parentId = ($i > 4) ? rand(1,4) : 1;

            $categories[] = [
                'title' => $categoryName,
                'slug' => Str::slug($categoryName),
                'parent_id' => $parentId,
            ];

        }

        //insert data
        DB::table('blog_categories')->insert($categories);

    }
}
