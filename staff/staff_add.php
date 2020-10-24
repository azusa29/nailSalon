<?php require '../session.php'; ?>
<?php require '../header.php'; ?>
	スタッフ追加<br>
	<br>
	<form action="staff_add_check.php" method="post"><br>
		スタッフ名を入力してください。<br>
		<input type="text" name="name" style="width:200px"><br>
		パスワードを入力してください。<br>
		<input type="password" name="pass" style="width:100px"><br>
		パスワードをも一度入力してください。<br>
		<input type="password" name="pass2" style="width: 100px"><br>
		<br>
		<input type="button" onclick="history.back()" value="戻る">
		<input type="submit" value="OK">
	</form>
<?php require '../footer.php';?> 