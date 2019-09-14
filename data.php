<?php
include "config.php"; 
include "docxtemplate.class.php";
$da = "192.34343/2019/pa_tbn";
$data = array($da, "BMW", "Toyota");
// data
$raw = $_GET['id'];
$sql = "SELECT a.perkara_id, 
a.nomor_urut_register a1,
a.nomor_perkara_banding a2,
DATE_FORMAT(a.penerimaan_kembali_berkas_banding,'%d/%m/%Y') a3,
a.pemohon_banding a4,
bt.pihak_nama a5,
(SELECT VALUE FROM sys_config WHERE id = 62) a6,
DATE_FORMAT(a.putusan_pn,'%d/%m/%Y') a7, a.nomor_perkara_pn b7, vp.amar_putusan c7,
vp.majelis_hakim_text a8, vp.panitera_pengganti_text b8,
DATE_FORMAT(a.permohonan_banding,'%d/%m/%Y') a9,
DATE_FORMAT(a.tanggal_penetapan_sidang_pertama,'%d/%m/%Y') a10,a.hakim1_banding b10, a.hakim2_banding c10, a.hakim3_banding d10,
a.panitera_pengganti_banding e10,
DATE_FORMAT(a.putusan_banding,'%d/%m/%Y') a11,a.amar_putusan_banding b11,
DATE_FORMAT(a.tgl_pengiriman_berkas_putusan,'%d/%m/%Y') a12,
a.tgl_pemberitahuan_putusan a13
FROM perkara_banding a
LEFT JOIN (SELECT * FROM perkara_banding_detil WHERE status_pihak_id=4) bt
ON a.perkara_id = bt.perkara_id
LEFT JOIN (SELECT * FROM v_perkara) vp
ON a.perkara_id=vp.perkara_id
where regex_replace('[^a-zA-Z0-9\-]','',a.nomor_perkara_pn) = '$raw'
GROUP BY a.perkara_id";
$query = mysqli_query($db, $sql);
$data = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
	die("data tidak ditemukan...");
}
// end data
function utf8ize($d) {
    if (is_array($d)) {
        foreach ($d as $k => $v) {
            $d[$k] = utf8ize($v);
        }
    } else if (is_string ($d)) {
        return utf8_encode($d);
    }
    return $d;
}

$replace = Array("<\hr>","<ol >","</br>","&#39;","<ul>","</ul>","</em>","<em>","<li >","</li>","<br>","<p >","<p>","<strong>","</strong>","<ol>","</ol>","<li>","<li/>","</p>","<b>", "<\b>", "<sup>", "<\sup>");
// $replace = Array("#\<(.*?)\>#");
$a4 = utf8ize(str_replace($replace,'',$data['a4']));
// $datac7 = utf8ize($data['c7']);
$c7 = utf8ize(str_replace($replace,'',$data['c7']));
$a8 = utf8ize(str_replace($replace,'',$data['a8']));
$b11 = utf8ize(str_replace($replace,'',$data['b11']));
// $c7 = trim(preg_replace('/\s+/ ','',$data['c7']));
// echo $a4;
// echo "<br>";
echo $c7;
die();

$dok = new DOCXTemplate('template.docx');
$dok->set('a1',$data['a1']);
$dok->set('a2',$data['a2']);
$dok->set('a3',$data['a3']);
$dok->set('a4',$a4);
$dok->set('a5',$data['a5']);
$dok->set('a6',$data['a6']);
$dok->set('a7',$data['a7']);
$dok->set('b7',$data['b7']);
$dok->set('c7',$c7);
$dok->set('a8',$a8);
$dok->set('a9',$data['a9']);
$dok->set('a10',$data['a10']);
$dok->set('b10',$data['b10']);
$dok->set('c10',$data['c10']);
$dok->set('d10',$data['d10']);
$dok->set('a11',$data['a11']);
$dok->set('b11',$b11);
$dok->set('a12',$data['a12']);
$dok->set('a13',$data['a13']);
// $dok->set('alamat','Tuban');
$nama = preg_replace('/\D/', '',$data['a2']);

$dok->saveAs('coba_templating.docx');


header("Content-Type:application/msword");
header("Content-Disposition:attachment;filename=".$nama.".docx");
readfile('coba_templating.docx');
?>