<?php 

namespace App\Controllers;

class ProductController{

    function __construct()
    {
        echo "<br>Constructor clase PRODUCTCONTROLLER";
    }//fin_constructor

    function index()
    {   //metodo home de Controller de mvc00
        $products = \Product::all();
        require "../views/home_product.php";
       
    }//fin_miindex

    function show()
    {   //metodo show de Controller de mvc00
        $id = $_GET["id"];
        $product = \Product::find($id);
        require "../views/show_product.php";
    }
}//fin clase