<?php
include 'koneksi.php';

$query = mysqli_query($konek,"SELECT * FROM data");


$arr = array();
while($r = mysqli_fetch_assoc($query)){
    $data = array(
        'id' => $r['id'],
        'status_alat' => $r['status_alat'],
        'status_apk' => $r['status_apk'],
        'tanggal' => $r['tanggal'],
        'jam_masuk' => $r['jam_masuk'],
    );
    array_push($arr, $data);
}

echo json_encode($arr);

?>