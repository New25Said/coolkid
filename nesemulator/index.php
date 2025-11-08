<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explorador de Archivos (PHP)</title>
    <style>
        /* Estilos básicos para la presentación */
        body { 
            font-family: Arial, sans-serif; 
            background-color: #f8f9fa; 
            padding: 20px; 
            display: flex;
            justify-content: center;
        }
        .file-list { 
            background-color: white; 
            border: 1px solid #dee2e6; 
            border-radius: 6px;
            padding: 25px; 
            width: 100%;
            max-width: 700px; 
            box-shadow: 0 4px 8px rgba(0,0,0,.05);
        }
        .file-list h2 { 
            color: #495057;
            border-bottom: 2px solid #e9ecef; 
            padding-bottom: 10px; 
            margin-top: 0; 
        }
        .file-list ul { 
            list-style: none; 
            padding: 0; 
        }
        .file-list li { 
            margin-bottom: 5px; 
            padding: 8px 0; 
            border-bottom: 1px dotted #e9ecef; 
        }
        .file-list li:last-child { 
            border-bottom: none; 
        }
        .file-list a {
            text-decoration: none;
            color: #007bff;
        }
        .file-list a:hover {
            text-decoration: underline;
            color: #0056b3;
        }
        .folder { 
            color: #198754; /* Color verde para carpetas */
            font-weight: bold; 
        }
        .file { 
            color: #007bff; /* Color azul para archivos */
        }
        .icon { 
            margin-right: 10px; 
            display: inline-block;
            width: 1.2em; /* Ancho fijo para alinear */
        }
    </style>
</head>
<body>

<div class="file-list">
    <h2>📂 Explorador de Directorio Actual</h2>
    <ul>
        <?php
        // 1. Definir el directorio a escanear (el directorio donde está index.php)
        $dir = './'; 
        
        // 2. Obtener el listado de archivos y directorios
        // La función scandir() devuelve un array con todos los elementos, incluyendo '.' y '..'
        $items = scandir($dir);
        
        // 3. Iterar sobre cada elemento encontrado
        foreach ($items as $item) {
            // Ignorar las referencias al directorio actual (.) y al directorio padre (..)
            if ($item === '.' || $item === '..') {
                continue;
            }

            // 4. Determinar si es un directorio o un archivo
            $is_dir = is_dir($dir . $item);
            
            // 5. Preparar la etiqueta de lista
            echo "<li>";

            // 6. Generar el icono y el enlace basado en si es directorio o archivo
            if ($is_dir) {
                // Si es un directorio, añadimos una barra al final del enlace y el nombre
                echo "<span class='icon folder'>&#x1F4C1;</span>"; // Icono de carpeta (emoticono)
                echo "<a href=\"$item/\" class='folder'>$item/</a>";
            } else {
                // Si es un archivo
                echo "<span class='icon file'>&#x1F4C4;</span>"; // Icono de página (emoticono)
                echo "<a href=\"$item\" class='file'>$item</a>";
            }
            
            echo "</li>";
        }
        ?>
    </ul>
    
    <p style="margin-top: 20px; font-size: 0.8em; color: #6c757d;">
        *Este listado es generado dinámicamente por PHP en el servidor.
    </p>

</div>

</body>
</html>
