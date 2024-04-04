<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\MajorCategory;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $major_category_names = [
            '和食', '洋食', 'カレー'
        ];

        $japanese_food_categories = [
            '寿司', '天ぷら', 'そば', 'うなぎ・あなご', 'うどん'
        ];

        $western_food_categories = [
            'ステーキ', '洋食', 'フレンチ', 'イタリアン'
        ];

        $curry_categories = [
            'カレー', 'インドカレー', 'スープカレー'
        ];

        foreach ($major_category_names as $major_category_name) {
            if ($major_category_name == '和食') {
                MajorCategory::create([
                    'name' => $major_category_name,
                    'description' => $major_category_name,
                ]);

                foreach ($japanese_food_categories as $japanese_food_category) {
                    Category::create([
                        'name' => $japanese_food_category,
                        'description' => $japanese_food_category,
                        'major_category_id' => '1'
                    ]);
                }
            }

            if ($major_category_name == '洋食') {
                MajorCategory::create([
                    'name' => $major_category_name,
                    'description' => $major_category_name,
                ]);
                foreach ($western_food_categories as $western_food_category) {
                    Category::create([
                        'name' => $western_food_category,
                        'description' => $western_food_category,
                        'major_category_id' => '2'
                    ]);
                }
            }

            if ($major_category_name == 'カレー') {
                MajorCategory::create([
                    'name' => $major_category_name,
                    'description' => $major_category_name,
                ]);
                foreach ($curry_categories as $curry_category) {
                    Category::create([
                        'name' => $curry_category,
                        'description' => $curry_category,
                        'major_category_id' => '3'
                    ]);
                }
            }
        }
    }
}
