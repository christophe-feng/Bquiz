<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
	<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
	</marquee>
	<div style="height:32px; display:block;"></div>
	<!--正中央-->
	<h3>更多最新消息顯示區</h3>
	<hr>

	<?php
	$total = $News->count(['sh' => 1]);
	$div = 5;
	$pages = ceil($total / $div);
	$now = $_GET['p'] ?? 1;
	$start = ($now - 1) * $div;
	$news = $News->all(['sh' => 1], "limit $start,$div");
	?>
	<ul class="ssaa" style="list-style-type:decimal;">
		<?php
		foreach ($news as $n) {
			echo "<li>";
			echo mb_substr($n['text'], 0, 20);
			echo "<div class='all' style='display:none;'>";
			echo $n['text'];
			echo "</div>";
			echo "</li>";
		}
		?>
	</ul>
	<div style="text-align:center;">

		<?php
		if ($now > 1) {
			$prev = $now - 1;
			echo "<a class='bl' href='?do=$do&p=$prev'> < </a>";
		}

		for ($i = 1; $i <= $pages; $i++) {
			$size = ($i == $now) ? "24px" : "16px";
			echo "<a href='?do=$do&p=$i' style='font-size:$size;'> $i </a>";
		}

		if ($now < $pages) {
			$next = $now + 1;
			echo "<a class='bl' href='?do=$do&p=$next'> > </a>";
		}
		?>
	</div>
</div>