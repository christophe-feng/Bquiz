<?php include_once "./api/db.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<title>健康促進網</title>
	<link href="./css/css.css" rel="stylesheet" type="text/css">
	<script src="./js/jquery-1.9.1.min.js"></script>
	<script src="./js/js.js"></script>
	<style>
		#alert{
			background:rgba(51,51,51,0.8); 
			color:#FFF; 
			min-height:200px;
			max-height:400px;
			width:390px; 
			position:fixed; 
			display:none; 
			z-index:9999; 
			overflow:auto;
			left: 530px;
			top: 350px;
			padding: 10px;
		}
	</style>
</head>

<body>
	<div id="alert">
		<pre id="ssaa"></pre>
	</div>
	<iframe name="back" style="display:none;"></iframe>
	<div id="all">
		<div id="title">
			<!-- 簡化建議：使用 PHP 的 date("n 月 d 日 l") 格式，n 為不補零的月份 -->
			<!-- 簡化範例：<?= date("n 月 j 日 l"); ?> -->
			<?= date(" m 月 d 日 l"); ?> |
			<!-- 簡化建議：可將今日與累積瀏覽封裝成 function 提高可讀性 -->
			<!-- 簡化範例：今日瀏覽: <?= $Total->getToday(); ?> | 累積瀏覽: <?= $Total->getTotal(); ?> -->
			今日瀏覽: <?= $Total->find(['date' => date("Y-m-d")])['total']; ?> |
			累積瀏覽: <?= $Total->sum('total'); ?>
			<a href="index.php" style="float: right;">回首頁</a>
		</div>
		<div id="title2">
			<a href="index.php">
				<img src="./icon/02B01.jpg" alt="健康促進網-回首頁">
			</a>
		</div>
		<div id="mm">
			<div class="hal" id="lef">
				<a class="blo" href="?do=po">分類網誌</a>
				<a class="blo" href="?do=news">最新文章</a>
				<a class="blo" href="?do=pop">人氣文章</a>
				<a class="blo" href="?do=know">講座訊息</a>
				<a class="blo" href="?do=que">問卷調查</a>
			</div>
			<div class="hal" id="main">
				<div>
					<marquee style="width:80%; display:inline-block;">
						請民眾踴躍投稿電子報，讓電子報成為大家相互交流、分享的園地！詳見最新文章
					</marquee>
					<span style="width:18%; display:inline-block;">
						<!-- 簡化建議：利用三元運算子或簡化 if 判斷結構 -->
						<!-- 簡化範例：<?= isset($_SESSION['login']) ? "歡迎，{$_SESSION['login']}" : "<a href='?do=login'>會員登入</a>"; ?> -->
						<?php if (isset($_SESSION['login'])): ?>
							歡迎，<?= $_SESSION['login']; ?><br>
							<?php if ($_SESSION['login'] == 'admin'): ?>
								<input type="button" value="管理" onclick="location.href='back.php'">
								<input type="button" value="登出" onclick="location.href='logout.php'">
							<?php else: ?>
								<input type="button" value="登出" onclick="location.href='logout.php'">
							<?php endif; ?>
						<?php else: ?>
							<a href="?do=login">會員登入</a>
						<?php endif; ?>
					</span>
					<div class="">
						<?php
						// 簡化建議：使用 $do = $_GET['do'] ?? 'main'; 後直接 include 檔案，並用 file_exists 確保安全
						// 簡化範例：$file = "./front/{$_GET['do'] ?? 'main'}.php"; include file_exists($file) ? $file : "./front/main.php";
						$do = $_GET['do'] ?? 'main';
						$file = "./front/" . $do . ".php";
						if (file_exists($file)) {
							include $file;
						} else {
							include "./front/main.php";
						}
						?>
					</div>
				</div>
			</div>
		</div>
		<!-- 要修改css -->
		<div id="bottom">
			本網站建議使用：IE9.0以上版本，1024 x 768 pixels 以上觀賞瀏覽 ， Copyright © 2026健康促進網社群平台 All Right Reserved
			<br>
			服務信箱：health@test.labor.gov.tw<img src="./icon/02B02.jpg" width="45">
		</div>
	</div>

</body>

</html>