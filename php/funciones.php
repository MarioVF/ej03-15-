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

    function getSuperficiePaises($continente, $numero) {
        $paises = [];

        try {
            $conn = new mysqli(HOST, USER, PASS, DB);
                
            // Se obtiene la lista de todos los paises almacenados de un continente
            $query = "SELECT Name, SurfaceArea FROM `country` WHERE Continent = '$continente' ORDER BY SurfaceArea LIMIT $numero";

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

    function getPoblaciónPaises($continente, $numero) {
        $paises = [];

        try {
            $conn = new mysqli(HOST, USER, PASS, DB);
                
            // Se obtiene la lista de todos los paises almacenados de un continente
            $query = "SELECT Name, Population FROM `country` WHERE Continent = '$continente' ORDER BY Population LIMIT $numero";

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

    function getPoblaciónCiudades($pais, $numero) {
        $ciudades = [];

        try {
            $conn = new mysqli(HOST, USER, PASS, DB);
                
            // Se obtiene el codigo del país a buscar
            $query = "SELECT Code FROM `country` WHERE Name = '$pais'";

            $result = $conn->query($query);

            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();

                // Almacenamos el codigo del pais en una variable
                $codigoPais = $row['Code'];

                // Con la variable del código del país obtenemos las ciudades del propio país
                $queryCiudades =  "SELECT Name, Population FROM `city` WHERE CountryCode = '$codigoPais' ORDER BY Population LIMIT $numero";

                $resultCiudades = $conn->query($queryCiudades);

                if ($resultCiudades && $resultCiudades->num_rows > 0) {
                    $ciudades = $resultCiudades->fetch_all(MYSQLI_ASSOC);
                }
            }

            $conn->close();
            return $ciudades;
        } catch (Exception $e) {
            die("Conexión fallida: " . $e->getMessage());
        }
    }

    function mostrarTabla($datos) {
        // Si el array no viene vacío lo recorremos
        if(!empty($datos)) {
            $columnas = array_keys($datos[0]);

            echo '<table border="1">';
            
            // Creamos los encabezados
            echo '<tr>';
            foreach ($columnas as $columna) {
                echo '<th>' . $columna . '</th>';
            }
            echo '</tr>';
        
            // Creamos las filas de la tabla
            foreach ($datos as $fila) {
                echo '<tr>';
                foreach ($fila as $valor) {
                    echo '<td>' . $valor . '</td>';
                }
                echo '</tr>';
            }
        
            echo '</table>';
        }
    }

    function getUser($nombre) {
        $user = [];

        try {
            $conn = new mysqli(HOST, USER, PASS, DB);

            // Se obtiene el usuario con el nombre indicado
            $query = "SELECT * FROM usuarios WHERE nombre = '$nombre'";

            $result = $conn->query($query);

            if ($result && $result->num_rows > 0) {
                $user = $result->fetch_row(MYSQLI_ASSOC);
            }

            $conn->close();
            return $user;
        } catch (Exception $e) {
            die("Conexión fallida: " . $e->getMessage());
        }
    }
?>