<?php
$host = "localhost";
$username = "bry";
$password = "okpok123";
$db = "parking";
date_default_timezone_set("Asia/Jakarta");
$tanggal = date("Y-m-d");
date_default_timezone_set("Asia/Jakarta");
$jam = date("H:i:s");
$konek = mysqli_connect($host, $username, $password, $db);
