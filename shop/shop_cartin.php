<?php
session_start();
require 'sessionMember.php';
?>

<?php require '../header.php'; ?>
<?php

try {
	$pro_code = $_GET['procode'];
	//sessionに入っている場合カート内容を$cartに移す
	if (isset($_SESSION['cart'])) {
		$cart = $_SESSION['cart'];
		$kazu = $_SESSION['kazu'];
	}
	$cart[] = $pro_code;
	$kazu[] = 1;
	//var_dump($cart);
	//$cartの中に入っているものを全てセッションに保存する
	$_SESSION['cart'] = $cart;
	$_SESSION['kazu'] = $kazu;
} catch (Exception $e) {
	echo 'ただいま障害により大変ご迷惑をおかけしております。';
	exit();
}

?>


カートに追加しました。<br>
<br>
<a href="shop_list.php">商品一覧に戻る</a>

<?php require '../footer.php'; ?>