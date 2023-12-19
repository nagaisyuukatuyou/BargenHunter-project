<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categories = [
            ['title' => '青果', 'sub_title' => '野菜と果物', 'image' => 'seika.jpg'],
            ['title' => '飲料水', 'sub_title' => '飲料水', 'image' => 'innryou.jpg'],
            ['title' => '肉類', 'sub_title' => '鶏肉、豚肉など', 'image' => 'seiniku.jpg'],
            ['title' => '鮮魚', 'sub_title' => 'イワシ、アジなど', 'image' => 'sengyo.jpg'],
            ['title' => 'アイスクリーム', 'sub_title' => 'アイスクリーム', 'image' => 'ice_cream.jpg'],
            ['title' => '冷凍食品', 'sub_title' => '冷凍', 'image' => 'reitoushokuhin.jpg'],
            ['title' => 'お菓子', 'sub_title' => '食事以外の嗜好品', 'image' => 'okashi.jpg'],
            ['title' => '缶詰め', 'sub_title' => '保存食品', 'image' => 'kandume.jpg'],
            ['title' => 'インスタント類', 'sub_title' => 'カップラーメンなど', 'image' => 'instant.jpg'],
            ['title' => 'パン', 'sub_title' => '菓子パン、食パン', 'image' => 'bread.jpg'],
            ['title' => '米', 'sub_title' => '精米、無洗米', 'image' => 'kome.jpg'],
            ['title' => '日用品', 'sub_title' => '日常生活に使う品物', 'image' => 'nitiyouhin.jpg'],
            ['title' => '調味料', 'sub_title' => '料理の調味に使う材料', 'image' => 'tyoumiryou.jpg'],
            
        ];

        foreach($categories as $category){
            Category::create($category);
        }
    }
}
