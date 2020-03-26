<?php
include('clases/cn.php');
// print_r($_POST);
$id                 =$_POST['actualizaId'];
$nombre             =$_POST['nombre'];
$proceso            =$_POST['proceso']; 
$rut                =$_POST['rut'];
$curso              =$_POST['curso'];
$nacimiento         =$_POST['nacimiento'];
$apoderado          =$_POST['apoderado'];
$direccion          =$_POST['direccion'];
$interviene         =$_POST['interviene'];
$cargo              =$_POST['cargo'];
$fecha_ingreso      =$_POST['fecha_ingreso'];
$procedimiento      =$_POST['procedimiento'];
$registro           =$_POST['content'];
$update_id          =$_POST['actualizaId'];
    
$db_insertar_ant = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$db_insertar_ant->set_charset('utf8');
    

switch($proceso){
    case 'Registra':
        $insertar_sql=$db_insertar_ant->query("INSERT INTO `ficha_antecedentes` (`id`, `nombres`, `apellidos`, `rut`, `curso`, `nacimiento`, `apoderado`, `direccion`, `interviene`, `cargo`, `fecha`, `procedimiento`, `registro`, `adjuntos`) VALUES (NULL, '$nombre', null, '$rut', '$curso', '$nacimiento', '$apoderado', '$direccion', '$interviene', '$cargo', '$fecha_ingreso', '$procedimiento', '$registro', NULL);");
    break;
    case 'Actualiza':
        $insertar_sql=$db_insertar_ant->query("UPDATE `ficha_antecedentes` SET  `id`='$id', `nombres`='$nombre', `apellidos`='', `rut`='$rut', `curso`='$curso', `nacimiento`='$nacimiento', `apoderado`='$apoderado', `direccion`='$direccion', `interviene`='$interviene', `cargo`='$cargo', `fecha`='$fecha_ingreso', `procedimiento`='$procedimiento', `registro`='$registro', `adjuntos`='' WHERE  `ficha_antecedentes`.`id` = '$update_id'");
    break;

}
    
//genera la vista nueva

    $consulta_sql=$db_insertar_ant->query("SELECT * FROM `ficha_antecedentes` WHERE `rut` LIKE '$rut' ORDER BY `id` desc");
    

    //envia la nueva consulta

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
         <p><i class="fas fa-file-invoice"></i>'.$i.'</p>
            <div class="mt-2">
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