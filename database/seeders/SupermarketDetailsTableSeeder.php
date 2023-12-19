<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Supermarket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SupermarketDetail;
class SupermarketDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $supermarket_details = [
            ['supermarket_id' => '1', 'nearest_station' => '三宮駅', 'web_site' => 'www.kohyo.co.jp', 'phone_number' => '000-1111-4444', 'address' => '神戸市中央区雲井通7-1-1 ミント神戸B1F', 'close_time' => '23:00', 'open_time' => '7:00'],
            ['supermarket_id' => '2', 'nearest_station' => '三宮駅', 'web_site' => 'www.hankyu-oasis.com', 'phone_number' => '000-2222-3333', 'address' => '兵庫県神戸市中央区加納町4-2-1', 'close_time' => '22:00', 'open_time' => '10:00'],
            ['supermarket_id' => '3', 'nearest_station' => '三宮駅', 'web_site' => 'www.daiei.co.jp/stores/d0622/', 'phone_number' => '555-6666-9999', 'address' => '兵庫県神戸市中央区雲井通6丁目1-15', 'close_time' => '23:00', 'open_time' => '9:00'],
            ['supermarket_id' => '4', 'nearest_station' => '三宮駅', 'web_site' => 'https://sasp.mapion.co.jp/b/mandai/info/4/', 'phone_number' => '111-3333-5555', 'address' => '兵庫県神戸市中央区筒井町1-2-28', 'close_time' => '23:00', 'open_time' => '9:00'],
        ];

        //SupermarketDetail::create($supermarket_details);
        foreach($supermarket_details as $supermarket_detail){
            SupermarketDetail::create($supermarket_detail);
        }
    }
}
