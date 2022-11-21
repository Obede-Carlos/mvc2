<?php

    class Login{
        protected $nombreusu = null; //se debe llamr igual que la columna.
        protected $password = null;

        /**
         * 1- preparar la consulta -> prepare
         * 2- establecer el nodo de recurperacion: fetch_class, fetch_assoc
         * 3- ejecutar la consulta -> execute.
         * 4- Recuperar los registros: fetch (un registro) / fetchAll {devuelve todos los registros}
         */

        public static function all(){
            $dsn = "mysql:host=db;dbname=demo";
            $usuario = "dbuser";
            $password = "secret";

            try {
                $db = new PDO($dsn, $usuario, $password);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "SELECT * FROM credenciales";
                $sentencia = $db->prepare($sql);
                //establece la forma de recuperar registros.
                $sentencia->setFetchMode(PDO::FETCH_CLASS,"Login");
                $sentencia->execute();

                /*
                while ($obj = $sentencia->fetch()) {
                    echo "<br>NOMBRE: " . $obj->nombreusu; //obj es un objeto y se accede a el como tal.
                    echo "<br>APELLIDO: " . $obj->password; //devuelve un string.
                    echo "<br>";
                }//fin while.
                */

                $credenciales = $sentencia->fetchAll(PDO::FETCH_CLASS, "Login"); //fetch all devuelve un array de objetos y muestra todos los registros de una vez.
                foreach($credenciales as $credencial){
                    echo "<br>NOMBRE: " . $credencial->nombreusu;
                    echo "<br>APELLIDO: " . $credencial->password;
                    echo "<br>";
                }

            } catch (PDOException $e) {
                echo "Error producido al conectar: " . $e->getMessage();
            }

        }//fin all


    }//fin clase

    echo "<h2> Recuperando registros</h2>";
    Login::all();