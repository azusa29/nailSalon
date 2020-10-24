<?php
session_start();
require 'sessionMember.php'
?>

<?php require '../header.php'; ?>
<?php

try {
	//セッションに入っている情報を$cartへ代入
	$cart = $_SESSION['cart'];
	$kazu = $_SESSION['kazu'];
	//var_dump($cart);
	$max = count($cart);

	//データベース接続
	require '../connectDB.php';

	foreach ($cart as $key => $val) {
		$sql = 'SELECT code,name,price,gazou FROM mst_product WHERE code=?';
		$stmt = $dbh->prepare($sql);
		//$cartに入っているcode情報を$dataの先頭に代入
		$data[0] = $val;
		//sql文を実行して該当するcodeの商品のcode,name,price,gazou情報を取得
		$stmt->execute($data);

		$rec = $stmt->fetch(PDO::FETCH_ASSOC);

		$pro_name[] = $rec['name'];
		$pro_price[] = $rec['price'];
		if ($rec['gazou'] == '') {
			$pro_gazou[] = '';
		} else {
			$pro_gazou[] = '<img src="../product/gazou/' . $rec['gazou'] . '">';
		}
	}
	$dbh = null;
} catch (Exception $e) {
	echo 'ただいま障害により大変ご迷惑をおかけしております。';
	exit();
}
?>
カートの中身<br><br>
<form action="kazu_change.php" method="post"></form>
<?php
for ($i = 0; $i < $max; $i++) {
?>
	<?php echo $pro_name[$i]; ?>
	<?php echo $pro_gazou[$i]; ?>
	<?php echo $pro_price[$i] . '円'; ?>
	<input type="text" name="kazu<?php echo $i; ?>" value="<?php echo $kazu[$i]; ?>">
	<br>
<?php
}
?>
<input type="hidden" name="max" value="<?php echo $max; ?>">
<input type="submit" value="数量変更"><br>
<input type="button" onclick="history.back()" value="戻る">
</form>

<?php require '../footer.php'; ?>