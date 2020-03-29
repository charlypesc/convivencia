<?php
$year   ='2018';
$rut    ='17948418-8';
$id     ='2';
$path   ='files/';
$path_for_id=$path.$year.'/'.$rut.'/'.$rut.'-'.$id;
//Creacion de fichero de año.
function years($path,$year){
    $location=$path.$year;
   if(file_exists($location)){
       return true;
   }else{
        mkdir($location, 0700);
        return true; 

   }     
};
//funcion que crea carpetas dentro del año
function rut($path,$year, $rut){
    
    $location   =$path.$year.'/'.$rut; 
    if(file_exists($location)){
        return true;
    }else{
        mkdir($location, 0700);
        return ; 
    }
};
function id($path_id){
    if(file_exists($path_id)){
        return true;
    }else{
        mkdir($path_id,0700);
        return true;
    }
}

if(years($path,$year)==true){
    echo'Fichero de año operativo'.'<br>';
};
if(rut($path,$year,$rut)==true){
    echo 'Fichero para rut operativo'.'<br>';
};
id($path_for_id);

?>