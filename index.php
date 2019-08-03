<?php
include "docxtemplate.class.php";

$dok = new DOCXTemplate('template.docx');
$dok->set('nama','sopopopooopopo/jhgjgjtgfghfhftdsd,.ghffgd323424');
$dok->set('alamat','Tuban');

$dok->saveAs('coba_templating.docx');

header("Content-Type:application/msword");
header("Content-Disposition:attachment;filename=coba_templating.docx");
readfile('coba_templating.docx');
?>