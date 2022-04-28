<?php

use App\User;
use Illuminate\Database\Seeder;

class TypesUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){     
        $type = [
            [null],
            ['Italiano','Celiaci','Gluten free'],
            ['Vegan','Gluten free','Vegetariano','Celiaci'],
            ['Italiano','Americano','Vegan','Gluten free','Vegetariano','Celiaci'],
            ['Gluten free','Celiaci'],
            ['Sushi','Hawaiano','Celiaci'],
            ['Italiano','Vegan','Gluten free'],
        ];

        for($j = 1; $j < 7 ; $j++){
            $user = User::all()->where('id',$j)->first();
            $user->types()->sync($type[$j]);
        }
    }
}
