function phost()
{
	if(window.location.hostname == "localhost"){
		host = "/halajotvc/public/";
	}else if(window.location.hostname == "halajotvc.com"){
		host = "/";
	}else{
		host = "/";
	}
	return host;
}
$('#maraton_id').val(dataId);

var token = $('meta[name="csrf-token"]').attr('content');
//Init Ticket Grid
$("#checkboxList").jqGrid({
    url: phost() + 'ajax-listar',
    datatype: "json",
    colNames:[     
     '#',
     'Nombre',    
     'Opciones'     
 ],
    colModel:[
     //{name:'id', index:'id', width:10, align:"center", hidden:true},
     {name:'id', index:'id', width:10, align:"center"},
     {name:'nombre', index:'cliente', width: 50, align:"left"},
     {name:'opciones', index:'opciones', width:30, align:"center"}
    ],
 mtype: "POST",
    postData: {_token: token, id:dataId},       
 height: "auto",
 autowidth: true,
 rowList: [20,30,50,100],
 rowNum: 30,
 page: 1,
 loadonce: true,
 pager: jQuery('#pager'),
 loadtext: '<p>Cargando lista...',
 hoverrows: true,
 viewrecords: true,
 refresh: true,
 gridview: true,
 multiselect: false,
 sortname: 'id',		
 sortorder: "desc",
 regional:'es'
});

var app = new Vue({
    el: "#admin_app",
    data: {
        nombre:""       
    },
    methods: {
        guardar: function(){
            if(this.nombre.length == 0) {
                toastr.error('Escriba el nombre por favor!', 'Error al completar los campos')
            }else{
                $.ajax({
                    async: true,	
                    url: phost() + 'ajax-guardar',
                    type: "post",
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },		
                    data: {nombre:this.nombre, id:dataId, respuesta:this.fields},
                    success: function (response) {   
                        toastr.success('Guardado correctamente.', 'Checkbox', {timeOut: 5000}); 
                        setTimeout(function () {
                            $(':input').val('');
                            location.reload();
                        },1000);
                
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                       console.log(textStatus, errorThrown);
                    }
            
            
                        });                
            }
        }
    }
});