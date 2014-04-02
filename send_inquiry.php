<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Shift-JIS">
<title>お問い合わせフォーム</title>
</head>
<body>
<?php
	// お問い合わせタイトル、詳細のセット
	$title = htmlspecialchars($_POST['title'], ENT_QUOTE);
	$message = htmlspecialchars($_POST['message'], ENT_QUOTE);

	// 日本語(SJIS)の指定
	mb_language('ja');
	mb_internal_encoding('UTF-8');

	// Fromアドレスの設定(自動送信<送信元アドレス>)
	$name = '自動送信';
	$email = '<送信元のアドレス>';
	$header = 'From: ' . mb_encode_mimeheader($name) . '<' . $email . '>';

	// メール送信
	$result = mb_send_mail("<自分のメールアドレス>", $title, $message, $header);

	// メール送信の確認
	if ($result) {
		// メール送信の成功
		echo '■お問い合わせ内容を担当者に送信しました';
	} else {
		// メール送信の失敗
		echo '■担当者への送信にし失敗しました。';
	}
>
</body>
</html>

