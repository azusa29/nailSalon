<?php require '../session.php'; ?>
<?php require '../header.php'; ?>
<?php
// データベースサーバーの障害対策。エラートラップ。
try
{
	require_once('../common/common.php');
	//$postは安全対策された＄_POST
	$post = sanitize($_POST);
	// input type="hidden"から受け取った値
	$staff_name=$post['name'];
	$staff_pass=$post['pass'];
	// 入力データに安全対策を施す。
	//$staff_name=htmlspecialchars($staff_name,ENT_QUOTES,'UTF-8');
	//$staff_pass=htmlspecialchars($staff_pass,ENT_QUOTES,'UTF-8');

	// データベース接続
	$dsn='mysql:dbname=nailSalon;host=localhost;charset=utf8';
	$user='root';
	$password='root';
	$dbh=new PDO($dsn,$user,$password);
	$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	$sql='INSERT INTO staff (name,password) VALUES (?,?)';
	$stmt=$dbh->prepare($sql);
	$data[]=$staff_name;
	$data[]=$staff_pass;
	$stmt->execute($data);
	// データベースから切断
	$dbh=null;
	// 画面に〇〇さんを追加しました。と表示させる
	echo $staff_name;
	echo 'さんを追加しました。<br>';

}catch(Exception $e){
	// データベースサーバーに障害がある場合表示される。
	echo 'ただいま障害により大変ご迷惑をおかけしております。';
	// 強制終了
	exit();
}

?>
<!-- スタッフ一覧画面へ戻るリンク -->
<a href="staff_list.php">戻る</a>

<?php require '../footer.php';?> 