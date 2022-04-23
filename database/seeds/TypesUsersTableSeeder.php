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
    public function run()
    {     
        for($i = 0; $i < 6 ; $i++){
            $user = User::all()->where('id',$i + 1)->first();
            $user->types()->sync([rand(1,6) ,rand(7,12) ,rand(13,16)]);
        }
    }
}
