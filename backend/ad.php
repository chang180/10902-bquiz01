<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
	<p class="t cent botli">動態文字廣告管理</p>
	<form method="post" action="api/edit_ad.php">
		<table width="100%">
			<tbody>
				<tr class="yel">
					<td width="80%">動態文字廣告</td>
					<td width="10%">顯示</td>
					<td width="10%">刪除</td>
				</tr>
				<!-- 叫出所有資料 -->
				<?php
				$title = new DB('ad');
				$all = $title->all();
				foreach ($all as $row) {
					$isChk = ($row['sh'] == 1) ? 'checked' : '';
				?>

					<tr>
						<td width="80%"><input type="text" name="text[]" value="<?= $row['text']; ?>"></td>
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
					<td width="200px"><input type="button" onclick="op('#cover','#cvr','modal/ad.php')" value="新增動態文字廣告"></td>
					<td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
				</tr>
			</tbody>
		</table>

	</form>
</div>