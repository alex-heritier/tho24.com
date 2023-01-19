<?php

include_once 'lib/db.php';

$id = $_GET['id'] ?? null;

$conn = db_connect();

$sql = "SELECT id, name, descr, url, main_img, email, phone FROM biz WHERE id = $id";
$result = $conn->query($sql);

$conn->close();

$data = null;
if ($result->num_rows > 0) {
    // found results
    $data = $result->fetch_assoc();
} else {
    // no results
}

// $data = [
//         'name' => 'Schoolbird',
//         'descr' => 'Tutoring Services',
//         'url' => 'www.schoolbird.co',
//         'main_image' => 'http://localhost:8000/img/powjpow-82ee53be.jpeg',
//         'email' => null,
//         'phone' => null,
// ];

echo json_encode($data);