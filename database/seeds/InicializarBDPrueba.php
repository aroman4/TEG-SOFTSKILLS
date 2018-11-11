<?php

use Illuminate\Database\Seeder;

class InicializarBDPrueba extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nombre_usu'=>'asesor', 'email'=>'asesor@email.com', 'password'=>bcrypt('123456'), 'tipo_usu'=>'asesor', 'tipo_inv'=>'normal', 'nombre'=>'sr','apellido'=>'asesor','sexo'=>'masculino'],
            ['nombre_usu'=>'cliente', 'email'=>'cliente@email.com', 'password'=>bcrypt('123456'), 'tipo_usu'=>'cliente', 'tipo_inv'=>'normal', 'nombre'=>'una','apellido'=>'cliente','sexo'=>'femenino'],
           ];
           \DB::table('usuario')->insert($data);
    }
}
