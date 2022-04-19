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
        $name = ['Margherita','Diavola','Capricciosa','Mimosa'];
        for($i = 0 ; $i <4; $i++){
            $newPlate = new Plate();
            $newPlate->name = $name[$i];
            $newPlate->ingredients = implode(",",$faker->randomElements(['pomodoro','basilico','aglio','acciughe','cipolla','salsa','mozzarella','salame','mais','panna'],3));
            $newPlate->price = $faker->randomFloat(2,0,100);
            $newPlate->visible = $faker->boolean();
            $newPlate->img = NULL;
            $newPlate->user_id = 1;
            $newPlate->save();
        }
    }
}
