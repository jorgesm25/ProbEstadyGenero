<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los valores del formulario
    $nombre = $_POST['nombre'] ?? '';
    $genero = $_POST['Género'] ?? '';
    $area = $_POST['Área'] ?? '';
    $pais = $_POST['País'] ?? '';
    $perfil = $_POST['Perfil'] ?? '';

    // Validar si se enviaron los valores
    if (!empty($nombre) && !empty($genero) && !empty($area) && !empty($pais) && !empty($perfil)) {
        // Ruta y nombre del archivo
        $ruta_archivo = "./Datos.txt";

        // Verificar si el archivo existe
        $archivo_existe = file_exists($ruta_archivo);

        // Obtener el número de registros actuales o inicializar en 0 si el archivo no existe
        $num_registros = 0;
        if ($archivo_existe) {
            $lineas = file($ruta_archivo, FILE_SKIP_EMPTY_LINES);
            foreach ($lineas as $linea) {
                if (preg_match('/^\d+\./', $linea)) {
                    $num_registros++;
                }
            }
        }

        // Incrementar el número de registros para el nuevo registro
        $num_registros++;

        // Abrir el archivo en modo de escritura
        $file = fopen($ruta_archivo, "a");
        if ($file) {
            // Escribir la cabecera si el archivo no existe
            if (!$archivo_existe) {
                fwrite($file, "Id \tNombre Persona \t\tGénero \t\tÁrea \t\tPaís \t\tPerfil" . PHP_EOL);
                fwrite($file, "=========================================================================" . PHP_EOL);
            }

            // Escribir el nuevo registro en el archivo con el formato requerido
            fwrite($file, "$num_registros.\t$nombre\t\t\t$genero\t\t$area\t\t$pais\t\t$perfil" . PHP_EOL);
            fwrite($file, " -------------------------------------------------------------------------" . PHP_EOL);

            // Cerrar el archivo
            fclose($file);

            // Enviar una respuesta JSON al cliente
            echo json_encode(['success' => true]);
            exit();
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al abrir el archivo.']);
            exit();
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Por favor, completa todos los campos del formulario.']);
        exit();
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Acceso inválido.']);
    exit();
}
