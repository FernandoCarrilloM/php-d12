<?php

    include('conexion.php'); 

    if(!empty($_POST['tarea'])){
        //Recibir datos
        $tarea = $_POST['tarea'];
        $descripcion = $_POST['descripcion'];
        $prioridad = $_POST['prioridad'];
        $urgente = $_POST['urgente'];
        $tipo = $_POST['tipo'];
        //Validar datos

        //Guardar en la BD
        $sql = "INSERT INTO tareas(tarea, descripcion, prioridad, urgente,tipo) VALUE('$tarea','$descripcion','$prioridad','$urgente','$tipo')";

        //No se para que
        $conn->exec($sql);

        //Redericcionar
        header('Location: index.php');

    }else{
        echo "No hay datos enviados";
    }

?>