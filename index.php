<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <?php include("header.php");?>
    <title>Document</title>
</head>
<?php include("navbar.php");?>
<body>
<script>
    $(document).ready(function(){
     
            
            $("#val_ajax").submit(function(){

              var datoName=$(this).serialize();

              $.get("consultar_val.php", datoName, procesarDato);
              return false;

            });
            
            function procesarDato(dato_devuelto){
                $("#mostrar").html("<p>" + dato_devuelto + "</p>");
        
            }
           
    

    });
     
    
    
    </script>



    <div class="container mt-4">
    <h2 class="mb-4">Consulta por numero de RUT</h2>
    <p>No incluyas puntos ni guiones</p>
   <form action="consultar_val.php" method="GET" id="val_ajax">
    <div class="input-group mb-3">
            <input type="text" name="consultar" class="form-control" placeholder="Busqueda por numero de rut" aria-label="Busqueda por numero de rut" aria-describedby="button-addon2">
            <div class="input-group-append">
                <button type="submit" class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-search mr-1"></i>Buscar</button>
            </div>
        </div>
        <div id="mostrar"></div>
   </form>

    </div>
</body>
</html>