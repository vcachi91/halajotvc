@extends('layouts.app')

@section('title', 'Main page')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">    
    <div class="ibox-content" id="admin_app">
      <div class="col-md-12 text-center"><div class="btn btn-default" id="show">Editar Generales</div><br /><br /><br /></div>
      <div class="col-md-12">      
      <div class="form-group" id="bloque_general" style="display:none">
        <form name="generales" action="{{ url("guardar-generales") }}" method="post">
        <label class="col-lg-2 control-label">Texto General</label>

<div class="col-lg-10"><input type="hidden" name="id" value="<?php echo !empty($generales[0]['id']) ? $generales[0]['id'] : ''; ?>"><textarea name="descripcion" placeholder="Generales" class="form-control summernote"><?php echo !empty($generales[0]['descripcion']) ? $generales[0]['descripcion'] : ''; ?></textarea>
{{ csrf_field() }}
<button class="btn btn-primary" type="submit">Guardar Cambios</button>
<br /><br />
</div>
        </form>
      </div>
      </div>
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
