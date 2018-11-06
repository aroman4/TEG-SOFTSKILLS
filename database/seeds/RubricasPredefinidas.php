<?php

use Illuminate\Database\Seeder;

class RubricasPredefinidas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['titulo'=>'Trabajo en equipo', 'user_id'=>'0', 'cliente_id'=>'0', 'descripcion'=>'Rúbrica para evaluar el trabajo en equipo de un integrante','id_asesoria'=>'0','predefinido'=>'1','respondidoa'=>'0','respondidoc'=>'0','enviar'=>'0','columnas'=>'3','filas'=>'2','criterio0'=>'La persona trabaja en equipo','criterio1'=>'La persona trabaja con diferentes equipos','evaluacion0'=>'Deficiente','evaluacion1'=>'Regular','evaluacion2'=>'Sobresaliente','celda00'=>'Nunca','celda01'=>'Siempre pero no asume un papel','celda02'=>'Siempre y conoce su papel y sus responsabilidades','celda10'=>'No, siempre conforma el mismo equipo','celda11'=>'Integra varios equipos con resultados diversos','celda12'=>'Integra varios equipos con buenos resultados',],
           ];
           \DB::table('rubrica')->insert($data);
    }
}
