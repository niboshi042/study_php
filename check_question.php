<html>
<head>
<meta http-equiv="Contet-Type" content="text/html; charset=utf-8">
<title>アンケート</title>
</head>
<?php
	// 購入日
	$pdate = htmlspecialchars($_POST['pdate'], ENT_QUOTES);
	// 平均購入金額
	$pprice = htmlspecialchars($_POST['pprice'], ENT_QUOTES);
	// 評価
	$star = htmlspecialchars($_POST['star'], ENT_QUOTES);
	// 興味のある言語
	for ($i = 0; $i < 6; $i++) {
		$lang[$i] = htmlspecialchars($_POST['lang'][$i], ENT_QUOTES);
	}
	// 職業
	$job = htmlspecialchars($_POST['job'], ENT_QUOTES);
?>
<body>
アンケート内容を確認してください
<br />
この本の購入日を教えてください
<br />
<?php
	// 全角から半角へ変換
	$pdate = mb_convert_kana($pdate, 'a', 'utf-8');
	// [/]で分割
	list($year, $month, $day) = explode("/", $pdate);
	// 日付チェック
	if (checkdate($month, $day, $year)) {
		echo $pdate;
	} else {
		echo $pdate . '日付に誤りがあります。';
	}
?>
<br /><br />
一ヶ月あたりの書籍の平均購入額を教えてください。<br />
<?php
	// 全角から半角へ変換
	$pprice = mb_convert_kana($pprice, 'a', 'utf-8');
	// 数値チェック
	if (is_numeric($pprice)) {
		echo $pprice . '円';
	} else {
		echo $pprice . '円(数値ではありません。)';
	}
?>
<br /><br />
本書の評価を教えてください。(5段階)<br />
<?php echo $star; ?>
<br /><br />
あなたの職種を教えてください。<br />
<?php echo $job; ?>
<br /><br />
<form action="write_question.php" method="POST">
<input type="hidden" name="pdate" value="<?php echo $pdate; ?>">
<input type="hidden" name="pprice" value="<?php echo $pprice; ?>">
<input type="hidden" name="star" value="<?php echo $star; ?>">
<?php 
	for ($i = 0; $i < 6; $i++) {
		echo '<input type="hidden" name="lang[' . $i . ']" value="' . $lang[$i] . '">';
	}
?>
<input type="hidden" name="job" value="<?php echo $job; ?>">
<input type="submit" value="アンケートを送信する">
</form>
</body>
</html>
