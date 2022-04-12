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
        $newUser->name = "prova";
        $newUser->email = "prova@gmail.com";
        $newUser->password = Hash::make('prova123');
        $newUser->activity = "nome attività di prova";
        $newUser->p_iva = "12345678912";
        $newUser->address = "via di prova 81";
        $newUser->save();

        /*  $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string("activity");
            $table->string("p_iva");
            $table->string("address");
            $table->string("img")->nullable();
            $table->rememberToken();
            $table->timestamps();*/
    }
}
