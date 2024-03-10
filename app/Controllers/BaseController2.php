<?php
namespace App\Controllers;


class BaseController2
{
    public function renderHTML($fileName, $data = [])
    {
        // Construye la ruta completa al archivo de vista
        $viewPath = __DIR__ . '/../Views/' . $fileName;

        if (file_exists($viewPath)) {
            // Extrae los datos y hace que estén disponibles en la vista
            extract($data);

            // Incluye la vista
            include $viewPath;
        } else {
            // Si no existe, muestra un mensaje de error o manejo de errores adecuado
            echo "Error: El archivo de vista no se encuentra en la ubicación esperada.";
        }
    }

    // Otro código...
}
