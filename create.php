
<?php
include 'config.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre= $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad= $_POST['edad'];
    
    try {
        $sql = "INSERT INTO personal (nombre, apellido, edad) VALUES (:nombre, :apellido, :edad)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([ 'nombre' => $nombre, 'apellido' => $apellido, 'edad' => $edad]);
        
        $message = 'Persona añadida con éxito!';
    } catch (PDOException $e) {
        $message = 'Error al añadir a la persona: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir persona</title>
</head>
<body>
<h2>Añadir nueva persona</h2>

<?php if (!empty($message)): ?>
    <p><?= $message ?></p>
<?php endif; ?>

<form action="create.php" method="post">
    
    <label for="nombre">nombre:</label>
    <textarea name="nombre" id="nombre"></textarea>
    <br>
    <label for="apellido">apellido:</label>
    <input type="text" name="apellido" id="apellido" required>
    <br>
    <label for="edad">edad:</label>
    <input type="number" name="edad" id="edad" required>
    <br>
    <input type="submit" value="Añadir persona">
</form>

</body>
</html>