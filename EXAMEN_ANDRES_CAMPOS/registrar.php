

<?php
session_start();
?>

<link rel="stylesheet" href="css/estilos.css">

<a href="index.php">
    <button>← Salir</button>
</a>

<h1>Registrar libro</h1>

<form action="procesar_registro.php" method="POST">

    <label>ID:</label>
    <input type="number" name="id" required min="1" max="9999999999999"><br>

    <label>Nombre:</label>
    <input type="text" name="nombre" required><br>

    <label>Autor:</label>
    <input type="text" name="autor" required><br>

    <label>Género:</label>
    <select name="genero">
        <option>Ficción</option>
        <option>No ficción</option>
        <option>Ciencia</option>
        <option>Historia</option>
        <option>Romance</option>
        <option>Fantasía</option>
    </select><br>

    <label>Año:</label>
    <input type="number" name="ano" required min="1900" max="2024"><br>

    <label>Numero de paginas:</label>
    <input type="number" name="paginas" required min="1" max="5000"><br>

    <label>Disponible:</label>
    <input type="checkbox" name="disponible"><br>

    <label>Stock:</label>
    <input type="number" name="stock" required min="1"><br>

    <button type="submit">Guardar</button>

</form>