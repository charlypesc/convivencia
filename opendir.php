<?php


//incio para poder ver el directorio del servidor..
$dir = "files/";//es variable o puede recibir parametro
 $fil=array();
 
// Abre un directorio conocido, y procede a leer el contenido
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        $i=1;
        //lee el fichero siempre y cuando exista
        while (($file = readdir($dh)) !== false) {
            // echo "$file"."<br>";
            $fil[$i]=$file;
            $i++;
        }

        //quita los 2 elementos iniciales del array
        $limit=2;
        for ($x=0; $x < $limit; $x++) { 
            array_shift($fil);
        }


        closedir($dh);

        // print_r($fil);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("header.php")?>
</head>
<body>
<div class="container">
<style>
    body{
        background-color:white;
    }
    input[type="file"]{
        margin:0 0 15px;
        padding:10px 1%;
        border-radius:3px;
    }
    .principal{
        width:80%;
        margin:0 auto;
        padding: 3% 0 6% 0;
        clear: both;
    }
    .barra{
        background-color:#f3f3f3;
        border-radius:5px;
        box-shadow:inset 0px 0px 5px rgba(0,0,0,.2);
        height:25px;
    }
    .barra_azul{
        background-color:#247cc0;
        border-radius:10px;
        display:block;
        height:25px;
        line-height:25px;
        text-align:center;
        width:0%;


    }
    .barra_verde{
        background-color:#2ea265;

    }
    .barra_roja{
        background-color:#de3152;
    }
    #barra_estado span{
        color:#fff;
        font-weight:bold;
        line-height:25px;
    }
</style>


<form action="" method="POST" enctype="multipart/form-data" id="form_subir">
    <div class="form-1-2">
        <label for="">Archivo a Subir</label>
        <input type="file" name="archivo" required>
    </div>
    <div class="barra">
        <div class="barra_azul" id="barra_estado">
            <span></span>
        </div>
    </div>
    <div class="acciones">
        <input type="submit" class="btn btn-primary" value="Enviar">
        <input type="button" class="btn btn-danger" id="cancel" value="Cancelar">
    </div>


</form>




<div class="row border rounded">
    <div class="col-12"><h3>Listado de archivos almacenados en Carpeta FILES</h3></div>    
    <div class="col-12">
    
    <?php 
        foreach ($fil as $key ) {
            
            echo '<a href="files/'.$key.'">'.$key.'</a><br>';
            }
    ?>
    
    
    </div>
</div>






</div>
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
</body>
</html>