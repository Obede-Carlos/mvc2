<?php
    //echo "<h2> Contenido PRIVADO</h2>";

    // recurso/accion/parametro
        //recurso: controladores
        //accion: metodos del controladores
        //parametros
    require "../Controller.php";
    $app = new Controller();
    
    // 1- recoger el metodo que pasan como parametro y si no 
    //especifican 
    if (isset($_GET["method"])) {
        $method = $_GET["method"];
    } else {
        $method = "home";
    }

    if (method_exists($app,$method)) {
        $app->$method();
    } else {
        http_response_code(404);
        die("Metodo no encontrado"); //exit;
    }