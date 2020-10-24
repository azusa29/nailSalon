<?php require '../session.php'; ?>

<?php require '../header.php'; ?>

<?php

try{
	$pro_code = $_GET['procode'];
	//データベース接続
	require '../connectDB.php';

	$sql = 'SELECT name, gazou FROM mst_product WHERE code=?';
	$stmt = $dbh -> prepare($sql);
	//staff_listから受け取った$staff_codeを配列に代入しそれに合った名前をDBから取り出す。
	$data[] = $pro_code;
	$stmt -> execute($data);

	$rec = $stmt ->fetch(PDO::FETCH_ASSOC);
	// 商品名と画像名を変数に代入。
	$pro_name = $rec['name'];
	$pro_gazou_name = $rec['gazou'];
	$dbh = null;
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

商品削除<br><br>

商品コード<br>
<?php echo $pro_code; ?>
<br>
商品名<br>
<?php echo $pro_name;?>
<br>
<?php echo $disp_gazou; ?>
<br>
この商品を削除してよろしいでしょうか？<br><br>

<form action="pro_delete_done.php" method="post" >
	<input type="hidden" name="code" value="<?php echo $pro_code; ?>">
	<input type="hidden" name="gazou_name" value="<?php echo $pro_gazou_name; ?>">
	<input type="button" onclick="history.back()" value="戻る">
	<input type="submit" value="OK">
</form>

<?php require '../footer.php';?> 
