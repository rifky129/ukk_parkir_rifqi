<div class="glass-panel" style="padding: 20px; margin-bottom: 20px;">
    <h3>Filter Data Transaksi</h3>
    <form method="GET" action="<?= BASE_URL ?>/laporan" style="display: flex; gap: 15px; align-items: flex-end; margin-top: 15px;">
        <div>
            <label style="display:block; margin-bottom:5px; color:var(--text-muted);">Mulai Tanggal</label>
            <input type="date" name="start" value="<?= htmlspecialchars($data['start']) ?>" required style="padding:10px; background:rgba(0,0,0,0.2); border:1px solid var(--border-color); color:#fff; border-radius:5px; color-scheme: dark;">
        </div>
        <div>
            <label style="display:block; margin-bottom:5px; color:var(--text-muted);">Sampai Tanggal</label>
            <input type="date" name="end" value="<?= htmlspecialchars($data['end']) ?>" required style="padding:10px; background:rgba(0,0,0,0.2); border:1px solid var(--border-color); color:#fff; border-radius:5px; color-scheme: dark;">
        </div>
        <button type="submit" class="btn-primary"><i class="fa-solid fa-filter"></i> Tampilkan Rekap</button>
    </form>
</div>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Plat Nomor</th>
                <th>Jenis</th>
                <th>Waktu Masuk</th>
                <th>Waktu Keluar</th>
                <th>Durasi (Jam)</th>
                <th>Biaya Total</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $i = 1; 
                $grandTotal = 0;
                if(count($data['laporan']) == 0): 
            ?>
            <tr><td colspan="7" style="text-align:center;">Tidak ada data laporan di rentang tanggal ini.</td></tr>
            <?php endif; ?>
            
            <?php foreach($data['laporan'] as $trx): 
                $grandTotal += $trx['biaya_total'];
            ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><strong><?= htmlspecialchars($trx['plat_nomor']) ?></strong></td>
                <td><?= ucfirst($trx['jenis_kendaraan']) ?></td>
                <td><?= $trx['waktu_masuk'] ?></td>
                <td><?= $trx['waktu_keluar'] ?></td>
                <td><?= $trx['durasi_jam'] ?></td>
                <td>Rp <?= number_format($trx['biaya_total'], 0, ',', '.') ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <?php if(count($data['laporan']) > 0): ?>
        <tfoot>
            <tr style="background: rgba(0,0,0,0.3);">
                <th colspan="6" style="text-align: right; color: #fff;">GRAND TOTAL PENDAPATAN:</th>
                <th style="color: var(--success); font-size: 1.2rem;">Rp <?= number_format($grandTotal, 0, ',', '.') ?></th>
            </tr>
        </tfoot>
        <?php endif; ?>
    </table>
</div>
