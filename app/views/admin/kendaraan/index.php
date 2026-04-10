<div style="margin-bottom: 20px;">
    <h2>Data Kendaraan Terdaftar</h2>
    <p style="color:var(--text-muted);">Data ini dibuat otomatis saat Petugas menginput kendaraan masuk yang baru.</p>
</div>

<div class="table-container">
    <table>
        <thead>
            <tr><th>No</th><th>Plat Nomor</th><th>Jenis</th><th>Warna</th><th>Pemilik</th><th>Aksi</th></tr>
        </thead>
        <tbody>
            <?php $i = 1; foreach($data['kendaraan'] as $k): ?>
            <tr>
                <td><?= $i++ ?></td>
                <td style="font-weight:bold;"><?= htmlspecialchars($k['plat_nomor']) ?></td>
                <td><?= ucfirst($k['jenis_kendaraan']) ?></td>
                <td><?= htmlspecialchars($k['warna']) ?></td>
                <td><?= htmlspecialchars($k['pemilik']) ?></td>
                <td>
                    <a href="<?= BASE_URL ?>/kendaraan/hapus/<?= $k['id_kendaraan'] ?>" class="btn-primary" style="background:var(--danger); padding:5px 10px; font-size:0.8rem;" onclick="return confirm('Menghapus kendaraan akan mempengaruhi history transaksi, Yakin?');"><i class="fa-solid fa-trash"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
