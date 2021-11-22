<?php
include 'koneksi.php';
$arrs = json_decode(file_get_contents("php://input"));

$username = isset($arrs->username) ? $arrs->username : '';
$pw = isset($arrs->pw) ? $arrs->pw : '';

if(empty($arrs)){
    echo "KOSONG PAK BOS";
}

if (empty($arrs->username)) {
    $arr = array();
    $arr['info'] = 'error';
    $arr['msg'] = 'Username tidak ada';

    echo json_encode($arr);
    exit();
}
if (empty($arrs->pw)) {
    $arr = array();
    $arr['info'] = 'error';
    $arr['msg'] = 'Password tidak ada';

    echo json_encode($arr);
    exit();
}

$query = mysqli_query($konek,"SELECT * FROM user WHERE username = '$username' AND pw = '$pw'");
if($query){
    $cek = mysqli_num_rows($query);
    if($cek > 0){
        $arr = array();
        $arr['info'] = 'success';
        $arr['msg'] = 'Selamat datang';
        echo json_encode($arr);
    }else{
        $arr = array();
        $arr['info'] = 'error';
        $arr['msg'] = 'Username Atau Password Salah';
        echo json_encode($arr);
    }
}else{
$arr = array();
$arr['info'] = 'error';
$arr['msg'] = 'Server Error';
echo json_encode($arr);
}


