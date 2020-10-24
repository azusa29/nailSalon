<?php require '../header.php'; ?>
<?php require '../header.php'; ?>
<?php
// データベースサーバーの障害対策。エラートラップ。
try{
	// input type="hidden"から受け取った値
	//安全対策のメソッド
	require_once('../common/common.php');
	//$postは安全対策された＄_POST
	$post = sanitize($_POST);

	$staff_code=$post['code'];
	$staff_name=$post['name'];
	$staff_pass=$post['pass'];
	// 入力データに安全対策を施す。
	//$staff_name=htmlspecialchars($staff_name,ENT_QUOTES,'UTF-8');
	//$staff_pass=htmlspecialchars($staff_pass,ENT_QUOTES,'UTF-8');

	// データベース接続
	require '../connectDB.php';
	//staffテーブルの更新
	$sql='UPDATE staff SET name=?, password=? WHERE code=?';
	$stmt=$dbh -> prepare($sql);
	$data[]=$staff_name;
	$data[]=$staff_pass;
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

修正しました。<br><br>
<!-- スタッフ一覧画面へ戻るリンク -->
<a href="staff_list.php">戻る</a>

<?php require '../footer.php';?> 