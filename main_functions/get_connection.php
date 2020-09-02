<?php
    function get_connection($user, $pass, $db){
        // echo '<p>get_connection()</p>';
        $servername = "localhost";
        $username = $user;
        $password = $pass;
        $dbname = $db;
        $port = 3306;

        // Create connection
//        $conn = new mysqli($servername, $username, $password, $dbname, $port);
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            return -1;
        } else {
            $conn->query('SET NAMES utf8');
            return $conn;
        }
    };
?>