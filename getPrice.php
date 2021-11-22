<?php
include 'koneksi.php';
$query = mysqli_query($konek,"SELECT * FROM data WHERE id = '$_GET[id]'");
$r = mysqli_fetch_array($query);
$tanggal = new DateTime($r['jam_masuk']); 

$sekarang = new DateTime();
$perbedaan = $tanggal->diff($sekarang);

$harga = ceil($perbedaan->h) * 3000;

if($harga > 12000){
    $harga = 12000;
}

$arr = array();
$data = array(
    'tanggal_masuk' => $r['tanggal'],
    'tanggal_keluar' => date("Y-m-d"),
    'jam_masuk' => $r['jam_masuk'],
    'jam_keluar' => $jam,
    'harga' => $harga,
);
array_push($arr, $data);
echo json_encode($arr);


?>