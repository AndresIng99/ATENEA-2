<?php
    
    if (isset($_GET['datos'])) {
        $nombre = $_GET['nombre'];
        $apellido = $_GET['apellido'];
        $id = $_GET['id'];


        echo 
        'Nombre: '.$nombre.'<br>'.
        'Apellido: '.$apellido.'<br>'.
        'Cédula: '.$id;
    }
      
    ?>