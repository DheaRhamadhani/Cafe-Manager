<?php
include APPPATH . 'views/fragment/header.php';
include APPPATH . 'views/fragment/menu.php';
?>
<h1>List Makanan</h1>
<form method="get" action="<?= base_url('welcome/index') ?>">
	<div class="row mb-3">
		<input class="form-control" placeholder="cari makanan " type="text" name="search" id="search" />
	</div>
</form>
<?php
if (isset($search)) {
	echo "<h4 class='alert alert-success'>Hasil pencarian untuk : " . $search . "</h4>";
}
?>
<div class="row">
	<?php
	if (isset($records)) {
		foreach ($records as $idx => $data) {
	?>
			<div class="col-sm-4 mb-5">
				<div class="card">
					<img class="custom-img" src="<?= empty($data['gambar']) ? BASE_ASSETS . 'uploads/noimage.jpg' : BASE_ASSETS . 'uploads/' . $data['gambar'] ?>" class="card-img-top" alt="<?= $data['nama'] ?>">
					<div class="card-body">
						<h5 class="card-title"><?= $data['nama'] ?></h5>
						<p class="card-text"><?= word_limiter($data['gambar'], 20) ?>
						<dl>
							<dt>Stok</dt>
							<dd><?= $data['stok'] ?></dd>
							<dt>Nama Cafe</dt>
							<dd><?= $data['nama_cafe'] ?></dd>
						</dl>
						<a href="<?= base_url("makanan/detail/{$data['id']}") ?>" class="btn btn-sm btn-primary align">Detail</a></p>
					</div>
				</div>
			</div>
		<?php
		}
	} else {
		?>
		<div class="mb-5 mt-5"><br><br><br>
			<h1>NO DATA FOUND<h1><br><br><br>
		</div>
	<?php
	}
	?>
</div>
<?php
if (isset($links)) {
	echo $links;
}
include APPPATH . 'views/fragment/footer.php';
?>
