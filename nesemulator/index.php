<?php
$dir = './'; // Directorio actual
$files = scandir($dir);

echo "<h2>Contenido del Directorio: $dir</h2>";
echo "<ul>";

foreach ($files as $file) {
    // Ignorar las entradas de directorio actual y padre
    if ($file != '.' && $file != '..') {
        // Comprueba si es un directorio para darle un estilo diferente si quieres
        $is_dir = is_dir($file);
        
        // Crea un enlace al archivo o directorio
        echo "<li>";
        if ($is_dir) {
            echo "📁 <strong><a href=\"$file/\">$file/</a></strong>";
        } else {
            echo "📄 <a href=\"$file\">$file</a>";
        }
        echo "</li>";
    }
}

echo "</ul>";
?>
