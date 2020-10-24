<?php require '../header.php'; ?>

<?php

require_once('../common/common.php');
$seireki = $_POST['seireki'];

$wareki = gengo($seireki);
echo $wareki;



?>

<?php require '../footer.php';?> 
