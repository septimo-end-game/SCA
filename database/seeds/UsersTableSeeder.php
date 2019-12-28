<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	User::create([
	        'name' => 'Cris',
	        'email' => 'cris@hotmail.com',
	        'password' => bcrypt('batman'),
	        'matricula' => '201524367',
	        'a_paterno' => 'Peña',
	        'a_materno' => 'Barrios',
	        'rol' => 'Administrador'
    	]);
        User::create([
            'name' => 'Esme',
            'email' => 'Esme@hotmail.com',
            'password' => bcrypt('manzana'),
            'matricula' => '201524401',
            'a_paterno' => 'Arias',
            'a_materno' => 'Gonzales',
            'rol' => 'Administrador'
        ]);
        factory(User::class, 10)->create();
    }
}
