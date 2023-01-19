<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/svr/lib/db.php';

function login($login, $password) {
    $conn = db_connect();

    $sql = "SELECT id, email FROM users WHERE (email = '$login' OR phone = '$login') AND pass = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // login success
        $user = $result->fetch_assoc();
        $user_id = $user["id"];
        $email = $user["email"];
        $token = bin2hex(random_bytes(32));
        $exp_dt = Date('y:m:d', strtotime('+90 days'));

        $sql = "INSERT INTO tokens (user_id, token, exp_dt) VALUES ($user_id, '$token', '$exp_dt')";
        $result = $conn->query($sql);

        if ($result === TRUE) {
            // it worked
        } else {
            // it failed
            die("ERROR: failed to create token - $conn->error");
        }
    } else {
        // login fail
        die("ERROR: incorrect login info");
    }

    $conn->close();

    return [$user, $token];
}