<!DOCTYPE html>
<html lang="en">
<head>
   <?php include("header.php"); ?>
</head>
<body>
<?php include("navbar.php"); ?>
<script>
    $(document).ready(function(){
     
            
            $("#val_ajax").submit(function(){

              var datoName=$(this).serialize();

              $.get("ingreso_val.php", datoName, procesarDato);
              return false;

            });
            
            function procesarDato(dato_devuelto){
                $("#mostrar").html("<p>" + dato_devuelto + "</p>");
        
            }
           
    

    });
     
    
    
    </script>

    <div class="container">
    <form action="ingreso_val.php" method="GET" id="val_ajax">
            <h1 class="mt-3 ml-3">Ingreso de Alumnos</h1>
            
            <div class="form-group">
            
                <input type="text" class="form-control ml-3 " id="formGroupExampleInput" id="nombres" name="nombres" placeholder="Nombres">
            </div>
            <div class="form-group">
            
                <input type="text" class="form-control ml-3 " id="formGroupExampleInput" name="apellidos"id="apellidos" placeholder="Apellidos">
            </div>
            <div class="form-group ">
                
                <input type="text" class="form-control ml-3" id="formGroupExampleInput2" id="rut" name="rut" placeholder="Rut">
            </div>
            <div class="form-group">

                <input type="text" class="form-control ml-3" id="formGroupExampleInput2" id="curso" name="curso" placeholder="Curso">
            </div>
            <div class="form-group">

                <input type="text" class="form-control ml-3" id="formGroupExampleInput2" id="nacimiento" name="nacimiento" placeholder="Fecha de Nacimiento">
            </div>
            <div class="form-group">

                <input type="text" class="form-control ml-3" id="formGroupExampleInput2" id="apoderado" name="apoderado" placeholder="Apoderado">
            </div>
            <div class="form-group">

                <input type="text" class="form-control ml-3" id="formGroupExampleInput2" id="direccion" name="direccion" placeholder="Dirección">
            </div>
            <div class="form-group">

                <input type="text" class="form-control ml-3" id="formGroupExampleInput2" id="fechaIngreso" name="fechaIngreso" placeholder="Fecha de Ingreso">
            </div>
    
            <button type="submit" class="btn btn-primary ml-3">Ingresar</button>
       

    </form>
    <div id="mostrar" class="container d-flex align-items-baseline mt-3">
    
     
    
    </div>
    </div>
    
</body>
</html>