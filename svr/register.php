<?php


include_once $_SERVER['DOCUMENT_ROOT'] . 'wizbull/svr/lib/db.php';
include_once 'lib/upload.php';
include_once 'lib/account.php';

$conn = db_connect();

$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$biz_name = $conn->real_escape_string($_POST['biz_name']);
$descr = $conn->real_escape_string($_POST['descr']);
$trade = $_POST['trade'];
$url = $_POST['website'];
$district = $_POST['district'];
$ward = $_POST['ward'];

$file_result = complete_file_upload($_FILES['image']);
if ($file_result === null) {
    die("ERROR: failed to upload image");
}


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
            $biz_id = $conn->insert_id;
            $sql = "INSERT INTO pics (ref_id, ref_type, path) VALUES ($user_id, 'user', '$file_result')";
            $result = $conn->query($sql);

            if ($result === TRUE) {                
                // it worked

                $sql = "SELECT id, code FROM basic_address WHERE code = '$district' OR code = '$ward'";
                $result = $conn->query($sql);

                $district_id = NULL;
                $ward_id = NULL;
                while ($r = $result->fetch_assoc()) {
                    if ($r["code"] == $district) {
                        $district_id = $r["id"];
                    } else if ($r["code"] == $ward) {
                        $ward_id = $r["id"];
                    }
                }

                if ($district_id === NULL || $ward_id === NULL) {
                    die("ERROR: invalid addresses codes provided");
                }

                $sql = "INSERT INTO basic_address_link (basic_address_id, ref_type, ref_id) VALUES ($district_id, 'biz', $biz_id), ($ward_id, 'biz', $biz_id)";
                $result = $conn->query($sql);

                if ($result === TRUE) {
                } else {
                    // it failed
                    die("ERROR: failed to link addresses - $conn->error");
                }
            } else {
                // it failed
                die("ERROR: failed to create pics - $conn->error");
            }
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