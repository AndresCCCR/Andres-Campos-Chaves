<link rel="stylesheet" href="css/estilos.css">
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {

    $id = htmlspecialchars($_POST['id']);
    $nombre = htmlspecialchars($_POST['nombre']);
    $autor = htmlspecialchars($_POST['autor']);
    $genero = htmlspecialchars($_POST['genero']);
    $ano = htmlspecialchars($_POST['ano']);
    $paginas = htmlspecialchars($_POST['paginas']);
    $stock = htmlspecialchars($_POST['stock']);

$disponible = isset($_POST['disponible']) ? true : false;
$errores = [];

if (empty($id) || empty($nombre) || empty($autor) || empty($genero) || empty($ano) || empty($paginas) || empty($stock)){

    $errores[] = "Todos los campos son obligatorios";

}

if (strlen($nombre) < 5) {
    $errores[] = "El nombre debe de tener minimo 5 caracteres";
}

if (!is_numeric($id)) {
    $errores[] = "El ID debe ser numerico";
}

foreach ($_SESSION['libros'] as $libro){
    if ($libro['id'] == $id) {
        $errores[] = "El ID ya existe";
        break;
    }
}

if (!empty($errores)) {
    foreach ($errores as $error) {
        echo "<p style='color:red;'>$error</p>";
    }
    exit;
}

$nuevoLibro = [

    'id' => $id,
    'nombre' => $nombre,
    'autor' => $autor,
    'genero' => $genero,
    'ano' => $ano,
    'paginas' => $paginas,
    'disponible' => $disponible,
    'stock' => $stock

];

array_push($_SESSION['libros'], $nuevoLibro);

echo "<p style='color:green;'>Libro registrado correctamente</p>";

}
?>

<br><br>

<a href="index.php">
    <button>Volver al inicio</button>
</a>

<a href="registrar.php">
    <button>Registrar otro libro</button>
</a>