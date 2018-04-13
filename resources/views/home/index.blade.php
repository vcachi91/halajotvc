@extends('layouts.app')

@section('title', 'Main page')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">    
    <div class="ibox-content" id="admin_app">
      <!-- nombre de checkbox -->
      <div class="form-group">
      <div v-for="field in fields">

      <input type="text" placeholder="Nombre del Checkbox" class="form-control" v-model="field.label">  
   
</div></div>
    <!-- respuesta checkbox -->
    <div class="input-group">
      <textarea
        type="text"
        placeholder="Respuesta..."
        class="form-control"
        v-model="name"></textarea>
      <div class="input-group-btn">
        <button class="btn btn-success" @click="addRow">Add</button>
        <button class="btn btn-danger" @click="delRow">Del</button>
      </div>
    </div><br />
    <button class="btn btn-success" @click="pushFields">Guardar</button>
                                <div class="hr-line-dashed"></div>    
</div>
            </div>
@endsection
