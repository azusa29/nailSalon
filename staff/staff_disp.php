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

スタッフ情報参照<br><br>
スタッフコード<br>
<?php echo $staff_code; ?>
<br>
スタッフ名<br>
<?php echo $staff_name; ?>
<br><br>

<form>
	<input type="button" onclick="history.back()" value="戻る">
</form>

<?php require '../footer.php';?> 
