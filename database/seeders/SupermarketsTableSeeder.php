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
            ['s_name' => 'KOHYO三宮店'],
            ['s_name' => 'スーパーマルハチ　柳原店'],
            ['s_name' => 'ダイエー神戸三宮店'],
            ['s_name' => 'ライフ神戸駅前店'],
        ];

        foreach ($supermarkets as $superket) {
            Supermarket::create($superket);
        }
    }
}
