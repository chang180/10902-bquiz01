<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
	<p class="t cent botli">動畫圖片管理</p>
	<form method="post" action="api/edit_mvim.php">
		<table width="100%">
			<tbody>
				<tr class="yel">
					<td width="80%">動畫圖片</td>
					<td width="20%">顯示</td>
					<td width="20%">刪除</td>
					<td></td>
				</tr>
				<!-- 叫出所有資料 -->
				<?php
				$mvim = new DB('mvim');
				$all = $mvim->all();
				foreach ($all as $row) {
					$isChk = ($row['sh'] == 1) ? 'checked' : '';
				?>

					<tr>
						<td width="80%"><img src="img/<?= $row['img']; ?>" style="width:100px;height:75px"></td>
						<td width="20%"><input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= $isChk; ?>></td>
						<td width="20%"><input type="checkbox" name="del[]" value="<?= $row['id']; ?>"></td>
						<td><input type="button" value="更新動畫" onclick="op('#cover','#cvr','modal/upload_mvim.php?id=<?=$row['id'];?>')"></td>
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
					<td width="200px"><input type="button" onclick="op('#cover','#cvr','modal/mvim.php?do=mvim')" value="新增動畫圖片"></td>
					<td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
				</tr>
			</tbody>
		</table>

	</form>
</div>