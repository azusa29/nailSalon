<?php
session_start();
// sessionを空にする
$_SESSION=array();
if(isset($_COOKIE[session_name()])==true)
{
	// PC側からのsession IDをクッキーから削除する
	setcookie(session_name(),'',time()-42000,'/');
}
// sessionを空にする切断する
session_destroy();
?>

<?php require '../header.php'; ?>
ログアウトしました。<br>
<br>
<a href="../staff_login/staff_login.php">ログイン画面へ</a>
<?php require '../footer.php';?> 
