<style>
        body {
            background: url('<?= BASEURL; ?> /img/Home.jpg') no-repeat center center fixed;
            background-size: cover;
        }
		
		table{
			text-align: center;
		}
        
</style>
<div class="container mt-3">

	<div class="row">
		<div class="col-lg-6">
			<?php Flasher::flash() ?>
		</div>
	</div>

	<div class="row mb-3">

		<div class="col-lg-6">
			<form action="<?= BASEURL; ?>/perekaman/cariR" method="POST">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="cari ruang..." name="keyword" id="keyword" autocomplete="off">
					<div class="input-group-append">
						<button class="btn btn-primary" type="submit" id="tombolCari">Search</button>
					</div>
				</div>
			</form>
		</div>
		<div class="col-lg-6">
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary tombolTambahDataR" data-bs-toggle="modal"
				data-bs-target="#formModalTambah">
				TAMBAH
			</button>
		</div>
		

	</div>
	<div class="row">
		<div class="col-lg-12">

			<h3><b>Daftar Ruang : </b></h3>

			<table class = "table table-striped table-light">
                    <thead>
                        <tr>
                            <th>Kode Ruangan</th>
                            <th>Nama Ruangan</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                    </thead>	
                    <tbody>
					<?php foreach ($data['ruang'] as $ruang): ?>
						<tr>
							<td>
								<?= $ruang['kodeR'] ?>
							</td>
							<td>
								<?= $ruang['namaR'] ?>
							</td>
							<td><a href="<?= BASEURL; ?>/perekaman/editR/<?= $ruang['kodeR']; ?>"
									class="btn btn-warning ms-1 tampilModalUbahR" style="color:black"
									data-bs-toggle="modal" data-bs-target="#formModal_<?= $ruang['kodeR'] ?>"
									data-id="<?= $ruang['kodeR']; ?>">edit</a>
								<a href="<?= BASEURL; ?>/perekaman/hapusR/<?= $ruang['kodeR']; ?>"
									class="btn btn-danger ms-1" style="color:black"
									onclick="return confirm('yakin?')">hapus</a>	
								<a href="<?= BASEURL; ?>/detail/showR/<?= $ruang['kodeR']; ?>"
									class="btn btn-danger ms-1" style="color:black"
									data-id="<?= $ruang['kodeR']; ?>">View</a>	
							</td>
						</tr>
					<?php endforeach; ?>
                </tbody>
            </table>
		</div>
	</div>
</div>

<?php foreach ($data['ruang'] as $ruang): ?>
<!-- Modal -->
<div class="modal fade" id="formModal_<?= $ruang['kodeR'] ?>" tabindex="-1" aria-labelledby="formModal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="formModalLabelR">Edit Data</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">

				<form action="<?= BASEURL; ?>/perekaman/editR" method="post" enctype="multipart/form-data">
					<div class="mb-3">
						<label for="kodeR" class="form-label">Kode Ruang</label>
						<input type="text" class="form-control" id="kodeR" name="kodeR" value="<?= $ruang['kodeR'] ?>" readonly>
					</div>
					<div class="mb-3">
						<label for="namaR" class="form-label">Nama Ruang</label>
						<input type="text" class="form-control" id="namaR" name="namaR">
					</div>
					<div class="mb-3">
						<label for="foto" class="form-label">Foto</label>
						<input type="file" class="form-control" id="foto" name="foto">
					</div>
			</div>
			<div class="modal-footer">
				<a href="<?=BASEURL;?>/perekaman/ruang"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></a>
				<button type="submit" class="btn btn-success">Simpan Perubahan</button>
				</form>
			</div>
		</div>
	</div>
</div>

<?php endforeach; ?>

<div class="modal fade" id="formModalTambah" tabindex="-1" aria-labelledby="formModal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="formModalLabelR">Tambah Data</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">

				<form action="<?= BASEURL; ?>/perekaman/tambahR" method="post" enctype="multipart/form-data">
					<div class="mb-3">
						<label for="kodeR" class="form-label">Kode Ruang</label>
						<input type="text" class="form-control" id="kodeR" name="kodeR">
					</div>
					<div class="mb-3">
						<label for="namaR" class="form-label">Nama Ruang</label>
						<input type="text" class="form-control" id="namaR" name="namaR">
					</div>
					<div class="mb-3">
						<label for="foto" class="form-label">Foto</label>
						<input type="file" class="form-control" id="foto" name="foto">
					</div>
			</div>
			<div class="modal-footer">
				<a href="<?=BASEURL;?>/perekaman/ruang"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></a>
				<button type="submit" class="btn btn-success">Tambah Data</button>
				</form>
			</div>
		</div>
	</div>
</div>
