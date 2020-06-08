<?php
$title = new DB('title');
$ti = $title->find(['sh' => 1]);
?>
<a title="<?= $ti['text']; ?>" href="index.php">
	<div class="ti" style="background:url('img/<?= $ti['img']; ?>'); background-size:cover;"></div>
	<!--標題-->
</a>