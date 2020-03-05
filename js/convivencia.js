function registra(){
    id=null;
    var procesoRegistra="Registra";
    document.getElementById("proceso").value=procesoRegistra;
    document.getElementById("form_ficha").reset();
    document.getElementById("actualizaId").value=id;

    $(function (){
      $("#form_ficha").submit(function(){
          var datoForm=$(this).serialize();
          var url = 'nuevo_registro.php';
  
          $.ajax({
            type:'POST',
            url:url,
            data:datoForm,
            success:function(datosFicha){
              alert('Datos ingresados correctamente');
             
                $('#myModal').hide();
                $('#myModal').removeClass('show');
                $('#myModal').removeAttr('aria-modal');
                $('#myModal').attr('aria-hidden','true');
                $('.modal-backdrop').removeClass('modal-backdrop');
                $('body').removeClass('modal-open');
                $("#mostrar_antecedentes").html(datosFicha);
            }
  
          })
          return false;
      })
      
  });
}



function actualiza(id){
  
        
        var fechaFull   ='fecha'+id;
        var procedimientoFull='procedimiento'+id;
        var intervieneFull='interviene'+id;
        var cargoFull='cargo'+id;
        var registroFull='registro'+id;
        
        var fecha=document.getElementById(fechaFull).innerText;
        var procedimiento=document.getElementById(procedimientoFull).innerText;
        var interviene=document.getElementById(intervieneFull).innerText;
        var cargo=document.getElementById(cargoFull).value;
        var registro=document.getElementById(registroFull).innerText;
        var proceso="Actualiza";    
        document.getElementById("form_fecha").value=fecha;      
        document.getElementById("form_proce").value=procedimiento;  
        document.getElementById("inputOption").value=interviene;
        document.getElementById("select_option").value=cargo;
        document.getElementById("form_registro").value=registro;
        document.getElementById("btn-modal").innerText=("Actualizar");
        document.getElementById("proceso").value=proceso;
        document.getElementById("actualizaId").value=id;

      
            $("#form_ficha").submit(function(){
                var datoForm=$(this).serialize();
                var url = 'nuevo_registro.php';
                console.log("id");
                $.ajax({
                  
                  type:'POST',
                  url:url,
                  data:datoForm,
                  success:function(datosFicha){
                    // alert('Datos ingresados correctamente');
                   
                      $('#myModal').hide();
                      $('#myModal').removeClass('show');
                      $('#myModal').removeAttr('aria-modal');
                      $('#myModal').attr('aria-hidden','true');
                      $('.modal-backdrop').removeClass('modal-backdrop');
                      $('body').removeClass('modal-open');
                      $("#mostrar_antecedentes").html(datosFicha);
                  }
        
                })
                 return false;
            })
     
        
        
}


function borra(id){
    var idi=id;
        console.log(idi);
    var pregunta= confirm("Estas seguro de eliminar el registro?");
    if(pregunta==true){
      var rut = $("#rut").val();
          var option  = {
          name:id,
          rut:rut
          }
      var url     = 'borra_registro.php';

    $.ajax({
      type:'POST',
      url:url,
      data:option,
        success:function(datosFicha){
        alert('Registro borrado exitosamente');
       
          // $('#myModal').hide();
          $('#myModal').removeClass('show');
          $('#myModal').removeAttr('aria-modal');
          $('#myModal').attr('aria-hidden','true');
          $('.modal-backdrop').removeClass('modal-backdrop');
          $('body').removeClass('modal-open');
          $("#mostrar_antecedentes").html(datosFicha);
          // return false;
        
      }
      
    })
    }
    

}



$(document).ready(function(){

//ficha antecedentes para ver el tipo de cargo
$(function(){
          $("#inputOption").on('change',function(){
              var option = $("#inputOption").val();
              var url = 'ficha_antecedentes_cargo.php';
      
              $.ajax({
                type:'POST',
                url:url,
                data:'select='+option,
                success:function(datos){
                  $("#select_option").val(datos);
                  
                }
      
              })
      
          })
      
      return false;
      });
      
//ingresa el nuevo registro

      



});