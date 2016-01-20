
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<title>index.html</title>
	</head>
	<body>
	
	<?php
		$call1 = $_POST['call1'];
		$call2 = $_POST['call2'];
		$call3 = $_POST['call3'];
		$call4 = $_POST['call4'];

		$call = array($call1, $call2, $call3, $call4);
	?>

	<form method="post" action="ichiran.php">
		Line1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Line2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Line3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Line4<br />
		
		<?php
			for($i=1;$i<=4;$i++){
		?>

		<select name="call<?php echo $i; ?>">
			<option value="NONE" <?php if($call[$i-1] == 'NONE'){echo 'selected';} ?> > NONE </option>
			<option value="code" <?php if($call[$i-1] == 'code'){echo 'selected';} ?> > code </option>
			<option value="nickname" <?php if($call[$i-1] == 'nickname'){echo 'selected';} ?> > nickname </option>
			<option value="email" <?php if($call[$i-1] == 'email'){echo 'selected';} ?> > email </option>
			<option value="goiken" <?php if($call[$i-1] == 'goiken'){echo 'selected';} ?> > goiken </option>
		</select>

		<?php
			}
		?>

		<br />
		<input type="submit" value="output" action="">
	</form>	

	<?php
	//-SQL----------------------------------------------------
		$dsn = 'mysql:dbname=phpkiso;host=localhost'; 
		$user = 'root';
		$password = '';
		$dbh = new PDO($dsn, $user, $password); 
		$dbh->query('SET NAMES utf8'); 

		$sql = 'SELECT * FROM survey WHERE 1';
		$stmt = $dbh->prepare($sql);
		$stmt->execute();
	//-SQL----------------------------------------------------
		while(1){
			$rec = $stmt->fetch(PDO::FETCH_ASSOC);
			if($rec==false){
				break;
			}
			for($i=1;$i<=4;$i++){
				switch ($call[$i-1]) {
					case 'NONE':
						echo ' -- ';
						break;
					case 'code':
						echo $rec['code'].' ';				
						break;
					case 'nickname':
						echo $rec['nickname'].' ';				
						break;
					case 'email':
						echo $rec['email'].' ';		
						break;
					case 'goiken':
						echo $rec['goiken'].' ';
						break;			
					default:
						break;
				}
			}
			echo '<br />';
		}

		$dbh = null;	
	?>
<!--===============================================================================-->
	<br /><br />
	<form method="post" action="ichiran.php">
	Please enter the code for searching <br />
	<input name="kensaku" type="text" style="width:100px"><br />
	<br />
	<input type="submit" value="search">
	<br />
	</form>
<!--===============================================================================-->

	<?php
		$kensaku = $_POST['kensaku'];
	
	//-SQL----------------------------------------------------
		$dsn = 'mysql:dbname=phpkiso;host=localhost'; 
		$user = 'root';
		$password = '';
		$dbh = new PDO($dsn, $user, $password); 
		$dbh->query('SET NAMES utf8'); 

		$sql = 'SELECT * FROM survey WHERE code='.$kensaku;
		$stmt = $dbh->prepare($sql);
		$stmt->execute();
	//-SQL----------------------------------------------------
		
		$rec2 = $stmt->fetch(PDO::FETCH_ASSOC);
		echo $rec2['code'];
		echo $rec2['nickname'];
		echo $rec2['email'];
		echo $rec2['goiken'];

		$dbh = null;	
	?>


	</body>
</html>
