<?php 

include("clases/cn.php");

$consulta="";
$consulta=$_GET["consultar"];

//valida que la consulta no tenga caracteres extranos y no sea superior a 13 caracteres
$string_exp = "/^[A-Za-z0-9]+$/";
 
if(!preg_match($string_exp,$consulta)) {
  die('La consulta contiene caracteres no validos <br>');
}
if(strlen($consulta) > 13) {
    die('El rut no es valido<br>');
}


$db_save_date = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$db_save_date->set_charset('utf8');
$insert_sql=$db_save_date->query("SELECT * FROM `ingreso_alumnos` WHERE `rut` ='$consulta'");
if($insert_sql->num_rows==1){
    foreach ($insert_sql->fetch_all(MYSQLI_ASSOC) as $key) {
        $id         =$key['id'];
        $nombres    =$key['nombres'];
        $apellidos  =$key['apellidos'];
    }
    
    // print_r($insert_sql);
    echo '<div class="container"><a href="ficha_antecedentes.php?id='.$id.'"><i class="fas fa-check  text-success mr-1"></i>'.$nombres.' '.$apellidos.'</a></div>
    ';
    
}else{
    echo "Rut no encontrado.";
}




?>