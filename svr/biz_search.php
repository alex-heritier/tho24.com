<?php

include_once 'lib/db.php';

$query = $_GET['query'] ?? null;

$conn = db_connect();

$sql = "SELECT id, name, descr, trade, url, main_img, email, phone FROM biz";
if (strlen($query ?? '') > 0) {
    $sql = $sql . " WHERE LOWER(name) LIKE '$query%' OR LOWER(email) LIKE '$query%' OR LOWER(trade) LIKE '$query%'";
}
$result = $conn->query($sql);

$data = [];
if ($result->num_rows > 0) {
    // found results
    while ($r = $result->fetch_assoc()) {
        array_push($data , $r);
    }
} else {
    // no results
}

$conn->close();

// $data = [
//     [
//         'name' => 'Schoolbird',
//         'descr' => 'Tutoring Services',
//         'url' => 'www.schoolbird.co',
//         'main_image' => 'http://localhost:8000/img/powjpow-82ee53be.jpeg',
//         'email' => null,
//         'phone' => null,
//     ],
//     [
//         'name' => 'Pho 24',
//         'descr' => 'Best pho ever',
//         'url' => 'www.pho24.vn',
//         'main_image' => 'https://www.pho24.com.vn/wp-content/uploads/2018/10/Sala-1-2.jpg',
//         'email' => null,
//         'phone' => null,
//     ],
// ];

echo json_encode($data);