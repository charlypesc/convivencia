


//Aplica un recargar pagina para limpiar de errores
var eClose = document.getElementsByClassName("close");

var myFun = function() {
  // alert("hola");
  location.reload();
  return false;
}
for (var i = 0; i < eClose.length; i++) {
  eClose[i].addEventListener('click', myFun, false);
}


function registra(){
    id=null;
    var procesoRegistra="Registra";
    document.getElementById("proceso").value=procesoRegistra;
    document.getElementById("form_ficha").reset();
    document.getElementById("actualizaId").value=id;

    ClassicEditor
        .create( document.querySelector( '#form_registro' ),{
            toolbar:['heading','|','bold','italic','bulletedList','numberedList','undo','redo']
        } )
        
        .catch( error => {
            console.error( error );
        } );

        ClassicEditor
        .create( document.querySelector( '#form_acuerdo' ),{
            toolbar:['heading','|','bold','italic','bulletedList','numberedList','undo','redo']
        } )
        .catch( error => {
            console.error( error );
        } );


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
                // location.reload();
            }
  
          })
          return false;
      })
      
  });
}



function actualiza(id){
  
        // creacion de variables con id distintivos
        var fechaFull   ='fecha'+id;
        var procedimientoFull='procedimiento'+id;
        var intervieneFull='interviene'+id;
        var cargoFull='cargo'+id;
        var registroFull='registro'+id;
        var acuerdoFull='acuerdo'+id;
        // se captura la info de cada elemento del informe
        var fecha=document.getElementById(fechaFull).innerHTML;
        var procedimiento=document.getElementById(procedimientoFull).innerText;
        var interviene=document.getElementById(intervieneFull).innerText;
        var cargo=document.getElementById(cargoFull).value;
        var registro=document.getElementById(registroFull).innerHTML;
        var acuerdo=document.getElementById(acuerdoFull).innerHTML;
        console.log(acuerdoFull);
        var proceso="Actualiza";    

        //se trasvasija la info en la vista modal
        
        document.getElementById("form_fecha").value=fecha;      
        document.getElementById("form_proce").value=procedimiento;  
        document.getElementById("inputOption").value=interviene;
        document.getElementById("select_option").value=cargo;
        document.getElementById("btn-modal").innerText=("Actualizar");
        document.getElementById("proceso").value=proceso;
        // console.log(proceso);
        document.getElementById("actualizaId").value=id;
         //paso de datos al editor registro
        ClassicEditor
        .create( document.querySelector( '#form_registro' ),{
            toolbar:['heading','|','bold','italic','bulletedList','numberedList','undo','redo']
        } )
        .then(editor => {
          console.log(editor);
          editor.setData(registro); 
        })
        .catch( error => {
            console.error( error );
        } );
        //paso de datos al editor acuerdo
        ClassicEditor
        .create( document.querySelector( '#form_acuerdo' ),{
            toolbar:['heading','|','bold','italic','bulletedList','numberedList','undo','redo']
        } )
        .then(editora => {
          console.log(editora);
          editora.setData(acuerdo); 
        })
        .catch( error => {
            console.error( error );
        } );
      
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
                      // location.reload();
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
          // location.reload();
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