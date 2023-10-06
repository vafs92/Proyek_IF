<style>
        body {
            background: url('<?= BASEURL; ?> /img/Home.jpg') no-repeat center center fixed;
            background-size: cover;
        }
		table{
			text-align: center;
            
		}
        h3{
            font-weight: bold;
        }
        label{
            font-weight: bold;
        }
        
</style>

<div class="container">
    <h3>Data Pinjam barang</h3>

    <table class ="table table-striped table-light">
        <thead>
            <tr>
                <th>Kode Pinjam</th>
                <th>Tanggal Pinjam</th>
                <th>Kode barang</th>
                <th>Nama barang</th>
                <th>Jam Pinjam</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['items_barang'] as $item) : ?>
                <tr>
                    <td><?= $item['kodeP_barang'] ?></td>
                    <td><?= $item['tanggalP_barang'] ?></td>
                    <td><?= $item['kodeB'] ?></td>
                    <td><?= $item['namaB'] ?></td>
                    <td><?= $item['jamP_barang'] ?></td>
                    <td><?= $item['statusP_barang'] ?></td>
                    <td>
						<a href="<?= BASEURL; ?>/permintaan/hapusB/<?= $item['kodeP_barang']; ?>/<?= $item['kodeB']; ?>/<?= $item['jamP_barang']; ?>" class="badge badge-danger float-end ms-1" style="color:black" onclick="return confirm('yakin?')">hapus</a>
                        
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
