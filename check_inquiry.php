<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Shift-JIS">
<title>お問い合わフォーム</title>
</head>
<body>
<?php
	// お問い合わせタイトル、詳細のセット
	$title = htmlspecialchars($_POST['title'], ENT_QUOTES);
	$message = htmlspecialchars($_POST['message'], ENT_QUOTES);
?>
■お問い合わせ内容をを確認してください
<br>
<form action="send_inquiry.php" method="POST">
<input type="hidden" name="title"
value="<?php echo $title; ?>">
<input type="hidden" name="message"
value="<?php echo $message; ?>">
お問い合わせタイトル：
<br>
<?php echo $title; ?>
<br>
お問い合わせ内容の詳細:
<br>
<?php echo nl2br($message); ?>
<br>
<br>
<input type="submit" value="お問い合わせ内容の送信">
</form>
</body>
</html>
