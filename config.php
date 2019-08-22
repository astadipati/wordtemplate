<?php

$server = "localhost";
$user = "root";
$password = "Kul0nuwun";
// $nama_database = "phpbiasa";
$nama_database = "sippsaja";

$db = mysqli_connect($server, $user, $password, $nama_database);

if( !$db ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

?>
