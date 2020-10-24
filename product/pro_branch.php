<?php

session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false){
	echo 'ログインされていません。<br>';
	echo '<a href="../staff_login/staff_login.php">ログイン画面へ</a>';
	exit();
}else{
	echo $_SESSION['staff_name'];
	echo 'さんログイン中<br>';
	echo '<br>';
}
//参照を選択した場合
if(isset($_POST['disp']) == true){
	//スタッフコードが選択されていない場合
	if(isset($_POST['procode']) == false){
		header('Location:pro_ng.php');
		exit();
	}
	$pro_code = $_POST['procode'];
		header('Location:pro_disp.php?procode='.$pro_code);
		exit();
	}

//追加を選択した場合
if(isset($_POST['add']) == true){
	// スタッフコードの選択が必要ない
		header('Location:pro_add.php');
		exit();
}

// 修正を選択した場合
if(isset($_POST['edit']) == true){
	// スタッフコードが選択されているか判断
	if(isset($_POST['procode'])==false){
		header('Location:pro_ng.php');
		exit();
	}

	$pro_code = $_POST['procode'];
	header('Location:pro_edit.php?procode='.$pro_code);
	exit();
	}

// 削除を選択した場合
if(isset($_POST['delete']) == true){
	// スタッフコードが選択されているか判断
	if(isset($_POST['procode']) == false){
		header('Location:pro_ng.php');
		exit();
	}
	$pro_code = $_POST['procode'];
	header('Location:pro_delete.php?procode='.$pro_code);
	exit();
}

?>
<?php require '../footer.php';?> 
