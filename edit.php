<?php
include 'config.php';

// Comprobando si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
   
    
    $stmt = $pdo->prepare("UPDATE personal SET id= ?, nombre= ?, apellido = ? WHERE edad = ?");
    $stmt->execute([$id,$nombre, $apellido, $edad]);
    
    header('Location: index.php');
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->query("SELECT * FROM personal WHERE id = $id");
$persona = $stmt->fetch();

?>

<h2>Editar persona</h2>

<form action="edit.php" method="post">
    <input type="hidden" name="id" value="<?php echo $persona['id']; ?>">
    Nombre: <input type="text" name="nombre" value="<?php echo $persona['nombre']; ?>"><br>
   Apellido: <input type="text" name="apellido" value="<?php echo $persona['apellido']; ?>"><br>
   Edad: <input type="number" name="edad" value="<?php echo $persona['edad']; ?>"><br>
   
    <input type="submit" value="Guardar Cambios">
</form>
