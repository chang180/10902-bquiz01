<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
	<p class="t cent botli">頁尾版權資料管理</p>
	<form method="post" action="api/edit_bottom.php">
		<table width="100%">
			<tbody>
				<tr class="yel td">
					<td class="yel" width="50%">頁尾版權資料</td>
					<?php $total = new DB('bottom');
					$tt = $total->find(1);
					?>
					<td width="50%"><input type="text" name="bot" value="<?= $tt['bot']; ?>"></td>
				</tr>

			</tbody>

		</table>
		<table style="margin-top:40px; width:70%;">
			<tbody>
				<tr>
					<td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
				</tr>
			</tbody>
		</table>

	</form>
</div>