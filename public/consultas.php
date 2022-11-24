<?php

    $dsn = "mysql:dbname=demo;host=db";
    $usuario = "dbuser";
    $password = "secret";

    /**
     * 1- preaprar la consulta -> prepare
     * 2- vincular los datos -> bindParam /bindValue
     * 3- ejecutar la sentencia -> execute(); (query, exec)
     */

    try {
        $db = new PDO($dsn, $usuario, $password);
        //establece el nivel de error que muestra en la conexion
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //preparacion por nombre:
        $sentencia = $db->prepare("INSERT INTO credenciales (nombeusu, password) VALUES (:nombre, :clave)");

        //preparacion por posicion
        $sentencia = $db-> prepare("INSERT INTO credenciales (nombeusu, password) VALUES (?, ?");


        $nombre = "Alicia";
        $clave = "sombrero";
        $sentencia ->bindParam(1,$nombre);
        $sentencia ->bindParam(2, $clave);

        //$sentencia ->bindValue(":nombre", $nombre);
        //$sentencia ->bindValue(":clave", $clave);
        $nombre = "Pedro";
        $clave = "789";

        $sentencia->execute(); //ejecutar sentencia.

        echo "<h2> Exito </h2>";

    }catch (PDOException $e) {
        echo "Error producido al conectar: " . $e->getMessage();
    }