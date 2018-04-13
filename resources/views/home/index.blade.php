@extends('layouts.app')

@section('title', 'Main page')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">    
    <div class="ibox-content" id="admin_app">
      <!-- nombre de checkbox -->
      <div class="form-group">
      <input type="text" placeholder="Nombre del Checkbox" id="nombre" class="form-control" v-model="nombre">  
   </div>
    <button class="btn btn-success" @click="guardar">Guardar</button>
                                <div class="hr-line-dashed"></div>    
                                <div class="table-responsive">
                                <div class="NoRecords text-center lead"></div>
                        <!-- the grid table -->
                        <table class="table" id="checkboxList"></table>
                        <!-- pager definition -->
                        <div id="pager"></div>	
                        </div>

</div>
            </div>
@endsection
