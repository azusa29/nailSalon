<?php require '../session.php'; ?>

<?php require '../header.php'; ?>
<?php

try{
	$pro_code = $_GET['procode'];
	//データベース接続
	require '../connectDB.php';

	$sql = 'SELECT name, price, gazou FROM mst_product WHERE code=?';
	$stmt = $dbh -> prepare($sql);
	//staff_listから受け取った$staff_codeを配列に代入しそれに合った名前をDBから取り出す。
	$data[] = $pro_code;
	$stmt -> execute($data);

	$rec = $stmt ->fetch(PDO::FETCH_ASSOC);
	// 商品名を変数にコピー。
	$pro_name = $rec['name'];
	$pro_price = $rec['price'];
	$pro_gazou_name = $rec['gazou'];

	$dbh = null;

	//画像ファイルがあれば表示のタグを準備する。
	if($pro_gazou_name==''){
		$disp_gazou='';
	}else{
		$disp_gazou='<img src="./gazou/'.$pro_gazou_name.'">';
	}
}catch(Exeption $e){
	echo 'ただいま障害により大変ご迷惑をおかけしております。';
		exit();
}

?>

商品情報参照<br><br>
商品コード<br>
<?php echo $pro_code; ?>
<br>
商品名<br>
<?php echo $pro_name; ?>
<br>
価格<br>
<?php echo $pro_price; ?>円
<br>
<?php echo $disp_gazou; ?>
<br><br>

<form>
	<input type="button" onclick="history.back()" value="戻る">
</form>

<?php require '../footer.php';?> 
