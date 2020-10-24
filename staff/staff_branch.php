<?php
session_start();
//合言葉を変える
session_regenerate_id(true);
//sessionに記録がなければ
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
	if(isset($_POST['staffcode']) == false){
		header('Location:staff_ng.php');
		exit();
	}
	$staff_code = $_POST['staffcode'];
		header('Location:staff_disp.php?staffcode='.$staff_code);
		exit();
	}

//追加を選択した場合
if(isset($_POST['add']) == true){
	// スタッフコードの選択が必要ない
		header('Location:staff_add.php');
		exit();
}

// 修正を選択した場合
if(isset($_POST['edit']) == true){
	// スタッフコードが選択されているか判断
	if(isset($_POST['staffcode'])==false){
		header('Location:staff_ng.php');
		exit();
	}

	$staff_code = $_POST['staffcode'];
	header('Location:staff_edit.php?staffcode='.$staff_code);
	exit();
	}

// 削除を選択した場合
if(isset($_POST['delete']) == true){
	// スタッフコードが選択されているか判断
	if(isset($_POST['staffcode']) == false){
		header('Location:staff_ng.php');
		exit();
	}
	$staff_code = $_POST['staffcode'];
	header('Location:staff_delete.php?staffcode='.$staff_code);
	exit();
}



?>