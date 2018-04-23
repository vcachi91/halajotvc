<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Respuestas;

class Checkbox extends Model
{
    protected $table = 'checkboxs';
    protected $fillable = [
        'nombre', 'estado', 'created_at', 'updated_at', 'maraton_id'];
    protected $guarded = ['id'];

    static function getList($id) {
        $query = self::orderBy('id', 'desc')->where('maraton_id', $id)->get();
        return $query->where('estado', '1');
	}     
    static function info($id) {       
        $query = self::with(array('respuestas'))->where('id', $id);
        return $query->get();
    }
    public function respuestas() {
        return $this->hasMany(Respuestas::class, 'checkbox_id', 'id')->where('estado', 1);
    }    
}