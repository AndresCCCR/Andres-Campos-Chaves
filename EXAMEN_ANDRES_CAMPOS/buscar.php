
<?php
session_start();
?>

<link rel="stylesheet" href="css/estilos.css">

<a href="index.php">
    <button>← Salir</button>
</a>

<h1>Buscar libros</h1>

<form method="GET">

    <label>Buscar por nombre:</label>
    <input type="text" name="buscar"><br>

    <label>Género:</label>
    <select name="genero">

        <option value="">Todos</option>
        <option>Ficción</option>
        <option>No ficción</option>
        <option>Ciencia</option>
        <option>Historia</option>
        <option>Romance</option>
        <option>Fantasía</option>
        
    </select><br>

    <label>Disponibilidad:</label>
    <select name="disponible">

        <option value="">Todos</option>
        <option value="1">Disponible</option>
        <option value="0">No disponible</option>

    </select><br>

    <button type="submit">Buscar</button>

</form>

<?php
$buscar = isset($_GET['buscar']) ? strtolower($_GET['buscar']) : '';
$genero = isset($_GET['genero']) ? $_GET['genero'] : '';
$disponible = isset($_GET['disponible']) ? $_GET['disponible'] : '';

$resultados =[];

foreach ($_SESSION['libros'] as $libro) {

    $coincide = true;

    if ($buscar != '' && strpos(strtolower($libro['nombre']), $buscar) === false) {
        $coincide = false;
    }

    if ($genero != '' && $libro['genero'] != $genero) {
        $coincide = false;
    }

    if ($disponible != ''){
       if ($disponible == "1" && !$libro['disponible']) {
           $coincide = false;
       } 

       if ($disponible == "0" && $libro['disponible']) {
           $coincide = false;
       }
    }
        
    if ($coincide){
        $resultados[] = $libro;
    }

}
?>

<h2>Resultados</h2>

<?php if (empty($resultados)): ?>
    <p>No hay libros encontrados</p>
<?php else: ?>

<table border="1">
<tr>

    <th>ID</th>
    <th>Nombre</th>
    <th>Género</th>
    <th>Disponible</th>

</tr>

<?php foreach ($resultados as $libro): ?>
<tr>

    <td><?= $libro['id'] ?></td>
    <td><?= $libro['nombre'] ?></td>
    <td><?= $libro['genero'] ?></td>
    <td><?= $libro['disponible'] ? 'Si' : 'No' ?></td>

</tr>  

<?php endforeach; ?>

</table>

<?php endif; ?>