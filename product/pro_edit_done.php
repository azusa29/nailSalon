<?php require '../session.php'; ?>

<?php require '../header.php'; ?>
<?php
// データベースサーバーの障害対策。エラートラップ。
try
{
	require_once('../common/common.php');
	$post = sanitize($_POST);
	// input type="hidden"から受け取った値
	$pro_code=$post['code'];
	$pro_name=$post['name'];
	$pro_price=$post['price'];
	$pro_gazou_name_old=$post['gazou_name_old'];
	$pro_gazou_name=$post['gazou_name'];
	// 入力データに安全対策を施す。

	//$pro_code=htmlspecialchars($pro_code,ENT_QUOTES,'UTF-8');
	//$pro_name=htmlspecialchars($pro_name,ENT_QUOTES,'UTF-8');
	//$pro_price=htmlspecialchars($pro_price,ENT_QUOTES,'UTF-8');

	// データベース接続
	require '../connectDB.php';

	$sql='UPDATE mst_product SET name=?, price=?, gazou=? WHERE code=?';
	$stmt=$dbh->prepare($sql);
	//配列にデータを格納
	$data[]=$pro_name;
	$data[]=$pro_price;
	$data[]=$pro_gazou_name;
	$data[]=$pro_code;
	$stmt->execute($data);
	// データベースから切断
	$dbh=null;

	if($pro_gazou_name_old != $pro_gazou_name){
		//画像があれば削除する
		if($pro_gazou_name_old!='')
		{
		unlink('./gazou/'.$pro_gazou_name_old);
		}
	}
	echo '修正しました。<br>';

}catch(Exception $e){
	// データベースサーバーに障害がある場合表示される。
	echo 'ただいま障害により大変ご迷惑をおかけしております。';
	// 強制終了
	exit();
}

?>
<!-- スタッフ一覧画面へ戻るリンク -->
<a href="pro_list.php">戻る</a>

<?php require '../footer.php';?> 