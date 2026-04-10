<div style="display: flex; gap: 20px;">
    <div class="glass-panel" style="flex: 1; padding: 20px; align-self: flex-start;">
        <h3><i class="fa-solid fa-car-side"></i> Parkir Masuk</h3>
        <hr style="border:0; border-top:1px solid var(--border-color); margin: 15px 0;">
        <form action="<?= BASE_URL ?>/transaksi/masuk" method="POST">
            <div style="margin-bottom: 15px;">
                <label style="display:block; margin-bottom:5px; color:var(--text-muted);">Plat Nomor kendaraan</label>
                <input type="text" name="plat_nomor" required style="width:100%; padding:10px; background:rgba(0,0,0,0.2); border:1px solid var(--border-color); color:#fff; border-radius:5px; text-transform:uppercase;">
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display:block; margin-bottom:5px; color:var(--text-muted);">Jenis Kendaraan</label>
                <select name="jenis_kendaraan" required style="width:100%; padding:10px; background:rgba(0,0,0,0.2); border:1px solid var(--border-color); color:#fff; border-radius:5px;">
                    <option value="motor" style="background:#1e293b;">Motor</option>
                    <option value="mobil" style="background:#1e293b;">Mobil</option>
                    <option value="lainnya" style="background:#1e293b;">Lainnya</option>
                </select>
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display:block; margin-bottom:5px; color:var(--text-muted);">Area Parkir (Tersedia)</label>
                <select name="id_area" required style="width:100%; padding:10px; background:rgba(0,0,0,0.2); border:1px solid var(--border-color); color:#fff; border-radius:5px;">
                    <?php foreach($data['area'] as $a): ?>
                        <option value="<?= $a['id_area'] ?>" style="background:#1e293b;"><?= htmlspecialchars($a['nama_area']) ?> (Tersedia: <?= $a['kapasitas'] - $a['terisi'] ?>)</option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display:block; margin-bottom:5px; color:var(--text-muted);">Warna</label>
                <input type="text" name="warna" style="width:100%; padding:10px; background:rgba(0,0,0,0.2); border:1px solid var(--border-color); color:#fff; border-radius:5px;">
            </div>
            <div style="margin-bottom: 25px;">
                <label style="display:block; margin-bottom:5px; color:var(--text-muted);">Pemilik</label>
                <input type="text" name="pemilik" style="width:100%; padding:10px; background:rgba(0,0,0,0.2); border:1px solid var(--border-color); color:#fff; border-radius:5px;">
            </div>
            <button type="submit" class="btn-primary btn-block"><i class="fa-solid fa-right-to-bracket"></i> Proses Masuk</button>
        </form>
    </div>

    <div style="flex: 2;">
        <h3><i class="fa-solid fa-list"></i> Kendaraan Aktif (Belum Keluar)</h3>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Plat Nomor</th>
                        <th>Jenis</th>
                        <th>Area</th>
                        <th>Waktu Masuk</th>
                        <th>Aksi Keluar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($data['active']) == 0): ?><tr><td colspan="5" style="text-align:center;">Kosong</td></tr><?php endif; ?>
                    <?php foreach($data['active'] as $trx): ?>
                    <tr>
                        <td style="font-weight:bold; font-size:1.1rem;"><?= htmlspecialchars($trx['plat_nomor']) ?></td>
                        <td><?= ucfirst($trx['jenis']) ?></td>
                        <td><?= htmlspecialchars($trx['nama_area']) ?></td>
                        <td><?= $trx['waktu_masuk'] ?></td>
                        <td>
                            <a href="<?= BASE_URL ?>/transaksi/keluar/<?= $trx['id_parkir'] ?>" class="btn-primary" style="background:var(--success); padding:8px 12px; font-size:0.85rem;" onclick="return confirm('Pilih ini untuk mengeluarkan kendaraan plat <?= htmlspecialchars($trx['plat_nomor']) ?>?');">
                                <i class="fa-solid fa-money-bill-wave"></i> Bayar & Keluar
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
