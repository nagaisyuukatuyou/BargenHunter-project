<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Supermarket;

class SupermarketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $supermarkets = [
            ['s_name' => 'KOHYO三宮店', 's_image' => 'k_kobe2020.jpg'],
            ['s_name' => 'スーパーマルハチ柳原店', 's_image' => 'maruhachi_yanagihara.jpg'],
            ['s_name' => 'ダイエー神戸三宮店', 's_image' => 'daie_sannomiya.jpg'],
            ['s_name' => 'ライフ神戸駅前店', 's_image' => 'life_kobe.jpg'],
        ];

        foreach ($supermarkets as $superket) {
            Supermarket::create($superket);
        }
    }
}
