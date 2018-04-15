@extends('layouts.app')

@section('title', 'Respuestas')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">    
    <div class="ibox-content" id="respuesta_app">
      <!-- nombre de checkbox -->
      <div class="form-group">
      <input type="text" placeholder="Nombre del Checkbox" id="nombre" readonly class="form-control" v-model="nombre">   
      <input type="hidden" id="checkbox_id" v-model="id">
   </div>
    <!-- respuesta checkbox -->
    <div class="input-group">
    <div v-for="field in fields">
    <div class="col-sm-6">
      <textarea
        type="text"
        placeholder="Respuesta..."
        id="respuesta"
        class="form-control"
        v-model="field.nombre"></textarea>
        <button class="btn btn-danger" :data-id="field.id" @click="delRow"><icon class="fa fa-minus"></icon></button>
        </div>
        </div>
      <div class="input-group-btn">
        <button class="btn btn-success" @click="addRow"><icon class="fa fa-plus"></icon></button>
      </div>
    </div><br />
    <button class="btn btn-success" @click="guardar">Guardar</button> <a class="btn btn-default" href="javascript:history.back(1)">Volver Atrás</a>
                                <div class="hr-line-dashed"></div>   
                                

</div>
            </div>
@endsection
