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

      
    
}