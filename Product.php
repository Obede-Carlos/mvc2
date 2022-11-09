<?php 
    //Fichero que simula el modelo de datos.
    class Product{
        const PRODUCTS = [
            array(1, 'Contracesped'),
            array(2, 'Pizarra'),
            array(3, 'Billar'),
            array(4, 'Dados'),
        ];

        function __construct()
        {
            //constructor vacio.
        }

        //devuelve todos los productos.
        public static function all()
        {
            return Product::PRODUCTS;
        }

        //devolver un producto en particular.
        public static function find($id)
        {
            return Product::PRODUCTS[$id-1];
        }
    }