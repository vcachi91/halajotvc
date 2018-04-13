@extends('layouts.app')

@section('title', 'Main page')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">    
    <div class="ibox-content" id="admin_app">
      <!-- nombre de checkbox -->
      <div class="form-group">
      <div v-for="field in fields">

      <input type="text" placeholder="Nombre del Checkbox" id="nombre" class="form-control" v-model="field.label">  
   
</div></div>
    <!-- respuesta checkbox -->
    <div class="input-group">
      <textarea
        type="text"
        placeholder="Respuesta..."
        id="respuesta"
        class="form-control"
        v-model="respuesta"></textarea>
      <div class="input-group-btn">
        <button class="btn btn-success" @click="addRow"><icon class="fa fa-plus"></icon></button>
        <button class="btn btn-danger" @click="delRow"><icon class="fa fa-minus"></icon></button>
      </div>
    </div><br />
    <button class="btn btn-success" @click="pushFields">Guardar</button>
                                <div class="hr-line-dashed"></div>    
                                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-admin" >
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Respuestas</th>
                        <th>Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="gradeX">
                        <td>Trident</td>
                        <td>Internet
                            Explorer 4.0
                        </td>
                        <td>Win 95+</td>
                        </tr>
                    
                    </tfoot>
                    </table>
                        </div>

</div>
            </div>
@endsection
