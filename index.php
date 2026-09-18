<?php
// 1. Capturamos qué página quiere ver el usuario. Si no hay ninguna, cargamos 'inicio'.
$pagina_solicitada = isset($_GET['page']) ? $_GET['page'] : 'inicio';

// 2. Por seguridad, limpiamos la variable para evitar que alguien intente acceder a carpetas del servidor
$pagina_segura = basename($pagina_solicitada);

// 3. Definimos la ruta del archivo que queremos cargar
$ruta_archivo = "paginas/" . $pagina_segura . ".html";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>D&D 5e Wiki - Sistema sin BD</title>
</head>
<body>

    <!-- Encabezado principal -->
    <table width="100%" border="0" cellpadding="10" bgcolor="#eeeeee">
        <tr>
            <td>
                <h1>Wiki de Dungeons & Dragons 5e</h1>
            </td>
        </tr>
    </table>

    <!-- Estructura de columnas usando tablas (alternativa a CSS) -->
    <table width="100%" border="1" cellpadding="15" cellspacing="0">
        <tr>
            <!-- BARRA LATERAL (Menú de navegación) -->
            <td width="20%" valign="top" bgcolor="#f9f9f9">
                <h3>Navegación</h3>
                <ul>
                    <li><a href="index.php?page=inicio">Página Principal</a></li>
                </ul>
                
                <h3>Reglas de Creación</h3>
                <ul>
                    <li><a href="index.php?page=razas">Razas</a></li>
                    <li><a href="index.php?page=clases">Clases</a></li>
                    <li><a href="index.php?page=trasfondos">Trasfondos</a></li>
                    <li><a href="index.php?page=dotes">Dotes</a></li>
                </ul>

                <h3>Magia y Equipo</h3>
                <ul>
                    <li><a href="index.php?page=hechizos">Hechizos</a></li>
                    <li><a href="index.php?page=armas_y_armaduras">Armas y Armaduras</a></li>
                    <li><a href="index.php?page=objetos_magicos">Objetos Mágicos</a></li>
                </ul>
            </td>

            <!-- ÁREA DE CONTENIDO PRINCIPAL -->
            <td width="80%" valign="top">
                <?php
                // 4. Verificamos si el archivo solicitado existe físicamente en la carpeta
                if (file_exists($ruta_archivo)) {
                    // Si existe, inyectamos su código HTML aquí
                    include($ruta_archivo);
                } 
                else {
                        // Error 404 básico
                        echo "<h2>Página no encontrada</h2>";
                        echo "<p>La página <b>" . htmlspecialchars($pagina_segura) . "</b> no ha sido creada todavía.</p>";
                        echo "<p>Crea el archivo <i>paginas/" . htmlspecialchars($pagina_segura) . ".html</i> para añadir este contenido.</p>";
                }
                ?>
            </td>
        </tr>
    </table>

</body>
</html>