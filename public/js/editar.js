var app = new Vue({
    el: "#respuesta_app",
    data: {
        nombre: respuestasInfo != undefined ? respuestasInfo[0].nombre : '',
        formdata:[],       
        fields: []
    },
    methods: {
        addRow: function() {
            this.fields.push({
          });
        },
        delRow: function() {
            this.fields.pop();
        },
        pushFields: function()
		{
    	this.formdata.push({
      name: this.name,
      fields : this.fields
      });
        },
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
                    data: {nombre:this.nombre, respuesta:this.fields},
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