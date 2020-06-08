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
				$table=$do;
				$db = new DB($table);
				$all = $db->all();
				foreach ($all as $row) {
					$isChk = ($row['sh'] == 1) ? 'checked' : '';
				?>

					<tr>
						<!-- value的值不能指定textarea，必須把值直接echo出來 -->
						<td width="80%"><textarea style="width:90%;height:60px" name="text[]"><?= $row['text']; ?></textarea></td> 
						<td width="10%"><input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?=$isChk;?>></td>
						<td width="10%"><input type="checkbox" name="del[]" value="<?= $row['id']; ?>"></td>
						<input type="hidden" name="id[]" value="<?=$row['id'];?>">
					</tr>
				<?php
				}

				?>
			</tbody>

		</table>
		<table style="margin-top:40px; width:70%;">
			<tbody>
				<tr>
				<input type="hidden" name="table" value="news">
					<td width="200px"><input type="button" onclick="op('#cover','#cvr','modal/news.php')" value="新增最新消息"></td>
					<td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
				</tr>
			</tbody>
		</table>

	</form>
</div>