<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
	<p class="t cent botli">最新消息資料管理</p>
	<form method="post" action="api/edit.php">
		<table width="100%">
			<tbody>
				<tr class="yel">
					<td width="80%">最新消息</td>
					<td width="10%">顯示</td>
					<td width="10%">刪除</td>
				</tr>
				<!-- 叫出所有資料 -->
				<?php

				$table = $do;
				$db = new DB("$table");
				$total = $db->count('');
				$num = 4;
				$pages = ceil($total / $num);
				$now = (!empty($_GET['p'])) ? $_GET['p'] : 1;
				$start = ($now - 1) * $num;
				$ns = $db->all('', " limit $start,$num");

				?>

				<tr class="ssaa" start="<?= $start + 1; ?>">
					<?php
					foreach ($ns as $row) {
						$isChk = ($row['sh'] == 1) ? 'checked' : '';
					?>

				<tr>
					<!-- value的值不能指定textarea，必須把值直接echo出來 -->
					<td width="80%"><textarea style="width:90%;height:60px" name="text[]"><?= $row['text']; ?></textarea></td>
					<td width="10%"><input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= $isChk; ?>></td>
					<td width="10%"><input type="checkbox" name="del[]" value="<?= $row['id']; ?>"></td>
					<input type="hidden" name="id[]" value="<?= $row['id']; ?>">
				</tr>
			<?php
					} 
			?>
			</tr>
			</tbody>

		</table>
		<table >
	<tbody style="margin-top:40px; width:70%;">
		<tr>
			<input type="hidden" name="table" value="news">
			<td width="200px"><input type="button" onclick="op('#cover','#cvr','modal/news.php')" value="新增最新消息"></td>
			<td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
		</tr>
	</tbody>
</table>

</form>

		<div style="text-align:center;position:absolute;bottom:20px;left:50%;transform: translateX(-50%);">
			<?php
			if (($now - 1) > 0) {

			?>
				<a class="bl" style="font-size:30px;" href="?do=news&p=<?= ($now - 1); ?>">&lt;&nbsp;</a>
			<?php
			}
			for ($i = 1; $i <= $pages; $i++) {
				$fonsize = ($i == $now) ? '30px' : '20px';

			?>

				<a class="bl" style="font-size:<?= $fonsize; ?>" href="?do=news&p=<?= $i; ?>"><?= $i; ?></a>

			<?php
			}
			if (($now + 1) <= $pages) {

			?>

				<a class="bl" style="font-size:30px;" href="?do=news&p=<?= ($now + 1); ?>">&gt;&nbsp;</a>
			<?php
			}
			?>
		</div>
</div>
<div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
<script>
	$(".sswww").hover(
		function() {
			$("#alt").html("" + $(this).children(".all").html() + "").css({
				"top": $(this).offset().top - 50
			})
			$("#alt").show()
		}
	)
	$(".sswww").mouseout(
		function() {
			$("#alt").hide()
		}
	)
</script>




</div>