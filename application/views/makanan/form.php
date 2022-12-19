<?php
include APPPATH . 'views/fragment/header.php';
include APPPATH . 'views/fragment/menu.php';
?>
<form method="post" action="<?= base_url('makanan/save') ?> " enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?= isset($id) ? $id : '' ?>" />
	<div>
		<label></label>
		<div>
			<h3>Tambah Makanan</h3>
		</div>
	</div>
	<div class="row mb-3">
		<label class="form-label">nama</label>
		<div>
			<input class="form-control" type="text" name="nama" id="nama" value="<?= $nama ?>" required />
		</div>
	</div>
	<div class="row mb-3">
		<label class="form-label">harga</label>
		<div>
			<input class="form-control" type="number" name="harga" id="harga" value="<?= $harga ?>" required />
		</div>
	</div>
	<div class="row mb-3">
		<label class="form-label">stok</label>
		<div>
			<input class="form-control" type="number" name="stok" id="stok" value="<?= $stok ?>" required />
		</div>
	<div class="row mb-3 form-group">
		<label class="form-label">Cafe</label>
		<div>
			<select list="cafes" class="form-control" name="id_cafe" id="id_cafe" value="<?= $nama_cafe ?>" required>			
				<?php foreach($cafes as $cafe){?>
					<option value=<?= $cafe['id'] ?>> <?= $cafe['nama_cafe'] ?></option>
				<?php } ?>
			</select>
		</div>
	</div>
	<div class="row mb-3">
		<label class="form-label">Gambar Makanan</label>
		<div>
			<?php
				if($gambar != ''){
					?>				
						<p>Your Previous image : <img class="w-25 p-3 img-responsive" src="../../assets/uploads/<?= $gambar ?>"/></p>
					<?php
				}
			?>
			<input class="form-control" type="file" name="gambar" id="gambar" accept=".png, .jpg, .jpeg" value="../../assets/uploads/<?= $gambar ?>"required />
		</div>
	</div>
	<div>
		<input class="btn btn-primary" type="button" value="Cancel" onclick="history.back()" />
		<input class="btn btn-danger" type="submit" value="Simpan" />
	</div>	
</form>
