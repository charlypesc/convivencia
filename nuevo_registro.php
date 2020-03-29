<?php
include('clases/cn.php');
// print_r($_POST);
$id                 =$_POST['actualizaId'];
$nombre             =$_POST['nombre'];
$apellidos          =$_POST['apellidos'];
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
$acuerdo            =$_POST['content_acuerdo'];
$update_id          =$_POST['actualizaId'];
print_r($proceso);    
$db_insertar_ant = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$db_insertar_ant->set_charset('utf8');
    

switch($proceso){
    case 'Registra':
        $insertar_sql=$db_insertar_ant->query("INSERT INTO `ficha_antecedentes` (`id`, `nombres`, `apellidos`, `rut`, `curso`, `nacimiento`, `apoderado`, `direccion`, `interviene`, `cargo`, `fecha`, `procedimiento`, `registro`, `acuerdo`, `adjuntos`) VALUES (NULL, '$nombre', '$apellidos', '$rut', '$curso', '$nacimiento', '$apoderado', '$direccion', '$interviene', '$cargo', '$fecha_ingreso', '$procedimiento', '$registro','$acuerdo', NULL);");
    break;
    case 'Actualiza':
        $insertar_sql=$db_insertar_ant->query("UPDATE `ficha_antecedentes` SET  `id`='$id', `nombres`='$nombre', `apellidos`='$apellidos', `rut`='$rut', `curso`='$curso', `nacimiento`='$nacimiento', `apoderado`='$apoderado', `direccion`='$direccion', `interviene`='$interviene', `cargo`='$cargo', `fecha`='$fecha_ingreso', `procedimiento`='$procedimiento', `registro`='$registro',`acuerdo`='$acuerdo', `adjuntos`='' WHERE  `ficha_antecedentes`.`id` = '$update_id'");
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