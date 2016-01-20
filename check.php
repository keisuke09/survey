
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<title>index.html</title>
	</head>
	<body>
	
	<?php
		$nickname = $_POST['nickname'];
		$email = $_POST['email'];
		$comments = $_POST['comments'];

		$nickname = htmlspecialchars($nickname);
		$email = htmlspecialchars($email);
		$comments = htmlspecialchars($comments);

		if($nickname==''){
			echo 'No input on part of "NAME"<br />';
		}else{
			echo 'Name : '.$nickname.'-sama<br />';
		}
		if($email==''){
			echo 'No input on part of "MAIL"<br />';
		}else{
			echo 'e-Mail : '.$email."<br />";
		}
		if($comments==''){
			echo 'No input on part of "COMMENTS" <br />';
		}else{
			echo 'Comments : '.$comments.'<br />';
		}

	/*		$mail_sub='Received your information';
			$mail_body=$nickname.'-sama, thanks for your information<br />';
			$mail_body=html_entity_decode($mail_body, ENT_QUOTES, "UTF-8");
			$mail_head='From:'.$email;
			mb_language('Japanese');
			mb_internal_encoding("UTF-8");
			mb_send_mail($email, $mail_sub, $mail_body, $mail_head);     */
	
		if($nickname=='' || $email=='' || $comments==''){
			echo 'Please return to previous page with below link <br />';
			echo '<form>';
			echo '<input type="button" onclick="history.back()" value="Return">';
			echo '</form>';
		}else{			
			echo '<form method="post" action="thanks.php">';
			echo '<input name="nickname" type="hidden" value="'.$nickname.'">';
			echo '<input name="email" type="hidden" value="'.$email.'">';
			echo '<input name="comments" type="hidden" value="'.$comments.'">';
			echo '<input type="button" onclick="history.back()" value="Return">';
			echo '<input type="submit" value="OK">';
			echo '</form>';
		}
	?>
	</body>
</html>




