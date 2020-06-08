<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
	<p class="t cent botli">校園映像圖片管理</p>
	<form method="post" action="api/edit.php">
		<table width="100%">
			<tbody>
				<tr class="yel">
					<td width="80%">校園映像圖片</td>
					<td width="20%">顯示</td>
					<td width="20%">刪除</td>
					<td></td>
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
						<td width="80%"><img src="img/<?= $row['img']; ?>" style="width:100px;height:68px"></td>
						<td width="20%"><input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= $isChk; ?>></td>
						<td width="20%"><input type="checkbox" name="del[]" value="<?= $row['id']; ?>"></td>
						<td><input type="button" value="更換圖片" onclick="op('#cover','#cvr','modal/upload_image.php?id=<?=$row['id'];?>')"></td>
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
				<input type="hidden" name="table" value="mvim">
					<td width="200px"><input type="button" onclick="op('#cover','#cvr','modal/image.php?do=image')" value="新增校園映像圖片"></td>
					<td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
				</tr>
			</tbody>
		</table>

	</form>
</div>