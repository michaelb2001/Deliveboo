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
        $name = [
            ['Margherita','Diavola','Capricciosa','Mimosa'],
            ['Quattro Stagioni','Filetto','Marinara','Diavola'],
            ['Big Bacon','Cheeseburger','Black truffle','Chicken crunchy'],
            ['Biscotti artigianali','Biscotti con gocce di cioccolato','Biscotti senza zucchero','Crema Spalmabile Rock'],
            ['Edamame','Gyoza - pollo','Gyoza - maiale','Sushi misto nigiri e uramaki 9pz'],
            ['Margherita','Quattro Formaggi','Salsiccia e friarelli','Ortolana']
        ];
        for($j = 0 ; $j <6; $j++){
            for($i = 0 ; $i <4; $i++){
                $newPlate = new Plate();
                $newPlate->name = $name[$j][$i];
                $newPlate->ingredients = implode(",",$faker->randomElements(['pomodoro','basilico','aglio','acciughe','cipolla','salsa','mozzarella','salame','mais','panna'],3));
                $newPlate->price = $faker->randomFloat(2,0,50);
                $newPlate->visible = $faker->boolean();
                $newPlate->img = NULL;
                $newPlate->user_id = $j+1;
                $newPlate->save();
            }
        }
        
    }
}
