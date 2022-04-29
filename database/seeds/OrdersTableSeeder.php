<?php

use Illuminate\Database\Seeder;
use App\Order;
use Faker\Generator as Faker;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0 ; $i <10; $i++){
            $newOrder = new Order();
            $newOrder->name = $faker->firstName(20);
            $newOrder->surname = $faker->lastName(20);
            $newOrder->email = $faker->email();
            $newOrder->phone = $faker->e164PhoneNumber();
            $newOrder->address = $faker->address();
            $newOrder->total = $faker->randomFloat(2,0,100);
            $newOrder->status = $faker->boolean();
            $newOrder->save();
        }
    }
}
