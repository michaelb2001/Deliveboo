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
            ['Classic BBQ','Tagliata di petto di pollo','Gran cotoletta di pollo','Filetto'],
            ['Hot Maui','Mr. Avocado ','Pacifik','Volcano'],
            ['Big Bacon','Cheeseburger','Black truffle','Chicken crunchy'],
            ['Biscotti artigianali','Gelato PeacePop','Biscotti AYO','Crema Spalmabile Rock'],
            ['Sicily rolls - 6 pezzi','Hot salmon - 8 pezzi','Takaeshita street','Satrincha box'],
            ['Margherita','Diavola','Salsiccia e friarelli','Ortolana']
        ];

        $ingredient = [
            ['Costine di maiale affumicato, salsa BBQ'],
            ['Petto di pollo','rucola','pomodorini'],
            ['Petto di pollo intero con panatura' , 'perfettamente croccante e delizioso'],
            ['100% italian beef', 'circa 220gr'],

            ['Costine di maiale affumicato, salsa BBQ'],
            ['Petto di pollo','rucola','pomodorini'],
            ['Big Bacon','Cheeseburger','Black truffle','Chicken crunchy'],
            ['Biscotti artigianali','Gelato PeacePop','Biscotti AYO','Crema Spalmabile Rock'],

            ['Costine di maiale affumicato, salsa BBQ'],
            ['Petto di pollo','rucola','pomodorini'],
            ['Big Bacon','Cheeseburger','Black truffle','Chicken crunchy'],
            ['Biscotti artigianali','Gelato PeacePop','Biscotti AYO','Crema Spalmabile Rock'],

            ['Costine di maiale affumicato, salsa BBQ'],
            ['Petto di pollo','rucola','pomodorini'],
            ['Big Bacon','Cheeseburger','Black truffle','Chicken crunchy'],
            ['Biscotti artigianali','Gelato PeacePop','Biscotti AYO','Crema Spalmabile Rock'],

            ['Gambero fritto in tempura', 'tartare di gamberi rossi'],
            ['uova di aringa affumicata', 'avocado' , 'foglie di shiso'],
            ['Oshi-Zushi pressato' , 'salmone teriyaki alla piastra', 'cipolla fritta'],
            ['2 california', '2 philadelphia', '2 spicy toro', '2 hot salmon', '2 Zushi roll', '2 rainbow'],

            ['Gambero fritto in tempura, tartare di gamberi rossi'],
            ['burrata, uova di aringa affumicata, avocado , foglie di shiso'],
            ['Big Bacon,Cheeseburger,Black truffle,Chicken crunchy'],
            ['Biscotti artigianali,Gelato PeacePop,Biscotti AYO,Crema Spalmabile Rock'],
        ];

        $index = 0;
        for($j = 0 ; $j <6; $j++){
            for($i = 0 ; $i <4; $i++){
                $newPlate = new Plate();
                $newPlate->name = $name[$j][$i];
                $newPlate->ingredients = implode(",",$ingredient[$index]);
                $newPlate->price = $faker->randomFloat(2,0,50);
                //$newPlate->visible = $faker->boolean();
                $newPlate->visible = 1;
                $newPlate->img = NULL;
                $newPlate->user_id = $j+1;
                $newPlate->save();
                $index++;
            }
        }
        
    }
}
