<?php
include("clases/cn.php");
$usuario=$_POST['select'];
if($usuario=='Elegir...'){
    echo 'Debe seleccionar un profesional';
    die;
}

$db_search_interviene = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$db_search_interviene->set_charset('utf8');
$search_sql=$db_search_interviene->query("SELECT * FROM `profesional_interviene` WHERE `nombre` LIKE '$usuario'");
// $search_sql=$db_search_interviene->query("SELECT * FROM `profesional_interviene`");
foreach($search_sql->fetch_all(MYSQLI_ASSOC) as $key){
    $cargo=$key['cargo'];
}

echo $cargo;