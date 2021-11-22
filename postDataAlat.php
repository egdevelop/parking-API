<?php
include 'koneksi.php';
$id = isset($_POST['id']) ? $_POST['id'] : '';
$status = isset($_POST['status']) ? $_POST['status'] : '';


if (empty($id)) {
    $arr = array();
    $arr['info'] = 'error';
    $arr['msg'] = 'id tidak ada';

    echo json_encode($arr);
    exit();
}

$data = mysqli_query($konek,"SELECT * FROM data WHERE id = '$id'");
$cek_id = mysqli_num_rows($data);
if($cek_id > 0){
    $update = mysqli_query($konek,"UPDATE data SET status_alat = '$status', tanggal = '$tanggal', jam_masuk = '$jam' WHERE id = '$id'");
    if($update){
        $arr = array();
        $arr['info'] = 'Success';
        $arr['msg'] = 'Data Terupdate';
        echo json_encode($arr);
    }else{
        $arr = array();
        $arr['info'] = 'Error';
        $arr['msg'] = 'Update gagal';
        echo json_encode($arr);
    }
}else{
    $create = mysqli_query($konek,"INSERT INTO data (status_alat,tanggal,jam_masuk)VALUES('$status','$tanggal','$jam')");
    if($create){
        $arr = array();
        $arr['info'] = 'Success';
        $arr['msg'] = 'Data Terupdate';
        echo json_encode($arr);
    }
}
?>