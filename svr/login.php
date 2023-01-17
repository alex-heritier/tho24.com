<?php

include 'db.php';

$login = $_POST['login'];
$password = $_POST['password'];

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

// echo $token;

echo <<<EOD

<script>
    let data = JSON.stringify({
        token: '$token',
        email: '$email',
    });
    
    document.cookie = "session_data="+data+"; expires=Thu, 18 Dec 2023 12:00:00 UTC; path=/";
    window.location.replace("/?data=" + data);
</script>

EOD;