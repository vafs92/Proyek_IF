<style>
	body {
		background: url('<?= BASEURL; ?> /img/Home.jpg') no-repeat center center fixed;
		background-size: cover;
	}

	h3 {
		font-weight: bold;
	}

	table {
		text-align: center;
	}
</style>

<div class="container mt-3">

	<div class="row mb-3">
		<div class="col-lg-6">
			<form action="<?= BASEURL; ?>/perekaman/caritabelB" method="POST">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="cari barang..." name="keyword" id="keyword" autocomplete="off">
					<div class="input-group-append">
						<button class="btn btn-primary" type="submit" id="tombolCari">Search</button>
					</div>
				</div>
			</form>
		</div>

	</div>
	<div class="row">
		<div class="col-lg-12">

			<h3>Daftar Barang :</h3>

			<table class = "table table-striped table-light">
                    <thead>
                        <tr>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
							<th>Foto</th>
                        </tr>
                    </thead>	
                    <tbody>
                        <?php foreach ($data['barang'] as $barang) : ?>
                            <tr>
                                <td><?= $barang['kodeB'] ?></td>
                                <td><?= $barang['namaB'] ?></td>
								<td>
								<a href="<?= BASEURL; ?>/detail/showTB/<?= $barang['kodeB']; ?>"
									class="btn btn-danger ms-1" style="color:black"
									data-id="<?= $barang['kodeB']; ?>">View</a>	</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
		</div>
	</div>
</div>

