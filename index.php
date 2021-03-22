<!DOCTYPE html>
<html lang="en">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "php-d12";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    }
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP intro</title>
</head>
<body>
    <h1>Manejo de Tareas</h1>
    <form action="store.php" method="POST">
        <label for="tarea">Nombre de tarea</label>
        <br>
        <input type="text" name="tarea">
        <br>
        <label for="descripcion">Descripción</label>
        <br>
        <textarea name="descripcion"cols="30" rows="3"></textarea>
        <br>
        <label for="prioridad">Prioridad</label>
        <br>
        <select name="prioridad">
            <option value="Alta">Alta</option>
            <option value="Media">Media</option>
            <option value="Baja">Baja</option>
        </select>
        <br>

        <input type="checkbox", name="urgente" value="1">
        <label for="urgente">Urgente</label>

        <br>
        <input type="radio" name="tipo" value="escuela">
        <label for="tipo">Escuela</label>

        <input type="radio" name="tipo" value="trabajo">
        <label for="tipo">Trabajo</label>
        <br>
        <input type="submit" value="Enviar">

    </form>
    <br>

    <h2>Lista de tareas</h2>
    <?php
        
     $sql = "SELECT * FROM tareas";
     $stmt = $conn->prepare($sql);
     $stmt ->execute();


     $stmt->setFetchMode(PDO::FETCH_ASSOC);

     echo "<table border='1'>";
     echo "<tr> <th>ID</th> <th>Tarea</th> <th>Descripción</th> <th>Prioridad</th> <th>Tipo</th> </tr>";
     foreach($stmt->fetchAll() as $tarea){
         echo "<tr>
                <th>". $tarea['id'] . "</th> 
                <th>". $tarea['tarea'] . "</th> 
                <th>". $tarea['descripcion']."</th>
                <th>". $tarea['prioridad'] . "</th>
                <th>". $tarea['tipo'] . "</th> 
            </tr>";
     }
     echo "</table>";

    ?>
</body>
</html>