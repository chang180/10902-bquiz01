<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
	<p class="t cent botli">網站標題管理</p>
	<form method="post" action="api/edit.php">
		<table width="100%">
			<tbody>
				<tr class="yel">
					<td width="45%">網站標題</td>
					<td width="23%">替代文字</td>
					<td width="7%">顯示</td>
					<td width="7%">刪除</td>
					<td></td>
				</tr>
				<!-- 叫出所有資料 -->
				<?php
				//被include的函式可以使用上一個函式的變數
				$table=$do;
				$db = new DB($table);
				$all = $db->all();
				foreach ($all as $row) {
					$isChk = ($row['sh'] == 1) ? 'checked' : '';
				?>

					<tr>
						<td width="45%"><img src="img/<?= $row['img']; ?>" style="width:300px;height:30px"></td>
						<td width="23%"><input type="text" name="text[]" value="<?= $row['text']; ?>"></td>
						<td width="7%"><input type="radio" name="sh" value="<?= $row['id']; ?>" <?= $isChk; ?>></td>
						<td width="7%"><input type="checkbox" name="del[]" value="<?= $row['id']; ?>"></td>
						<td><input type="button" value="更新圖片" onclick="op('#cover','#cvr','modal/upload_<?=$table;?>.php?id=<?=$row['id'];?>')"></td>
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
					<input type="hidden" name="table" value="<?=$table;?>">
					<td width="200px"><input type="button" onclick="op('#cover','#cvr','modal/<?=$table;?>.php?do=<?=$table;?>')" value="新增網站標題圖片"></td>
					<td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
				</tr>
			</tbody>
		</table>

	</form>
</div>