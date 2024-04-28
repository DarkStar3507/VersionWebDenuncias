<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Denuncias de Delitos</title>
    <link rel="stylesheet" href="styles.css">
    <style>

        
body {
            background-image: url('imagenes/imagen.png');
            background-size: cover;
            background-position: center 10%;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            max-width: 600px;
            margin: 50px auto; /* Centrar el contenedor */
            background-position: center 20%;
        }

        .container h1 {
            text-align: center;
        }

        .container form {
            text-align: center;
        }

        .container form input[type="text"] {
            width: 60%;
            padding: 10px;
            margin-bottom: 10px;
        }

        .container form button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .container form button:hover {
            background-color: #0056b3;
        }

        .container ul {
            list-style-type: none;
            padding: 0;
        }

        .container ul li {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    
    <div class="container">
    
        <h1>Registro de Denuncias de Delitos</h1>
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
            <label for="nombre">Buscar por nombre:</label>
            <input type="text" id="nombre" name="nombre">
            <button type="submit">Buscar</button>
        </form>

        <?php
        require_once 'datos.php';

        $nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';

        if (!empty($nombre)) {
            $expedientes_filtrados = array_filter($expedientes, function ($expediente) use ($nombre) {
                return stripos($expediente->denunciante, $nombre) !== false || stripos($expediente->denunciado, $nombre) !== false;
            });

            if (!empty($expedientes_filtrados)): ?>
                <h2>Resultados de Búsqueda para "<?php echo $nombre; ?>"</h2>
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
            <?php endif;
        } ?>
    </div>
</body>
</html>
