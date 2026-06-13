<?php
session_start();

if (!isset($_SESSION['libros'])) {
    $_SESSION['libros'] = [

        [
            'id' => 1,
            'nombre' => 'Coraline y la puerta secreta',
            'autor' => 'Neil Gaiman',
            'genero' => 'Fantasía',
            'ano' => 2002,
            'paginas' => 160,
            'disponible' => true,
            'stock' => 7
        ],

        [
            'id' => 2,
            'nombre' => 'Habitos atomicos',
            'autor' => 'James Clear',
            'genero' => 'No ficción',
            'ano' => 2018,
            'paginas' => 328,
            'disponible' => true,
            'stock' => 2
        ],

        [
            'id' => 3,
            'nombre' => 'Shingeki no Kyojin (Tomo #1)',
            'autor' => 'Hajime Isayama',
            'genero' => 'Ficción',
            'ano' => 2010,
            'paginas' => 208,
            'disponible' => true,
            'stock' => 4
        ],
    ];
}

if (isset($_GET['cambiar'])) {
    $id = $_GET['cambiar'];

    foreach ($_SESSION['libros'] as &$libro) {
        if ($libro['id'] == $id) {

            $libro['disponible'] = $libro['disponible'] ? false : true;
            break;
        }
    }

    unset($libro); 

    header("Location: index.php"); 
    exit;
}

?>

<link rel="stylesheet" href="css/estilos.css">

<h1>Libreria Internacional</h1>

<nav>
    <a href="registrar.php">Registrar</a>
    <a href="registrar.php">Registrar</a>
    <a href="buscar.php">Buscar</a>
    <a href="estadisticas.php">Estadísticas</a>
</nav>

<h2>Lista de libros</h2>

<table>

<tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Género</th>
    <th>Páginas</th>
    <th>Disponible</th>
    <th>Cambiar Disponibilidad</th>
</tr>

<?php foreach ($_SESSION['libros'] as $libro): ?>
<tr>
    <td><?= $libro['id'] ?></td>
    <td><?= $libro['nombre'] ?></td>
    <td><?= $libro['genero'] ?></td>
    <td><?= $libro['paginas'] ?></td>
    <td><?= $libro['disponible'] ? 'Sí' : 'No' ?></td>
    <td>
        <a href="index.php?cambiar=<?= $libro['id'] ?>">
            <button>Alternar</button>
        </a>
    </td>
</tr>
<?php endforeach; ?>

</table>
