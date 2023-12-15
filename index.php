
<?php
include 'config.php';

$stmt = $pdo->query('SELECT * FROM personal');
$personal = $stmt->fetchAll();
?>

<h2>Personal</h2>

<!-- Botón para crear un nuevo jabón -->
<a href="create.php">Crear nueva persona</a>
<br><br>

<ul>
<?php foreach ($personal as $persona): ?>
    <li>
        <?php echo $persona['nombre']; ?> <?php echo $persona['apellido']; ?> <?php echo $persona['edad']; ?>
        <a href="edit.php?id=<?php echo $persona['id']; ?>">Editar</a>
        <a href="delete.php?id=<?php echo $persona['id']; ?>">Eliminar</a>
    </li>
<?php endforeach; ?>
</ul>