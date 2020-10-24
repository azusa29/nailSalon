<?php require '../session.php'; ?>
<?php require '../header.php'; ?>

<?php
try{
	//データベース接続
	require '../connectDB.php';

	//データベースからスタッフの名前を全て取得する
	$sql = 'SELECT code,name FROM staff';
	$stmt = $dbh -> prepare($sql);
	$stmt -> execute();

	//データベース切断
	$dbh = null;

	echo 'スタッフ一覧<br><br>';
	//分岐ページへ飛ばす。
	echo '<form method="post" action="staff_branch.php">';
	while(true){
		//$stmt から１レコードずつ取り出す。
		$rec = $stmt -> fetch(PDO::FETCH_ASSOC);
		//もしデータがなければループから出る(データがなくなった時も)
		if($rec == false){
			break;
		}
		//名前を表示(ラジオボタンでどのスタッフを選んだか伝えられるように)
		echo '<input type="radio" name="staffcode" value="'.$rec['code'].'">';
		echo $rec['name'];
		echo '<br>';
	}
	echo '<input type="submit" name="disp" value="参照">';
	echo '<input type="submit" name="add" value="追加">';
	echo '<input type="submit" name="edit" value="修正">';
	echo '<input type="submit" name="delete" value="削除">';
	echo '</form>';
}catch(Exeption $e){
		echo 'ただいま障害により大変ご迷惑をおかけしております。';
		exit();
}

?>
<br>
<a href="../staff_login/staff_top.php">トップメニューへ</a><br>

<?php require '../footer.php';?> 