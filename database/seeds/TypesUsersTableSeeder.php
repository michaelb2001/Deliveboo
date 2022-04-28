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
            [1,16,14],
            [13,14,15,16],
            [1,6,13,14,15,16],
            [14,16],
            [2,7,16],
            [1,13,14],
        ];

        for($j = 1; $j < 7 ; $j++){
            $user = User::all()->where('id',$j)->first();
            $user->types()->sync($type[$j]);
        }
    }
}
