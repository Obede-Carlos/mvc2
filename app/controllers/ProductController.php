<?php 

namespace App\Controllers;

use \App\Models\Product;
use Dompdf\Dompdf;

class ProductController{

    function __construct()
    {
        echo "<br>Constructor clase PRODUCTCONTROLLER";
    }//fin_constructor

    public function pdf()
    {
        $dompdf = new Dompdf();
        $dompdf->loadHtml('<h1>Hola mundo</h1>');
        $dompdf->render();
        header("Content-type: application/pdf");
        header("Content-Disposition: inline; filename=documento.pdf");
        echo $dompdf->output();
    }

    function index()
    {
        $products = Product::all();
        require "../views/home_product.php";
       
    }//fin_miindex

    function show()
    {
        $id = $_GET["id"];
        $product = Product::find($id);
        require "../views/show_product.php";
    }//fin_mishow

}//fin clase