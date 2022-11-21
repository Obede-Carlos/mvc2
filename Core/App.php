<?php 

namespace Core;

/*
    - Si no la url no especifica ningun controlador (recurso) => asigno
    uno por defecto => home
    - Si no la url no especifica ningun metodo => asigno por defecto : index
*/
class App{
    function __construct()
    {
        if (isset($_GET["url"]) && !empty($_GET["url"])) {
            $url = $_GET["url"];
        }else {
            $url = "home";
        }
        // /product/show -> product:  recurso : show : accion
        $arguments = explode('/', trim($url,'/')); //explode trocea la url partiendo desde el caracter '/', trim borra los caracteres '/'
        $controllerName = array_shift($arguments); //product
        $controllerName = ucwords($controllerName) . "Controller";
        if (count($arguments)) {
            $method = array_shift($arguments);
        } else {
            $method = "index";
        }

        //voy a cargar el controlador. ProductController.php
        $file = "app/controllers/$controllerName" . ".php";
        if (file_exists($file)) {
            require_once $file; // importo el fichero si existe
        } else {// si no existe devuelve un error 404 no encontrado.
            http_response_code(404);
            die("No encontrado");
        }

        //existe metodo en el controlador ?
        $controllerName = "\\App\\Controllers\\$controllerName";
        $controllerObjet = new $controllerName; //objeto de la clase 
        if (method_exists($controllerObjet,$method)) {
            $controllerObjet->$method($arguments); //method ok -> lo invoco.
        } else {
            http_response_code(404);
            die("No encontrado");
        }


    }//fin_constructor

}//fin_app