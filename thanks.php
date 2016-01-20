
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<title>index.html</title>
	</head>
	<body>
	
		


	
	<?php
	//-SQL----------------------------------------------------
		$dsn = 'mysql:dbname=phpkiso;host=localhost'; // db接続
		$user = 'root';
		$password = '';
		$dbh = new PDO($dsn, $user, $password); //DB接続オブジェクトを作成
		$dbh->query('SET NAMES uft8'); //接続したDBオブジェクトで文字コードutf8を使うように指定
	//-SQL----------------------------------------------------

		$nickname = $_POST['nickname'];
		$email = $_POST['email'];
		$goiken = $_POST['comments'];

		$nickname = htmlspecialchars($nickname);
		$email = htmlspecialchars($email);
		$goiken = htmlspecialchars($goiken);

		echo 'Thanks !!<br />';
		echo 'Name : '.$nickname.'-sama<br />';
		echo 'e-Mail : '.$email."<br />";
		echo 'Comments : '.$goiken.'<br />';

	//-SQL----------------------------------------------------
		$sql = 'INSERT INTO `survey` (`nickname`, `email`, `goiken`) VALUES("'.$nickname.'","'.$email.'","'.$goiken.'")';
		var_dump($sql);
		$stmt = $dbh->prepare($sql);
		$stmt->execute();
		$dbh = null;
	//-SQL----------------------------------------------------
	
	?>
	</body>
</html>




