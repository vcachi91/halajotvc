<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Respuestas extends Model
{
    protected $table = 'respuestas';
    protected $fillable = [
        'nombre', 'estado', 'checkbox_id', 'created_at', 'updated_at'];
    protected $guarded = ['id'];

static function guardar_respuestas($datos) {
//Funcion para guardar las respuestas usando foreach
foreach($datos['nombre'] as $row){
if(!empty($row['id'])){
    $guardando = new Respuestas;
    $guardando->where('id', $row['id'])->update($row);
}else{
    $guardando = new Respuestas;
    $guardando->nombre = $row['nombre'];
    $guardando->checkbox_id = $datos['checkbox_id'];
    $guardando->save();
}
}

return;
}     
//Logica para enviar respuesta
static function enviando_respuestas($data) {
    $random = count($data['checkbox']);
    $respuestas = Respuestas::whereIn('checkbox_id', $data['checkbox'])->orderByRaw('RAND()')->get()->unique('checkbox_id');
    return $respuestas;
}
    
}