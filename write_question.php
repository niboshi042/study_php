<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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

	// 日付チェック
	// 全角から半角へ変換
	$pdate = mb_convert_kana($pdate, 'a', 'utf-8');
	// [/]で分割
	list($year, $month, $day) = explode('/', $pdate);
	// 日付チェック
	if (!checkdate($month, $day, $year)) $pdate = '';

	// 数値チェック
	// 全角から半角へ変換
	$pprice = mb_convert_kana($pprice, 'a', 'utf-8');
	// 数値チェック
	if (!is_numeric($pprice)) $pprice = '';

	// 保存データ
	$data = array($pdate, $pprice, $star, $starm, $lang[0], $lang[1], $lang[2], $lang[3], $lang[4], $lang[5], $job);

	// 保存ファイル名
	$filename = 'uploads/question.csv';

	// appendモードで開く
	$handle = fopen($filename, 'a');

	// 排他的ロック
	flock($handle, LOCK_EX);

	// csv書き込み
	fputcsv($handle, $data);

	// ロック解除
	flock($handle, LOCK_UN);
	
	// 閉じる
	fclose($handle);
?>
<body>
アンケートを登録しました
<br /><br />
<a href="uploads/question.csv">CSVファイルのダウンロード</a>
</body>
</html>


