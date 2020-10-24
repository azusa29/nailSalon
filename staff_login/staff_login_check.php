<?php require '../session.php'; ?>

<?php require '../header.php'; ?>

<?php

try{
	require_once('../common/common.php');
	$post = sanitize($_POST);

	$staff_code=$post['code'];
	$staff_pass=$post['pass'];
	// 安全対策
	//$staff_code = htmlspecialchars($staff_code, ENT_QUOTES,'UTF-8');
	//$staff_pass = htmlspecialchars($staff_pass, ENT_QUOTES,'UTF-8');

	$staff_pass = md5($staff_pass);
	//データベース接続
	require '../connectDB.php';
	var_dump($staff_pass);
	$sql = 'SELECT name FROM staff WHERE code=? AND password = ?';
	$stmt = $dbh -> prepare($sql);
	$data[]=$staff_code;
	$data[]=$staff_pass;
	$stmt->execute($data);
	//データベース切断　
	$dbh = null;

	$rec = $stmt -> fetch(PDO::FETCH_ASSOC);

	if($rec==false){
		echo 'スタッフコードかパスワードが間違っています。<br>';
		echo '<a href="staff_login.php">戻る</a>';
	}else{
		session_start();
		//ログインOKの証拠を残す
		$_SESSION['login']=1;
		$_SESSION['staff_code']=$staff_code;
		$_SESSION['staff_name']=$rec['name'];
		header('Location:staff_top.php');
		exit();
	}

}catch(Exception $e){
	echo 'ただいま障害により大変ご迷惑をおかけしております。';
	exit();
}


?>
<?php require '../footer.php';?> 
