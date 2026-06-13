<?php
session_start();

if (!isset($_SESSION['libros'])) {
    $_SESSION['libros'] = [];
}

$total = count($_SESSION['libros']);

$disponibles = 0;
$noDisponibles = 0;
$totalPaginas = 0;
$maxPaginas = 0;
$libroMax = "";

$totalStock = 0;
$anios = [];
$generos = [];

foreach ($_SESSION['libros'] as $libro) {

    
    if ($libro['disponible']){
        $disponibles++;
    } else {
        $noDisponibles++;
    }

    
    $totalPaginas += $libro['paginas'];

    
    if ($libro['paginas'] > $maxPaginas) {
        $maxPaginas = $libro['paginas'];
        $libroMax = $libro['nombre'];
    }

    
    $totalStock += $libro['stock'];

    
    $anios[] = $libro['ano'];

    
    $genero = $libro['genero'];
    if (!isset($generos[$genero])) {
        $generos[$genero] = 0;
    }
    $generos[$genero]++;
}


$promedio = $total > 0 ? $totalPaginas / $total : 0;


$porcentaje = $total > 0 ? ($disponibles / $total) * 100 : 0;


$masAntiguo = !empty($anios) ? min($anios) : 0;
$masReciente = !empty($anios) ? max($anios) : 0;


$generoPopular = "";
$maxGenero = 0;

foreach ($generos as $g => $cantidad) {
    if ($cantidad > $maxGenero) {
        $maxGenero = $cantidad;
        $generoPopular = $g;
    }
}
?>

<link rel="stylesheet" href="css/estilos.css">


<a href="index.php">
    <button>← Volver</button>
</a>

<h1>Estadísticas</h1>

<ul>

    <li><strong>Total de libros:</strong> <?= $total ?></li>

    <li><strong>Disponibles:</strong> <?= $disponibles ?></li>
    <li><strong>No disponibles:</strong> <?= $noDisponibles ?></li>

    <li><strong>Porcentaje de disponibilidad:</strong> <?= number_format($porcentaje, 2) ?>%</li>

    <li><strong>Libro más antiguo:</strong> <?= $masAntiguo ?></li>
    <li><strong>Libro más reciente:</strong> <?= $masReciente ?></li>

    <li><strong>Género más popular:</strong> <?= $generoPopular ?></li>

    <li><strong>Total de páginas:</strong> <?= $totalPaginas ?></li>
    <li><strong>Promedio de páginas:</strong> <?= number_format($promedio, 2) ?></li>

    <li><strong>Libro con más páginas:</strong> <?= $libroMax ?> (<?= $maxPaginas ?> páginas)</li>

    <li><strong>Inventario total (stock):</strong> <?= $totalStock ?></li>

</ul>



