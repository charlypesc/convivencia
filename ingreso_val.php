<?php
include('clases/cn.php');

$nombres        = "";
$apellidos      = "";
$rut            = "";
$curso          = "";
$nacimiento     = "";
$apoderado      = "";
$direccion      = "";
$fechaIngreso   = "";



    $nombres        = $_GET['nombres'];
    $apellidos      = $_GET['apellidos'];
    $rut            = $_GET['rut'];
    $curso          = $_GET['curso'];
    $nacimiento     = $_GET['nacimiento'];
    $apoderado      = $_GET['apoderado'];
    $direccion      = $_GET['direccion'];
    $fechaIngreso   = $_GET['fechaIngreso'];


    //print_r($_GET);
    // echo $nombres." ".$apellidos;




$db_save_date = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$insert_sql=$db_save_date->query(
    "INSERT INTO `ingreso_alumnos` (
    `id`,`nombres`,`apellidos`, `rut`, `curso`, `nacimiento`, `apoderado`, `direccion`, `fecha_ingreso`) 
    VALUE(
        null, '$nombres', '$apellidos', '$rut','$curso', '$nacimiento', '$apoderado', '$direccion', '$fechaIngreso')");

if($insert_sql==1){
    echo '<h3 class="text-info"><i class="fas fa-check  text-success mr-1"></i> <strong>Registro ingresado correctamente</strong></h3>';
}
?>


