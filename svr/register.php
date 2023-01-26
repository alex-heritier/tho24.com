<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/svr/lib/db.php';
include_once 'lib/upload.php';
include_once 'lib/account.php';

$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$biz_name = $_POST['biz_name'];
$descr = $_POST['descr'];
$trade = $_POST['trade'];
$url = $_POST['website'];

$file_result = complete_file_upload($_FILES['image']);
if ($file_result === null) {
    die("ERROR: failed to upload image");
}

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
        $sql = "INSERT INTO biz (user_id, name, descr, trade, url, main_img) VALUES ($user_id, '$biz_name', '$descr', '$trade', '$url', '$file_result')";
        $result = $conn->query($sql);

        if ($result === TRUE) {
            // it worked
            $sql = "INSERT INTO pics (ref_id, ref_type, path) VALUES ($user_id, 'user', '$file_result')";
            $result = $conn->query($sql);
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

$result = login($email, $password);

$token = $result[1];
$email = $result[0]["email"];

echo <<<EOD

<script>
    let data = JSON.stringify({
        token: '$token',
        email: '$email',
    });
    
    document.cookie = "session_data="+data+"; expires=Thu, 18 Dec 2023 12:00:00 UTC; path=/";
    window.location.replace("/");
</script>

EOD;