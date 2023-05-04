<?php

$host = "localhost";
$username = "root";
$bdname = "projet3";
$password = "";

$mysqli = new mysqli(hostname: $host, 
                    username: $username, 
                    password: $password,
                    database: $bdname);
if ($mysqli->connect_errno){
    die("Erreur de connection: " . $mysqli->connect_error);
}
return $mysqli;
