<?php
require_once 'datos.php';

$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';

$expedientes_filtrados = array_filter($expedientes, function ($expediente) use ($nombre) {
    return stripos($expediente->denunciante, $nombre) !== false || stripos($expediente->denunciado, $nombre) !== false;
});

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Búsqueda</title>
    <link rel="stylesheet" href="styles.css">

    <style>

        
body {
            background-image: url('imagenes/imagenjuez.jpg');
            background-size: cover;
            background-position: center 60%;
        }
        </style>
</head>
<body>
    <div class="container">
        <h1>Resultados de Búsqueda para "<?php echo $nombre; ?>"</h1>

        <?php if (!empty($expedientes_filtrados)): ?>
            <ul>
                <?php foreach ($expedientes_filtrados as $expediente): ?>
                    <li>
                        <strong><?php echo $expediente->denunciante; ?></strong> denunció a <strong><?php echo $expediente->denunciado; ?></strong> por los siguientes delitos:
                        <ul>
                            <?php foreach ($expediente->delitos as $delito): ?>
                                <li><?php echo $delito->tipo; ?>: <?php echo $delito->descripcion; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No se encontraron resultados para "<?php echo $nombre; ?>".</p>
        <?php endif; ?>
    </div>
</body>
</html>
