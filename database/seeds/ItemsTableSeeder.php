<?php

use Illuminate\Database\Seeder;
use App\Item;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 10; $i++)
        {
            Item::create([
                'user_id' => $i,
                'item_name' => 'item'.$i,
                'item_image' => 'https://placehold.jp/100x100.png',
                'text' => 'テストコメント',
                'pref' => '愛知県',
                'city' => '知多市',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
