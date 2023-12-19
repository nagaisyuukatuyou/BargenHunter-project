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
            ['s_name' => '阪急オアシス'],
            ['s_name' => 'ダイエー神戸三宮店'],
            ['s_name' => '万代春日野道店'],
        ];

        foreach ($supermarkets as $superket) {
            Supermarket::create($superket);
        }
    }
}
