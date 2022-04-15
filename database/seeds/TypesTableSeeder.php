<?php


use Illuminate\Database\Seeder;
use App\Type;
use Faker\Generator as Faker;


class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $types = ['Italiano','Sushi','Giapponese',
                'Internazionale','Cinese','Americano','Hawaiano',
                'Arabo','Turco','Brasiliano','Tedesco','Francese',
                'Vegan','Gluten free','Vegetariano','Celiaci'];

        for($i = 0 ; $i <count($types) ; $i++){
            $newType = new Type();
            //$newType->name = implode(",",$faker->randomElements(['italiano','sushi','giapponese','internazionale','cinese','americano'],1));
            $newType->name = $types[$i];
            $newType->save();
    
        }
    }

}
