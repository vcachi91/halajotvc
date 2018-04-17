@extends('layouts.app')

@section('title', 'Main page')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">    
    <div class="col-md-12">
    <div class="ibox-content" id="vista_app">
    <?php foreach($respuestas as $row){ ?>      
    <p><h4 style="text-align:justify!important; font-family: 'Roboto Condensed'!important;
    margin-bottom: 5px;
    font-size: 21px;
    line-height: 150%;
    margin: 0 0 15px 0;
    font-family: 'Roboto Condensed';
    font-weight: 300;
    color: #2f2f2f;
    text-transform: none;">
      <?php echo $row->nombre; ?>
    </h4></p>
    <?php } ?>
<br /><br />
<h3>Maraton Halajot LH.</h3>
<div class="col-sm-12"><div class="hr-line-dashed"></div>
</div>
</div>
</div>
            </div>
@endsection
