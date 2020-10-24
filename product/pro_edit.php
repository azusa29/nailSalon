<?php require '../session.php'; ?>

<?php require '../header.php'; ?>

<?php

try{
	$pro_code = $_GET['procode'];
	//データベース接続
	require '../connectDB.php';

	$sql = 'SELECT name, price, gazou FROM mst_product WHERE code=?';
	$stmt = $dbh -> prepare($sql);
	//pro_listから受け取った$pro_codeを配列に代入しそれに合った名前をDBから取り出す。
	$data[] = $pro_code;
	$stmt -> execute($data);

	//DBからname,price,gazouの値を変数に代入する
	$rec = $stmt ->fetch(PDO::FETCH_ASSOC);

	$pro_name = $rec['name'];
	$pro_price = $rec['price'];
	//読み込んできたgazou名は古い画像の名前
	$pro_gazou_name_old = $rec['gazou'];
	//DB切断
	$dbh = null;

	//DBに画像の名前が空白出ない場合画像を$disp_gazouに代入
	if($pro_gazou_name_old==''){
		$disp_gazou='';
	}else{
		$disp_gazou='<img src="./gazou/'.$pro_gazou_name_old.'">';
	}

}catch(Exeption $e){
	echo 'ただいま障害により大変ご迷惑をおかけしております。';
		exit();
}


?>

商品修正<br><br>

商品コード<br>
<?php echo $pro_code; ?>
<br>
<form action="pro_edit_check.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="code" value="<?php echo $pro_code; ?>">
	<!-- 元々入っている画像名を呼び出し、受け渡す -->
	<input type="hidden" name="gazou_name_old" value="<?php echo $pro_gazou_name_old; ?>">
	商品名<br>
	<!-- 名前を入力済みにする。 -->
	<input type="text" name="name" style="width: 200px" value="<?php echo $pro_name ?>"><br>
	価格<br>
	<input type="text" name="price" style="width: 50px" value="<?php echo $pro_price ?>">円<br><br>
	<!-- 画像が保存されていたら画像が表示される -->
	<?php echo $disp_gazou; ?><br>
	画像を選んでください。<br>
	<!-- 新しい画像を読み込む -->
	<input type="file" name="gazou" style="width: 400px"><br>
	<input type="button" onclick="history.back()" value="戻る">
	<input type="submit" value="OK">
</form>

<?php require '../footer.php';?> 



















