<?php
// Configuración de headers para permitir CORS y respuesta JSON
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Solo permitir método POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode([
        'status' => 'error',
        'mensaje' => 'Método no permitido. Solo se acepta POST.'
    ]);
    exit;
}

try {
    // Obtenemos los datos JSON del cuerpo de la petición
    $json = file_get_contents('php://input');
    $datos = json_decode($json, true);
    
    if ($datos === null) {
        throw new Exception('Datos JSON inválidos');
    }
    
    
    // Se valida que existan los campos requeridos
    if (!isset($datos['usuario']) || !isset($datos['password'])) {
        echo json_encode([
            'status' => 'error',
            'mensaje' => 'Usuario y/o contraseña incorrectos'
        ]);
        exit;
    }
    
    // Obtenemos usuario y contraseña
    $usuario = trim($datos['usuario']);
    $password = trim($datos['password']);
    
    // Usuario de prueba
    $usuario_prueba = 'admin';
    $password_prueba = '123456';
    
    // Se verifican las credenciales contra el usuario de prueba
    if ($usuario === $usuario_prueba && $password === $password_prueba) {
        echo json_encode([
            'status' => 'success',
            'mensaje' => 'OK'
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'mensaje' => 'Usuario y/o contraseña incorrectos'
        ]);
    }
    
} catch (Exception $e) {
    // Manejo de errores generales
    echo json_encode([
        'status' => 'error',
        'mensaje' => 'Hubo un error en el login. Intentalo de nuevo más tarde.'
    ]);
}

?>