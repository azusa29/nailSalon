<?php require '../session.php'; ?>
<?php require '../header.php'; ?>
<?php
// データベースサーバーの障害対策。エラートラップ。
try{
	// input type="hidden"から受け取った値
	$staff_code=$_POST['code'];

	// データベース接続
	require '../connectDB.php';
	//staffテーブルの更新
	$sql='DELETE FROM staff WHERE code=?';
	$stmt=$dbh -> prepare($sql);
	$data[]=$staff_code;
	$stmt -> execute($data);
	// データベースから切断
	$dbh=null;

}catch(Exception $e){
	// データベースサーバーに障害がある場合表示される。
	echo 'ただいま障害により大変ご迷惑をおかけしております。';
	// 強制終了
	exit();
}

?>

削除しました。<br><br>
<!-- スタッフ一覧画面へ戻るリンク -->
<a href="staff_list.php">戻る</a>

<?php require '../footer.php';?> 