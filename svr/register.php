<?php

include 'db.php';

$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$biz_name = $_POST['biz_name'];
$descr = $_POST['descr'];
$url = $_POST['website'];

$conn = db_connect();

$sql = "SELECT id FROM users WHERE email = '$email' OR phone = '$phone'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    die("ERROR: user already exists");
} else {
    $sql = "INSERT INTO users (email, phone, pass) VALUES ('$email', '$phone', '$password')";
    $result = $conn->query($sql);
    $user_id = $conn->insert_id;

    if ($result === TRUE) {
        // it worked
        $sql = "INSERT INTO biz (user_id, name, descr, url) VALUES ($user_id, '$biz_name', '$descr', '$url')";
        $result = $conn->query($sql);

        if ($result === TRUE) {
            // it worked
        } else {
            // it failed
            die("ERROR: failed to create biz - $conn->error");
        }
    } else {
        // it failed
        die("ERROR: failed to create user - $conn->error");
    }
}

$conn->close();

echo "100";