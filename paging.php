<?php 
include("config.php");
// include "config.php"; 
$halaman = 10; //batasan halaman
$page = isset($_GET['halaman'])? (int)$_GET["halaman"]:1;
$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
$query = mysql_query("select * from perkara_banding LIMIT $mulai, $halaman");
$sql = mysql_query("select * from perkara_banding")or die(mysql_error());;
$total = mysql_num_rows($sql);
$pages = ceil($total/$halaman); 
for ($i=1; $i<=$pages ; $i++){ ?>
 <a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>

 <?php } 

?>