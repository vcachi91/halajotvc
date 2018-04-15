var app = new Vue({
    el: "#respuesta_app",
    data: {
        id:respuestasInfo != undefined ? respuestasInfo[0].id : '',
        nombre: respuestasInfo != undefined ? respuestasInfo[0].nombre : '',
        formdata: respuestasInfo != undefined ? respuestasInfo[0].respuestas : [],       
        fields: respuestasInfo[0].respuestas
    },
    methods: {
        //Agrega nuevo campo
        addRow: function() {
            this.fields.push({
          });
        },
        //Elimina campo
        delRow: function() {
            this.fields.pop();
        },
        pushFields: function()
		{
    	this.formdata.push({
      fields : this.fields
      });
        },
        guardar: function(){
            if(this.nombre.length == 0) {
                toastr.error('Escriba el nombre por favor!', 'Error al completar los campos')
            }else{
                $.ajax({
                    async: true,	
                    url: phost() + 'ajax-guardar-respuestas',
                    type: "post",
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },		
                    data: {id:this.id, respuesta:this.fields},
                    success: function (response) {   
                        toastr.success('Guardado correctamente.', 'Respuestas', {timeOut: 5000}); 
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                       console.log(textStatus, errorThrown);
                    }
            
            
                        });                
            }
        }
    }
});