<?php
include("clases/cn.php");

$id=$_GET['id'];

$db_search_id = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$db_search_id->set_charset('utf8');

$search_sql=$db_search_id->query("SELECT * FROM `ingreso_alumnos` WHERE `id` ='$id'");
$interviene_sql=$db_search_id->query("SELECT * FROM `profesional_interviene`");

if($search_sql->num_rows==1){
  foreach ($search_sql->fetch_all(MYSQLI_ASSOC) as $key) {
    
      $id=$key['id'];
      $nombres=$key['nombres'];
      $apellidos=$key['apellidos'];
      $rut=$key['rut'];
      $curso=$key['curso'];
      $nacimiento=$key['nacimiento'];
      $apoderado=$key['apoderado'];
      $direccion=$key['direccion'];
      $fecha=$key['fecha_ingreso'];
  }
}

$consulta_sql=$db_search_id->query("SELECT * FROM `ficha_antecedentes` WHERE `rut` LIKE '$rut' ORDER BY `id` desc");

?>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta charset="UTF-8"/>

<?php include("header.php"); ?>

<title>Document</title>
</head>
<body>

<?php include("navbar.php");?>
<div class="container mt-3"><h1>Ficha Antecedentes</h1></div>
<form  id="form_ficha" action="nuevo_registro.php"  method="POST">

<table class="table table-bordeless container">

  <tbody>
    <tr>
      
      <td>Nombre</td>
      <td><input class="form-control form-control-sm" name="nombre" type="text" placeholder="" value="<?php echo $nombres;?>" readonly></td>
    </tr>
    <tr>
      
      <td>Apellidos</td>
      <td><input class="form-control form-control-sm" name="apellidos" type="text" placeholder="" value="<?php echo $apellidos;?>" readonly></td>
    </tr>
    <tr>
      
      <td>Rut</td>
      <td><input id="rut" class="form-control form-control-sm" name="rut" type="text" placeholder="" value="<?php echo $rut?>" readonly></td>
    </tr>
    <tr>
        
      <td>Curso</td>
      <td><input class="form-control form-control-sm" name="curso" type="text" placeholder="" value="<?php echo $curso?>" readonly></td>
    </tr>
    <tr>
        
      <td>Fecha de Nacimiento</td>
      <td><input class="form-control form-control-sm" name="nacimiento" type="text" placeholder="" value="<?php echo $nacimiento?>" readonly></td>
    </tr>
    <tr>
        
      <td>Apoderado</td>
      <td><input class="form-control form-control-sm" name="apoderado" type="text" placeholder="" value="<?php echo $apoderado?>" readonly></td>
    </tr>
    <tr>
        
        <td>Dirección</td>
        <td><input class="form-control form-control-sm" name="direccion" type="text" placeholder="" value="<?php echo $direccion?>" readonly></td>
      </tr>
  </tbody>
</table>


  <div class=" d-flex justify-content-center">
      <button type="button" onclick="registra();" class="btn btn-primary mr-3" data-toggle="modal" data-target=".bd-example-modal-xl" ><i class="fas fa-file"></i> Ingresar Nuevo Antecedente</button>
</div>


<!-- inicio de modal -->



<div id="myModal" class="modal fade bd-example-modal-xl show" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
  
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title">Registra o Edita la ficha de Antecedentes</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <div class="container mt-3 mb-3">
        <div class="row">
          <div class="col-2 mt-1">Fecha</div>
          <div class="col-10"><input id="form_fecha" name="fecha_ingreso" class="form-control form-control-sm" type="date" placeholder="" value="" required></div>
        </div>
        <div class="row mt-2">
          <div class="mt-1 col-2">Interviene</div>
          
            <div class="col-10">
                              <select id="inputOption" class="form-control" name="interviene" required>
                                  <option selected></option>
                                  
                                  <?php 

                                  //solamente carga desde la BBDD el Nombre despues a traves de una llamada AJAX se realizara la nueva busqueda en la BBDD
                                    foreach ($interviene_sql->fetch_all(MYSQLI_ASSOC) as $key) {
    
                                      $interviene=$key['nombre'];
                                     
                                      echo "<option>".$interviene."</option>";
                                      
                                       
                                   }
                                  
                                  ?>

                              </select>
              </div>
        </div>
        <div class="row mt-2">
          <div class="col-2 mt-1">Cargo</div>
          <div class="col-10">
            <input id="select_option" name="cargo" class="form-control" type="text" placeholder="" value=""readonly required>
          </div>
        </div>
        <div class="row mt-2">   
          <div class="col-3 col-sm-3 col-md-3 col-lg-2 mt-1">Procedimiento</div>
          <div class="col-9 col-sm-9 col-md-9 col-lg-10">
            <input id="form_proce" name="procedimiento" class="form-control form-control-sm" type="text" placeholder="" value="" required>
          </div>
          </div>
          <div class="d-flex justify-content-center row mt-4 flex-wrap">
            <div class="col-11">
              <h3 class="mt-2 mb-4">Registro de procedimiento realizado:</h3>
              <textarea name="content" id="form_registro"></textarea>
            </div>
          </div>
          <div class="d-flex justify-content-center row mt-4 flex-wrap">
            <div class="col-11">
              <h3 class="mt-2 mb-4">Acuerdo realizado:</h3>
              <textarea name="content_acuerdo" id="form_acuerdo"></textarea>
              <input id="actualizaId" type="hidden" name="actualizaId" value="">
            </div>
          </div>
          <input id="proceso" type="hidden" name="proceso" value="Registra">                                  
        </div>
        <div class="row justify-content-center mt-2 mb-4">
          <div class="col-2"><button id="btn-modal" type="submit" class="btn btn-success">Ingresar</button> </div>
        </div>
          
         
      </div>
    </div>
  </div>
