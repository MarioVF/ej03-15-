<?php
    define('HOST', 'localhost');
    define('USER', 'world');
    define('PASS', 'world');
    define('DB', 'world');

    function getContinentes() {
        $continentes = [];

        try {
            $conn = new mysqli(HOST, USER, PASS, DB);

            // Se obtiene la lista de todos los continentes almacenados
            $query = "SELECT DISTINCT Continent FROM `country`";

            $result = $conn->query($query);

            if ($result && $result->num_rows > 0) {
                $continentes = $result->fetch_all(MYSQLI_ASSOC);
            }

            $conn->close();
            return $continentes;
        } catch (Exception $e) {
            die("Conexión fallida: " . $e->getMessage());
        }
    }

    function getPaises($continente) {
        $paises = [];

        try {
            $conn = new mysqli(HOST, USER, PASS, DB);

            if($continente === 'Todos') {
                // Se obtiene la lista de todos los paises almacenados
                $query = "SELECT * FROM `country`";
            }
            else {
                // Se obtiene la lista de todos los paises almacenados de un continente
                $query = "SELECT * FROM `country` WHERE Continent = '$continente'";
            }

            $result = $conn->query($query);

            if ($result && $result->num_rows > 0) {
                $paises = $result->fetch_all(MYSQLI_ASSOC);
            }

            $conn->close();
            return $paises;
        } catch (Exception $e) {
            die("Conexión fallida: " . $e->getMessage());
        }
    }
?>