<?php

use App\Order;
use Illuminate\Database\Seeder;

class OrdersPlatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sync_data = [];
        $plates = [
            null,
            [1,3,4], //50
            [1,2,3,4], //66
            [1,2,3], //80
            [2,3], //26
            [1], //50
        ];

        $quantity = [
            null,
            [2,1,1],
            [1,2,1,1],
            [4,1,2],
            [1,1],
            [5],
        ];
        for($j = 1; $j < 6 ; $j++){
            $order = Order::all()->where('id',$j)->first();
            
            for($i = 0; $i < count($plates[$j]) ; $i++){
                $sync_data[$plates[$j][$i]] = ['quantity' => $quantity[$j][$i]];
            }
            $order->plates()->sync($sync_data);
            $sync_data = [];
        }
    }
}