</div>

<!-- Large modal -->


<!-- <button type="button" class="btn btn-primary"><i class="fas fa-file-pdf"></i> Exportar fichas</button> -->
</form>

<div id="mostrar_antecedentes">

<?php


if($consulta_sql->num_rows>=1){
  $i=1;
    foreach($consulta_sql->fetch_all(MYSQLI_ASSOC)as $key){
        $id                 =$key['id'];
        $interviene         = $key['interviene'];
        $nombres            = $key['nombres'];
        $apellidos          = $key['apellidos'];
        $fecha_antecedente  = $key['fecha'];
        $procedimiento      = $key['procedimiento'];
        $registro           = $key['registro'];
        $acuerdo            = $key['acuerdo'];
        $cargo              = $key['cargo'];
        $date='2020';
        // print_r($year);
        echo '
        
        <br><br><div class="container p-4 mt-3 border rounded ">
            <div class="row">
              
              <div class="col-8  border d-flex">
                <p>Antecedente:</p>
                <p class="ml-1" id="procedimiento'.$id.'">'.$procedimiento.'</p>
              </div>
              <div class="col-4 border">
                <p class="ml-1"> Folio: '.$rut.''.$date.'-'.$id.'</p>
              </div>
            </div>
            <div class="row mb-1">
              <div class= "d-flex col-4 border ">
                <p class="" id="fecha'.$id.'">'.$fecha_antecedente.'</p>
                <input type="hidden" id="id'.$id.'" value="'.$id.'">
                <input type="hidden" id="cargo'.$id.'" value="'.$cargo.'">
              </div>
              <div class="col-4 border  d-flex">
                <p>Interviene :</p>
                <p class="ml-1"id=interviene'.$id.'>'.$interviene.'</p>
              </div>
              <div class="col-4  border d-flex">
                <p>Estudiante :</p>
                <p class="ml-1">'.$nombres.' '.$apellidos.'</p>
              </div>
            </div>
            <div class="row">
              
            </div>
            <div class="row">
              <h6 class="mt-2 mb-2">Registro de Antecedentes:</h6>
              <div id="registro'.$id.'" class="col-12 d-flex flex-column  mt-3 mb-3 pt-2 ">'.$registro.'</div>
            </div>
            <div class="row">
              <h6 class="mt-2 mb-2">Acuerdos:</h6>
              <div id="acuerdo'.$id.'" class="col-12 d-flex flex-column border  rounded mt-3 mb-3 pt-2 ">'.$acuerdo.'</div>
            </div>
            
            <div class="row mb-3">
              <button type="button" id="actualiza" onclick="actualiza('.$id.');"  data-toggle="modal" data-target=".bd-example-modal-xl" class="btn btn-success mr-2">Actualizar</button>
              <button type="button" id="borrar" onClick="borra('.$id.');" class="btn btn-danger">Borrar</button>
            </div>
            
         </div><br><br><br><br><br><br>   
                      ';
                      $i++;
    }
}else{
    echo 'No hay registros de este rut.';
}
?>
<script src="js/convivencia.js"></script> 
<script>

    document.addEventListener("DOMContentLoaded",()=>{
        let form = document.getElementById("form_subir");
        form.addEventListener("submit",function(event){
            event.preventDefault();
            subir_archivos(this);
        });
    });



        function subir_archivos(form){
            let barra_estado = form.children[1].children[0],
                span = barra_estado.children[0],
                boton_cancelar= form.children[2].children[1];

            barra_estado.classList.remove('barra_verde','barra_roja');
            //peticion

            let peticion = new XMLHttpRequest();

            peticion.upload.addEventListener("progress",(event)=>{
                let porcentaje = Math.round((event.loaded / event.total)*100);
                console.log(porcentaje);
                barra_estado.style.width =porcentaje+'%';
                span.innerHTML = porcentaje+'%';
            });
            //finalizaod

            peticion.addEventListener("load",()=>{
                barra_estado.classList.add('barra_verde');
                span.innerHTML = "Proceso Completado";
            });
            
            //enviar datos

            peticion.open('post','subida.php');
            peticion.send(new FormData(form));

            //cancelar

            boton_cancelar.addEventListener("click",()=>{
                peticion.abort();
                barra_estado.classList.remove('barra_verde');
                barra_estado.classList.add('barra_roja');
                span.innerHTML = "Proceso Cancelado";

            });

        }


</script>
</div>

</body>
</html>