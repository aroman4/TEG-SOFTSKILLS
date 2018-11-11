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
            ['titulo'=>'Predisposición', 'user_id'=>'0', 'cliente_id'=>'0', 'descripcion'=>'Rúbrica para evaluar la predisposición de los empleados al trabajo','id_asesoria'=>'0','predefinido'=>'1','respondidoa'=>'0','respondidoc'=>'0','enviar'=>'0','columnas'=>'3','filas'=>'6',
            'criterio0'=>'Gestión del tiempo','criterio1'=>'Profesionalismo','criterio2'=>'Comunicación','criterio3'=>'Calidad del trabajo realizado','criterio4'=>'Participación/Trabajo en equipo','criterio5'=>'Pensamiento critico',
            'evaluacion0'=>'Inaceptable','evaluacion1'=>'Aceptable','evaluacion2'=>'Ejemplar','evaluacion3'=>'','evaluacion4'=>'',
            'celda00'=>'Ha sido impuntual o no ha entregado los trabajos a tiempo más de 3 veces','celda01'=>'Ha sido impuntual o no ha entregado los trabajos a tiempo menos de 3 veces','celda02'=>'Es puntual, nunca entrega trabajos tarde y demuestra ser responsable',
            'celda10'=>'Se resiste a las nuevas ideas y habilidades; rara vez es positivo; no se preocupa por su presentación personal','celda11'=>'Constantemente positivo; le gusta aprender; y demuestra una presentación personal apropiada','celda12'=>'Siempre demuestra una actitud positiva, autocontrol, buena presentación personal y le gusta aprender permanentemente.',
            'celda20'=>'Demostración deficiente de las habilidades de comunicación y de escucha.','celda21'=>'Usa consistentemente un lenguaje claro y organizado para el intercambio de ideas e información','celda22'=>'Siempre utiliza un lenguaje claro y organizado; intercambia ideas e información de manera efectiva.',
            'celda30'=>'Demuestra un esfuerzo mínimo, el trabajo a veces es incompleto','celda31'=>'Por lo general hace el mejor esfuerzo y completa el trabajo de manera consistente','celda32'=>'Constantemente da el mejor esfuerzo; trabajo de calidad',
            'celda40'=>'Raramente acepta la responsabilidad de sus propias decisiones; toma malas decisiones cuando trabaja con otros','celda41'=>'Acepta consistentemente la responsabilidad de sus propias decisiones; a menudo demuestra una fuerte interdependencia','celda42'=>'Confianza en sí mismo; demuestra conciencia de sí mismo al aceptar la responsabilidad de sus propias decisiones.',
            'celda50'=>'Evita consistentemente la resolución de problemas; rara vez busca ayuda','celda51'=>'Uso consistente de estrategias de resolución de problemas','celda52'=>'Siempre piensa en los problemas; selecciona la estrategia; encuentra la manera de resolverlos',
            ],
            
            ['titulo'=>'Trabajo en equipo', 'user_id'=>'0', 'cliente_id'=>'0', 'descripcion'=>'Rúbrica para evaluar el trabajo en equipo de un integrante','id_asesoria'=>'0','predefinido'=>'1','respondidoa'=>'0','respondidoc'=>'0','enviar'=>'0','columnas'=>'3','filas'=>'2',
            'criterio0'=>'La persona trabaja en equipo','criterio1'=>'La persona trabaja con diferentes equipos','criterio2'=>'','criterio3'=>'','criterio4'=>'','criterio5'=>'',
            'evaluacion0'=>'Deficiente','evaluacion1'=>'Regular','evaluacion2'=>'Sobresaliente','evaluacion3'=>'','evaluacion4'=>'',
            'celda00'=>'Nunca','celda01'=>'Siempre pero no asume un papel','celda02'=>'Siempre y conoce su papel y sus responsabilidades',
            'celda10'=>'No, siempre conforma el mismo equipo','celda11'=>'Integra varios equipos con resultados diversos','celda12'=>'Integra varios equipos con buenos resultados',
            'celda20'=>'','celda21'=>'','celda22'=>'',
            'celda30'=>'','celda31'=>'','celda32'=>'',
            'celda40'=>'','celda41'=>'','celda42'=>'',
            'celda50'=>'','celda51'=>'','celda52'=>'',
            ],
           ];
           \DB::table('rubrica')->insert($data);
    }
}
