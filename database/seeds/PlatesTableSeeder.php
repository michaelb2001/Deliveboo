<?php

use Illuminate\Database\Seeder;
use App\Plate;
use Faker\Generator as Faker;
class PlatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0 ; $i <10; $i++){
            $newPlate = new Plate();
            $newPlate->name = $faker->firstName(20);
            $newPlate->ingredients = implode(",",$faker->randomElements(['pomodoro','basilico','aglio','acciughe','cipolla'],3));
            $newPlate->price = $faker->randomFloat(2,0,300);
            $newPlate->visible = $faker->boolean();
            $newPlate->img = NULL;
            $newPlate->user_id = 1;
            $newPlate->save();
        }
    }
}
