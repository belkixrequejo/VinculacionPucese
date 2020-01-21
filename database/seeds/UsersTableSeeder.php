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
				'nombre'    => 'Jair',
				'apellidos' => 'Bedoya',
				'direccion' => 'Administrador',
                'cedula'    => '1004601078',
                'estado'=> '0',
                
				'email'   	=> 'jair.bedoya@pucese.edu.ec',
                'fecha_nacimiento'=> '1997-06-17',
				'password'  => bcrypt('1234567890'),
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
