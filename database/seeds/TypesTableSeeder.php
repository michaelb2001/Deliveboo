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
        $types = ['italiano','sushi','giapponese',
                'internazionale','cinese','americano','hawaiano',
                'arabo','turco','brasiliano','tedesco','francese',
                'vegan','gluten free','vegetariano','celiaci'];

        for($i = 0 ; $i <count($types) ; $i++){
            $newType = new Type();
            //$newType->name = implode(",",$faker->randomElements(['italiano','sushi','giapponese','internazionale','cinese','americano'],1));
            $newType->name = $types[$i];
            $newType->save();
    
        }
    }

}
