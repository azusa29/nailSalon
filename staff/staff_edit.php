<?php require '../session.php'; ?>
<?php require '../header.php'; ?>
<?php

try{
	$staff_code = $_GET['staffcode'];
	//データベース接続
	require '../connectDB.php';

	$sql = 'SELECT name FROM staff WHERE code=?';
	$stmt = $dbh -> prepare($sql);
	//staff_listから受け取った$staff_codeを配列に代入しそれに合った名前をDBから取り出す。
	$data[] = $staff_code;
	$stmt -> execute($data);

	$rec = $stmt ->fetch(PDO::FETCH_ASSOC);
	// スタッフ名を変数にコピー。
	$staff_name = $rec['name'];

	$dbh = null;

}catch(Exeption $e){
	echo 'ただいま障害により大変ご迷惑をおかけしております。';
		exit();
}


?>

スタッフ修正<br><br>

スタッフコード<br>
<?php echo $staff_code; ?>
<br><br>

<form action="staff_edit_check.php" method="post" >
	<input type="hidden" name="code" value="<?php echo $staff_code; ?>">
	スタッフ名<br>
	<!-- 名前を入力済みにする。 -->
	<input type="text" name="name" style="width: 200px" value="<?php echo $staff_name ?>"><br>
	パスワードを入力してください。<br>
	<input type="password" name="pass" style="width: 100px"><br>
	パスワードをもう１度入力してください。<br>
	<input type="password" name="pass2" style="width: 100px"><br><br>
	<input type="button" onclick="history.back()" value="戻る">
	<input type="submit" value="OK">
</form>

<?php require '../footer.php';?> 
