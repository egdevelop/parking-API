<?php
include 'koneksi.php';

$arrs = json_decode(file_get_contents("php://input"));
if(empty($arrs)){
    echo "KOSONG PAK BOS";
}

$username = isset($arrs->username) ? $arrs->username : '';
$pw = isset($arrs->pw) ? $arrs->pw : '';
$nama = isset($arrs->nama) ? $arrs->nama : '';
$phone = isset($arrs->phone) ? $arrs->phone : '';


if (empty($username)) {
    $arr = array();
    $arr['info'] = 'error';
    $arr['msg'] = 'Username tidak ada';

    echo json_encode($arr);
    exit();
}
if (empty($pw)) {
    $arr = array();
    $arr['info'] = 'error';
    $arr['msg'] = 'Password tidak ada';

    echo json_encode($arr);
    exit();
}
if (empty($nama)) {
    $arr = array();
    $arr['info'] = 'error';
    $arr['msg'] = 'nama tidak ada';

    echo json_encode($arr);
    exit();
}
if (empty($phone)) {
    $arr = array();
    $arr['info'] = 'error';
    $arr['msg'] = 'Phone tidak ada';

    echo json_encode($arr);
    exit();
}
$query = mysqli_query($konek,"INSERT INTO user (nama,phone,username,pw)VALUES('$nama','$phone','$username','$pw')");
if($query){
    $arr = array();
    $arr['info'] = 'success';
    $arr['msg'] = 'Silahkan Login';
    echo json_encode($arr);
}else{
    $arr = array();
    $arr['info'] = 'Error';
    $arr['msg'] = 'Server Error';
    echo json_encode($arr);
}

?>