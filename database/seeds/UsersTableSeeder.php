<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newUser = new User();
        $newUser->name = "Francesco Franchetti";
        $newUser->email = "lacantina92@gmail.com";
        $newUser->password = Hash::make('prova123');
        $newUser->activity = "La Cantina";
        $newUser->p_iva = "12345678912";
        $newUser->address = "Via nuova perla , 92";
        $newUser->save();
    }
}
