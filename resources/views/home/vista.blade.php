@extends('layouts.app')

@section('title', 'Main page')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">    
    <div class="col-md-12">
    <div class="ibox-content" id="vista_app">
          <p>
      <?php echo !empty($generales[0]['descripcion']) ? $generales[0]['descripcion'] : ''; ?>
</p>
<form name="enviar_respuesta" action="{{ url("enviar-respuesta") }}" method="post">
<div class="form-group">
<?php foreach($opciones as $row){ ?>
<label class="checkbox-inline"> <input style="width:20px; height:20px;" name="checkbox[]" type="checkbox" value="<?php echo $row->id; ?>" id="inlineCheckbox1"> <h3><strong><?php echo $row->nombre; ?></strong></h3> </label>
<?php } ?>
{{ csrf_field() }}
</div>
<div class="form-group"><label class="col-sm-2 control-label" style="margin-right: -100px;">Correo:</label>
<div class="col-sm-6"><input type="text" name="email" class="form-control"></div><div class="col-sm-6"></div>
</div><br /><br />
<br /><h3>Remember... MIRACLES DO EXIST!! BE PART OF IT!</h3><br />
<button class="btn btn-primary" type="submit">Enviar</button>
</form>
<br /><br />
<div class="col-sm-12"><div class="hr-line-dashed"></div>
</div>
</div>
</div>
            </div>
@endsection
