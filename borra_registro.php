<?php
include("clases/cn.php");

$id = $_POST['name'];
$rut=$_POST['rut'];
// print_r($_POST);
$db_elimina_registro = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$db_elimina_registro->set_charset('utf8');
$search_sql=$db_elimina_registro->query("DELETE FROM `ficha_antecedentes` WHERE `ficha_antecedentes`.`id` = '$id'");
$consulta_sql=$db_elimina_registro->query("SELECT * FROM `ficha_antecedentes` WHERE `rut` LIKE '$rut' ORDER BY `id` desc");
    // print_r($consulta_sql);
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
              $cargo              = $key['cargo'];
              
              echo '
              
               <div class="container mt-3 border rounded">
                  <div class="mt-2">
                  <p><i class="fas fa-file-invoice"></i> '.$i.'</p>
                    <input type="hidden" id="id'.$id.'" value="'.$id.'">
                    <input type="hidden" id="cargo'.$id.'" value="'.$cargo.'">
                  </div>
                  <div class="d-flex">
                      <p>Interviene :</p>
                      <p class="ml-1"id=interviene'.$id.'>'.$interviene.'</p>
                  </div>
                  <div class="d-flex">
                      <p>Estudiante :</p>
                      <p class="ml-1">'.$nombres.' '.$apellidos.'</p>
                  </div>
                  <div class="d-flex">
                      <p>Fecha:</p>
                      <p class="ml-1" id="fecha'.$id.'">'.$fecha_antecedente.'</p>
                  </div>
                  <div class="d-flex">
                      <p>Procedimiento:</p>
                      <p class="ml-1" id="procedimiento'.$id.'">'.$procedimiento.'</p>
                  </div>
                  <div class="d-flex">
                      <p  class="mr-1">Registro:<br></p>
                      <p id="registro'.$id.'">'.$registro.'</p>
                  </div>
                  <div class="mb-3">
                    <button type="button" id="actualiza" onclick="actualiza('.$id.');"  data-toggle="modal" data-target=".bd-example-modal-xl" class="btn btn-success">Actualizar</button>
                    <button type="button" id="borrar" onClick="borra('.$id.');" class="btn btn-danger">Borrar</button>
                    </div>   
                  
               </div>
                            ';
                            $i++;
          }
      }else{
          echo 'No hay registros de este rut.';
      }






?>