<?php
include "config.php"; 
include "docxtemplate.class.php";
$da = "192.34343/2019/pa_tbn";
$data = array($da, "BMW", "Toyota");
// data
$id = $_GET['id'];
$sql = "SELECT * FROM perkara_banding WHERE perkara_id=$id";
$query = mysqli_query($db, $sql);
$siswa = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
	die("data tidak ditemukan...");
}
// end data


$dok = new DOCXTemplate('template.docx');
$dok->set('nama',$siswa['perkara_id']);
$dok->set('alamat',$siswa['nomor_perkara_pn']);
// $dok->set('alamat','Tuban');
$nama = preg_replace('/\D/', '',$siswa['nomor_perkara_pn']);

$dok->saveAs('coba_templating.docx');


header("Content-Type:application/msword");
header("Content-Disposition:attachment;filename=".$nama.".docx");
readfile('coba_templating.docx');
?>