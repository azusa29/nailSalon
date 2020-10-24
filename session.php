<?php
session_start();
//合言葉を変える
session_regenerate_id(true);
//sessionに記録がなければ
if(isset($_SESSION['login'])==false){
	echo 'ログインされていません。<br>';
	echo '<a href="../staff_login/staff_login.php">ログイン画面へ</a>';
	exit();
}else{
	echo $_SESSION['staff_name'];
	echo 'さんログイン中<br>';
	echo '<br>';
}
?>
