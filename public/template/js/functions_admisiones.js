function accion_select( obj ) {

    if (obj.name == "escuela") {

      if (obj.value == "1") {
        ClearOptionsFast('nivel');
        document.admisiones_form.nivel.options[0]=new Option(" - Selecione - ","0","defauldSelected");
        document.admisiones_form.nivel.options[1]=new Option("Preescolar","1");
        document.admisiones_form.nivel.options[2]=new Option("Primaria","2");
        document.admisiones_form.nivel.options[3]=new Option("Secundaria","3");

      } else if (obj.value == "2") {
        ClearOptionsFast('nivel');
        document.admisiones_form.nivel.options[0]=new Option(" - Selecione - ","0","defauldSelected");
        document.admisiones_form.nivel.options[1]=new Option("Primaria","2");
        document.admisiones_form.nivel.options[2]=new Option("Secundaria","3");

      } else {
        ClearOptionsFast('nivel');
        ClearOptionsFast('grado');
      }
    }

    if (obj.name == "nivel") {

      if (obj.value == "1") {
        ClearOptionsFast('grado');
        document.admisiones_form.grado.options[0]=new Option(" - Selecione - ","0","defauldSelected");
        document.admisiones_form.grado.options[1]=new Option("1","1");
        document.admisiones_form.grado.options[2]=new Option("2","2");
        document.admisiones_form.grado.options[3]=new Option("3","3");

      } else if (obj.value == "2") {
        ClearOptionsFast('grado');
        document.admisiones_form.grado.options[0]=new Option(" - Selecione - ","0","defauldSelected");
        document.admisiones_form.grado.options[1]=new Option("1","1");
        document.admisiones_form.grado.options[2]=new Option("2","2");
        document.admisiones_form.grado.options[3]=new Option("3","3");
        document.admisiones_form.grado.options[4]=new Option("4","4");
        document.admisiones_form.grado.options[5]=new Option("5","5");
        document.admisiones_form.grado.options[6]=new Option("6","6");

      } else if (obj.value == "3") {
        ClearOptionsFast('grado');
        document.admisiones_form.grado.options[0]=new Option(" - Selecione - ","0","defauldSelected");
        document.admisiones_form.grado.options[1]=new Option("1","1");
        document.admisiones_form.grado.options[2]=new Option("2","2");
        document.admisiones_form.grado.options[3]=new Option("3","3");

      } else {
        ClearOptionsFast('grado');
      }
    }

    if (obj.name == 'discapacidad') {
      if (obj.value == "1") {
        $("#discapacidad_especifique").removeAttr("disabled");
        $('#discapacidad_especifique').attr("required", "required");
      } else {
        $("#discapacidad_especifique").attr("disabled", "disabled");
        $("#discapacidad_especifique").val("0");
        $('#discapacidad_especifique').removeAttr("required");
      }
    }

    if (obj.name == 'responsable') {
      if (obj.value == "4") {
        $("#responsable_otro").removeAttr("disabled");
        $('#responsable_otro').attr("required", "required");
      } else {
        $("#responsable_otro").attr("disabled", "disabled");
        $("#responsable_otro").val("");
        $('#responsable_otro').removeAttr("required");
      }
    }
      
  } 

  

 function ucWords(obj){
   var arrayWords;
   var returnString = "";
   var len;
   var string = obj.value;

   arrayWords = string.split(" ");
   len = arrayWords.length;
   for(i=0;i < len ;i++){
    if(i != (len-1)){
     returnString = returnString+ucFirst(arrayWords[i])+" ";
    }
    else{
     returnString = returnString+ucFirst(arrayWords[i]);
    }
   }
   $('#'+obj.getAttribute('ID')).val(returnString);
   return returnString;
  }
  function ucFirst(string){
   return string.substr(0,1).toUpperCase()+string.substr(1,string.length).toLowerCase();
  }

  function validateEmail(emailField){
          var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

          var id = emailField.getAttribute('id');

          if (reg.test(emailField.value) == false) {
              //alert('Ingresa un Email válido');
              $( "#"+id ).css( "border", "2px solid #F78989" );
              $( "#"+id ).val("");
              return false;
          }
          $( "#"+id ).css( "border", "1px solid #ccc" );
          
          return true;

  }

  function validarNumero(obj) {

    patt = /\d{3}/;

        if ((window.event.keyCode > 47 && window.event.keyCode <58) || window.event.keyCode == 46) {
          window.event.returnValue = true;
          if ( patt.test(obj.value) ) {
              window.event.returnValue = false;
          }
        } else {
            window.event.returnValue = false;
        }
    }
  
  function onlyNumbers(e) {
      var val = (document.all);
      var key = val ? e.keyCode : e.which;
      if (key > 31 && (key < 48 || key > 57)) {
          if (val)
              window.event.keyCode = 0;
          else {
              e.stopPropagation();
              e.preventDefault();
          }
      }
  }

  function valida_cp(obj) {

    var cp=/(^([0-9]{5,5})|^)$/;
    if ((window.event.keyCode > 47 && window.event.keyCode <58) || window.event.keyCode == 46) {
      if ( (cp.test(obj.value))) {  
        window.event.returnValue = false;
        return false; 
      }
    } else {
      window.event.returnValue = false;
      return false; 
    }

  }

  function moneyFormat(obj){
    var string = numeral(obj.value).format('$0,0.00');    
    $('#'+obj.getAttribute('ID')).val(string);
    return string;
  }

  function soloLetras(e){
     key = e.keyCode || e.which;
     tecla = String.fromCharCode(key).toLowerCase();
     letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
     especiales = "8-37-39-46";

     tecla_especial = false
     for(var i in especiales){
          if(key == especiales[i]){
              tecla_especial = true;
              break;
          }
      }

      if(letras.indexOf(tecla)==-1 && !tecla_especial){
          return false;
      }
  }

  function soloNumeros(e) {
      key = e.keyCode || e.which;
      tecla = String.fromCharCode(key).toLowerCase();
      letras = " 0123456789";
      especiales = [8, 37, 39, 46];

      tecla_especial = false
      for(var i in especiales) {
          if(key == especiales[i]) {
              tecla_especial = true;
              break;
          }
      }

      if(letras.indexOf(tecla) == -1 && !tecla_especial)
          return false;
  }

  function limpia(obj) {
      var val = obj.value;
      var tam = val.length;
      for(i = 0; i < tam; i++) {
          if(!isNaN(val[i]))
              obj.value = '';
      }
  }

  function validaFloat(obj) {

    //patt = /^([0-9])*[.]?[0-9]*$/;
    patt  = /\d+(\.\d{2,2})?/;

        if ((window.event.keyCode > 47 && window.event.keyCode <58) || window.event.keyCode == 46 || window.event.keyCode == 110 || window.event.keyCode == 110 ) {
          window.event.returnValue = true;
          if ( patt.test(obj.value) || obj.value > 100) {
              window.event.returnValue = false;
          }
        } else {
            window.event.returnValue = false;
        }
    

  }

  function validaPorcentaje(obj) {

    patt = /\d{3}/;

        if ((window.event.keyCode > 47 && window.event.keyCode <58) || window.event.keyCode == 46 || obj.value <= 100) {
          window.event.returnValue = true;
          if ( patt.test(obj.value) || obj.value > 100) {
              window.event.returnValue = false;
          }
        } else {
            window.event.returnValue = false;
        }
    

  }

  function ClearOptionsFast(id) {
    var selectObj = document.getElementById(id);
    var selectParentNode = selectObj.parentNode;
    var newSelectObj = selectObj.cloneNode(false); // Make a shallow copy
    selectParentNode.replaceChild(newSelectObj, selectObj);
    return newSelectObj;
  }

  