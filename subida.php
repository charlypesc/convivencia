<?php

$nombre_temporal = $_FILES['archivo']['tmp_name'];
$nombre          = $_FILES['archivo']['name'];
move_uploaded_file($nombre_temporal, 'files/'.$nombre);
// print_r($_POST);
// print_r($_FILES);
// echo exec('whoami');
?>