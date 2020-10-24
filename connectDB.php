	<!-- // データベース接続 -->
	<?php
	$dsn='mysql:dbname=nailSalon;host=localhost;charset=utf8';
	$user='root';
	$password='root';
	$dbh=new PDO($dsn,$user,$password);
	$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	?>