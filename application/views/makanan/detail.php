<?php
include APPPATH . 'views/fragment/header.php';
include APPPATH . 'views/fragment/menu.php';
?>
<div class="card col-sm-8 container d-flex align-items-left justify-content-center">
	<img src="<?= empty($gambar) ? BASE_ASSETS . 'uploads/noimage.jpg' : BASE_ASSETS .
					'uploads/' . $gambar ?>" class="card-img-top" alt="<?= $nama ?>">
	<div class="card-body">
		<h5 class="card-title"><?= $nama ?></h5>
		<p class="card-text"><?= $harga ?>
		<dl>
			<dt>gambar</dt>
			<dd><?= $gambar ?></dd>
			<dt>Stok</dt>
			<dd><?= $stok ?></dd>
			<dt>Nama Cafe</dt>
			<dd><?= $nama_cafe ?></dd>
		</dl>
		<a class="btn btn-outline-danger" href='#' onclick="history.back()">Back</a>
	</div>
</div>
<?php
include APPPATH . 'views/fragment/footer.php';
?>
