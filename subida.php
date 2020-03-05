<!DOCTYPE html>
<html lang="es">
<head>
<?php
    include("header.php");
?>
<script src="js/subir.js"></script>
</head>

<body>
<style>
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
    <div class="container mt-4">
        <div class="form-1">
            <form action="" id="form_subir">
                <input type="file" name="archivo" required>
        <div class="barra">
            <div class="barra_azul" id="barra_estado">
                <span></span>
            </div>
        </div>
            <div class="acciones mt-3">
                <input type="submit" class="btn btn-primary" value="enviar">
                <input type="button" class="cancel" id="cancelar" value="Cancelar">
            </div>
            </form>
        </div>
        
    </div>
 
</body>

</html>