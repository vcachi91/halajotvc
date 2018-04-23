<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Maratones extends Model
{
    protected $table = 'maratones';
    protected $fillable = [
        'nombre', 'estado', 'created_at', 'updated_at'];
    protected $guarded = ['id'];

    static function getList() {
        $query = self::orderBy('id', 'desc')->get();
        return $query->where('estado', '1');
	}     

static function guardar_maratones($datos) {
if(!empty($datos['id'])){
    $guardando = new Maratones;
    $guardando->where('id', $datos['id'])->update(['nombre' => $datos['nombre']]);
}else{
    $guardando = new Maratones;
    $guardando->nombre = $datos['nombre'];
    $guardando->save();
}
    

}     
    
}