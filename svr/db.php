<?php

function db_connect() {
    $ini_data = parse_ini_file('./config/db.ini', true);

    $servername = $ini_data["server_name"];
    $username = $ini_data["username"];
    $password = $ini_data["password"];
    $dbname = $ini_data["db_name"];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}