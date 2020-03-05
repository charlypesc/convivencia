<?php

    $nombre_temporal = $_FILE['archivo']['tmp_name'];
    $nombre = $_FILE['archivo']['name'];
    move_uploaded_file($nombre_tempora, 'archivos/'.$nombre);



?>