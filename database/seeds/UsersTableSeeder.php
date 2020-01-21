<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$data = array(
        	[
				'nombre'    => 'Maritza',
				'apellidos' => 'Requejo',
				'direccion' => 'Direccion de Administradores',
                'cedula'    => '1004601078',
                'estado'=> '0',
                
				'email'   	=> 'belkixrequejo2208@gmail.com',
                'fecha_nacimiento'=> '1998-08-14',
				'password'  => bcrypt('12345678'),
				'foto'    => 'img/default-user.png',
                'id_titulo'=> '1',
                'id_parroquia'=> '1',
                'id_rol'=> '1',
                'id_escuela'=> '1',
				'created_at' => new DateTime,
				'updated_at' => new DateTime
        	]
        );
       	App\User::insert($data);
    }
}
