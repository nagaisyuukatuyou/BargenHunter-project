<?php

namespace Database\Seeders;


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
            ['supermarket_id' => '1', 'nearest_station' => '神戸駅', 'web_site' => 'https://www.kohyo.co.jp/', 'phone_number' => '078-341-5040', 'address' => '兵庫県神戸市中央区相生町3-1-2', 'close_time' => '23:00', 'open_time' => '7:00'],
            ['supermarket_id' => '2', 'nearest_station' => '中央市場駅', 'web_site' => 'https://www.supermaruhachi.co.jp/shop/瓜生堂店-2-3/', 'phone_number' => '078-686-0868', 'address' => '兵庫県神戸市兵庫区西仲町2-36', 'close_time' => '21:45', 'open_time' => '09:00'],
            ['supermarket_id' => '3', 'nearest_station' => '三宮駅', 'web_site' => 'https://www.daiei.co.jp/stores/d0622/', 'phone_number' => '078-291-0077', 'address' => '兵庫県神戸市中央区雲井通6丁目1-15', 'close_time' => '23:00', 'open_time' => '9:00'],
            ['supermarket_id' => '4', 'nearest_station' => '神戸駅', 'web_site' => 'http://www.lifecorp.jp/store/kinki/det_kinki.html?region=kinki&base_recordno=145', 'phone_number' => '078-371-6511', 'address' => '兵庫県神戸市中央区中町通3丁目2-15', 'close_time' => '00:00', 'open_time' => '9:30'],
        ];

        //SupermarketDetail::create($supermarket_details);
        foreach($supermarket_details as $supermarket_detail){
            SupermarketDetail::create($supermarket_detail);
        }
    }
}
