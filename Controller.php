<?php
    require_once "Product.php";

    class Controller{

        function __construct()
        {
            //const vacio;
        }

        /* funcion que:
            -recoge todos los productos
            -llama a vista de inventario
        */
        public function home()
        {
            $products = Product::all();
            require "views/home.php";
        }

        /* funcion que:
            -recuperar un producto en particular, el id como parametro
            -llamar vista de un producto en concero.
        
        */
        public function show()
        {
            $id = $_GET["id"];
            $product = Product::find($id); //vendra de start.php
            require "views/show.php";
        }

    }