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
            [1,2,3,4],
            [5,6,7,8],
            [1,2,3,4],
            [1,2,3,4],
            [1,2,3,4],
            [1,2,3,4],
        ];

        for($j = 1; $j < 7 ; $j++){
            $user = User::all()->where('id',$j)->first();
            $user->types()->sync($type[$j]);
        }
    }
}
