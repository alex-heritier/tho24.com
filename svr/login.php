<?php

include_once 'lib/account.php';

$login = $_POST['login'];
$password = $_POST['password'];

$result = login($login, $password);

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