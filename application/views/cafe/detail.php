<?php
include APPPATH . 'views/fragment/header.php';
include APPPATH . 'views/fragment/menu.php';
?>
<h1>Detail Cafe</h1>
<dl>
	<dt>Nama Cafe</dt>
	<dd><?= $nama_cafe ?></dd>
	<dt>Telpon</dt>
	<dd><?= $telpon ?></dd>
</dl>
<a href='#' onclick="history.back()">Back</a>
