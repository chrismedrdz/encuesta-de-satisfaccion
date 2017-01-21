function cargarformulario(formu){
	switch(formu){
		case 1: var url="mayor/section_1";
		break;

		case 2: var url="mayor/section_1/section_2a";
		break;

		case 3: var url="mayor/section_1/section_2a/section_2b";
		break;

		case 4: var url="mayor/section_1/section_2a/section_2b/section_2c";
		break;

		case 5: var url="mayor/section_1/section_2a/section_2b/section_2c/section_2d";
		break;

		case 6: var url="mayor/section_1/section_2a/section_2b/section_2c/section_2d/section_2e";
		break;

    case 6: var url="mayor/section_1/section_2a/section_2b/section_2c/section_2d/section_2e/section_2f";
    break;

		default: var url="error";
		break;

	}
	$.get(url,function(resul){
      $("#contenido_principal").html(resul);
    })
}


function iniciarEncuesta(survey_id) {


  
}





     $(document).on("submit",".form_entrada",function(e){

//funcion para atrapar los formularios y enviar los datos

       e.preventDefault();
        
        $('html, body').animate({scrollTop: '0px'}, 200);
        
        var formu=$(this);
        var quien=$(this).attr("id");
        var rs=false; //leccion 10
        var seccion_sel=  $("#seccion_seleccionada").val();

        
        if(quien=="f_nuevo_usuario"){ var varurl="agregar_nuevo_usuario"; var divresul="notificacion_resul_fanu";  rs=true;}
        if(quien=="f_editar_usuario"){ var varurl="editar_usuario"; var divresul="notificacion_resul_feu"; }
        if(quien=="f_cambiar_password"){ var varurl="cambiar_password"; var divresul="notificacion_resul_fcp";  }
        if(quien=="f_agregar_educacion"){ var varurl="agregar_educacion_usuario"; var divresul="notificacion_resul_faedu";  rs=true; }  //leccion 10
   
   
        $("#"+divresul+"").html($("#cargador_empresa").html());

              $.ajax({

                    type: "POST",
                    url : varurl,
                    datatype:'json',
                    data : formu.serialize(),
                    success : function(resul){
                        $("#"+divresul+"").html(resul);
                        if(rs ){
                         $('#'+quien+'').trigger("reset");
                         mostrarseccion(seccion_sel);
                        }
                    }

                });

})

