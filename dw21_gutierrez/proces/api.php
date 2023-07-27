<?php
include("../proces/conex.php");
include("../proces/notes.libs.php");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: http://127.0.0.1:5500");
header("Access-Control-Allow-Headers: Content-Type, X-Custom-Header");

if (isset($_GET['mod']) && $_GET['mod'] == "notas" && isset($_GET['action']) && $_GET['action'] == "guardar" && isset($_POST)) {
    $dato = json_decode(file_get_contents('php://input'), true);
        if ($dato['titulo'] && $dato['contenido'] && $dato['gru_id']) {
            agregarnota($dato, $conn);  
            $id = $conn->insert_id;
            
            $datos = traernota($id, $conn);
            $response = $datos->fetch_all(MYSQLI_ASSOC);
            print_r(json_encode($response));
            return;
        }
}                                  
if (isset($_GET['mod']) && $_GET['mod'] == "notas") {
    $datos = traernotas($conn);
    $res = $datos->fetch_all(MYSQLI_ASSOC);
    print_r(json_encode($res));
}       
?>