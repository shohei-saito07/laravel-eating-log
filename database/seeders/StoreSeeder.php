<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Store;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ProductFactoryクラスで定義した内容にもとづいてダミーデータを20件生成し、storeテーブルに追加する
        Store::factory()->count(20)->create();
    }
}
