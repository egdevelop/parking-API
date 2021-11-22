<?php
include 'koneksi.php';

$hapus =  mysqli_query($konek,"UPDATE data SET status_alat = 0  status_apk = 0 tanggal = 0000-00-00 jam_masuk = 00:00:00");
if($hapus){
    $arr = array();
        $arr['info'] = 'Success';
        $arr['msg'] = 'Data Tereset';
        echo json_encode($arr);
}else{
    $arr = array();
        $arr['info'] = 'gagal';
        $arr['msg'] = 'data tidak tereset';
        echo json_encode($arr);
}

?>