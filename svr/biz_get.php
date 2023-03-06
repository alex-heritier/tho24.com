<?php

include_once 'lib/db.php';

$id = $_GET['id'] ?? null;

$conn = db_connect();

/*

$sql = "SELECT b.id, b.name, b.descr, b.trade, b.url, b.main_img, b.email, b.phone, ba_d.code as district, ba_w.code as ward\n"

    . "FROM biz b, basic_address_link bal_d, basic_address_link bal_w, basic_address ba_d, basic_address ba_w\n"

    . "WHERE 	ba_d.type = \'district\' \n"

    . "	AND ba_d.id = bal_d.basic_address_id\n"

    . "    AND ba_w.type = \'ward\'\n"

    . "	AND ba_w.id = bal_w.basic_address_id\n"

    . "	AND bal_d.ref_type = \'biz\' \n"

    . "    AND bal_d.ref_id = b.id \n"

    . "    AND bal_w.ref_type = \'biz\' \n"

    . "    AND bal_w.ref_id = b.id \n"

    . "    AND b.id = 14;";

*/

$sql = "SELECT b.id, b.name, b.descr, b.trade, b.url, b.main_img, b.email, b.phone, ba_d.pretty_name as d_pretty, ba_d.code as d_code, ba_w.code as w_code, ba_w.pretty_name as w_pretty FROM biz b, basic_address_link bal_d, basic_address_link bal_w, basic_address ba_d, basic_address ba_w"
    . " WHERE 	ba_d.type ='district' \n"
    . "	AND ba_d.id = bal_d.basic_address_id\n"
    . " AND ba_w.type ='ward'\n"
    . "	AND ba_w.id = bal_w.basic_address_id\n"
    . "	AND bal_d.ref_type ='biz' \n"
    . " AND bal_d.ref_id = b.id \n"
    . " AND bal_w.ref_type ='biz' \n"
    . " AND bal_w.ref_id = b.id \n"
    . " AND b.id = $id";
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