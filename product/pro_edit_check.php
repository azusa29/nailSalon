<?php require '../session.php'; ?>

<?php require '../header.php'; ?>
<?php
require_once('../common/common.php');
$post = sanitize($_POST);
$pro_code = $post['code'];
$pro_name = $post['name'];
$pro_price = $post['price'];
$pro_gazou_name_old = $post['gazou_name_old'];
$pro_gazou = $_FILES['gazou'];

//$pro_code = htmlspecialchars($pro_code, ENT_QUOTES, 'UTF-8');
//$pro_name = htmlspecialchars($pro_name, ENT_QUOTES, 'UTF-8');
//$pro_price = htmlspecialchars($pro_price, ENT_QUOTES, 'UTF-8');

if($pro_name == ''){
	echo '商品名が入力されていません。<br>';
} else {
	echo '商品名';
	echo $pro_name;
	echo '<br>';
}

// 価格が半角数字でなかったら
if(preg_match('/\A[0-9]+\z/', $pro_price)==0){
	echo '価格をきちんと入力してください。<br>';
}else{
	echo '価格';
	echo $pro_price;
	echo '円<br>';
} 

//画像があるかとサイズを確認する
if($pro_gazou['size']>0)
{
	if($pro_gazou['size']>1000000)
	{
		echo '画像が大き過ぎます';
	}
	else
	{
		move_uploaded_file($pro_gazou['tmp_name'],'./gazou/'.$pro_gazou['name']);
		echo '<img src="gazou/'.$pro_gazou['name'].'">';
		echo '<br />';
	}
}

if($pro_name=='' ||preg_match('/\A[0-9]+\z/', $pro_price)==0 || $pro_gazou['size']>1000000){
	echo '<form>';
	echo '<input type="button" onclick="history.back()" value="戻る">';
	echo '</form>';
}else{
	echo '上記のように変更します。';
	echo '<form method="post" action="pro_edit_done.php">';
	echo '<input type="hidden" name="code" value="'.$pro_code.'">';
	echo '<input type="hidden" name="name" value="'.$pro_name.'">';
	echo '<input type="hidden" name="price" value="'.$pro_price.'">';
	echo '<input type="hidden" name="gazou_name_old" value="'.$pro_gazou_name_old.'">';
	echo '<input type="hidden" name="gazou_name" value="'.$pro_gazou['name'].'">';
	echo '<br>';
	echo '<input type="button" onclick="history.back()" value="戻る">';
	echo '<input type="submit" value="OK">';
	echo '</form>';
}


?>
<?php require '../footer.php';?> 