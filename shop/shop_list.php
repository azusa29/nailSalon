<?php
session_start();
require 'sessionMember.php'
?>

<?php require '../header.php'; ?>

<?php
try {
	//データベース接続
	require '../connectDB.php';

	//データベースからスタッフの名前を全て取得する
	$sql = 'SELECT code,name, price FROM mst_product WHERE 1';
	$stmt = $dbh->prepare($sql);
	$stmt->execute();

	//データベース切断
	$dbh = null;

	echo '商品一覧<br><br>';
	//分岐ページへ飛ばす。

	while (true) {
		//$stmt から１レコードずつ取り出す。
		$rec = $stmt->fetch(PDO::FETCH_ASSOC);
		//もしデータがなければループから出る(データがなくなった時も)
		if ($rec == false) {
			break;
		}
		echo '<a href="shop_product.php?procode=' . $rec['code'] . '">';
		echo $rec['name'] . '---';
		echo $rec['price'] . '円';
		echo '</a>';
		echo '<br>';
	}
} catch (Exception $e) {
	echo 'ただいま障害により大変ご迷惑をおかけしております。';
	exit();
}

echo '<br>';
echo '<a href="shop_cartlook.php">カートを見る。</a><br>';

?>



<?php require '../footer.php'; ?> 