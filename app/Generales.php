<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Generales extends Model
{
    protected $table = 'generales';
    protected $fillable = [
        'descripcion', 'estado', 'created_at', 'updated_at'];
    protected $guarded = ['id'];

static function guardar_generales($datos) {
//Funcion para guardar las respuestas usando foreach
//dd($datos);
if(!empty($datos['id'])){
    $guardando = new Generales;
    $guardando->where('id', $datos['id'])->update(['descripcion' => $datos['descripcion']]);
}else{
    $guardando = new Generales;
    $guardando->descripcion = $datos['descripcion'];
    $guardando->save();
}
    

}     
    
}