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
    <h3>Data Pinjam ruang</h3>

    <table class ="table table-striped table-light">
        <thead>
            <tr>
                <th>Kode Pinjam</th>
                <th>Tanggal Pinjam</th>
                <th>Kode ruang</th>
                <th>Nama ruang</th>
                <th>Jam Pinjam</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['items_ruang'] as $item) : ?>
                <tr>
                    <td><?= $item['kodeP_ruang'] ?></td>
                    <td><?= $item['tanggalP_ruang'] ?></td>
                    <td><?= $item['kodeR'] ?></td>
                    <td><?= $item['namaR'] ?></td>
                    <td><?= $item['jamP_ruang'] ?></td>
                    <td><?= $item['statusP_ruang'] ?></td>
                    <td>
						<a href="<?= BASEURL; ?>/permintaan/hapusB/<?= $item['kodeP_ruang']; ?>/<?= $item['kodeR']; ?>/<?= $item['jamP_ruang']; ?>" class="badge badge-danger float-end ms-1" style="color:black" onclick="return confirm('yakin?')">hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
