<?php require '../session.php'; ?>
<?php require '../header.php'; ?>
<?php
equire_once('../common/common.php');
	//$postは安全対策された＄_POST
	$post = sanitize($_POST);
	$staff_name = $post['name'];
	$staff_pass = $post['pass'];
	$sraff_pass2 = $post['pass2'];
	// var_dump($staff_name, $staff_pass, $sraff_pass2);
	//$staff_name = htmlspecialchars($staff_name, ENT_QUOTES, 'UTF-8');
	//$staff_pass = htmlspecialchars($staff_pass, ENT_QUOTES, 'UTF-8');
	//$staff_pass2 = htmlspecialchars($staff_pass2, ENT_QUOTES, 'UTF-8');

if($staff_name == ''){
	echo 'スタッフ名が入力されていません。<br>';
} else {
	echo 'スタッフ名：';
	echo $staff_name;
	echo '<br>';
}

if($staff_pass ==''){
	print 'パスワードが入力されていません。<br>';
} 

if($staff_pass != $staff_pass){
	echo 'パスワードが一致しません。';
}

if($staff_name == ''|| $staff_pass == '' || $staff_pass == $staff_pass2){
	echo '<form>';
	echo '<input type="button" onclick="history.back()" value="戻る">';
	echo '</form>';
} else {
	//passを暗号化する
	$staff_pass = md5($staff_pass);
	echo '<form action="staff_add_done.php" method="post">';
	echo '<input type="hidden" name="name" value="'.$staff_name.'">';
	echo '<input type="hidden" name="pass" value="'.$staff_pass.'">';
	echo '<br>';
	echo '<input type="button" onclick="history.back()" value="戻る">';
	echo '<input type="submit" value="OK">';
	echo '</form>';
}


?>
<?php require '../footer.php';?> 