<?php
    //database connection
    function getDB() {
        $db = NULL;

        try {
            // heroku url
            $dbUrl = getenv('DATABASE_URL');

            $dbBits = parse_url($dbUrl);

            $dbHost = $dbBits["host"];
            $dbPort = $dbBits["port"];
            $dbUser = $dbBits["user"];
            $dbPassword = $dbBits["pass"];
            $dbName = ltrim($dbBits["path"], '/');

            //create new pdo connection
            $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

            $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        } catch (PDOException $ex) {
            // print details for debugging
            echo "Error: $ex";
            die();
        }

        return $db;
    }


?>