<div style="max-width: 400px; margin: 40px auto; background: #fff; color: #000; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); font-family: monospace;">
    <div style="text-align: center; border-bottom: 2px dashed #000; padding-bottom: 10px; margin-bottom: 10px;">
        <h2 style="margin: 0; font-size: 1.5rem;">STRUK PARKIR</h2>
        <p style="margin: 5px 0 0 0;">ID Transaksi: #TRX-<?= str_pad($data['trx']['id_parkir'], 5, '0', STR_PAD_LEFT) ?></p>
    </div>
    
    <div style="margin-bottom: 15px;">
        <p style="margin: 5px 0;"><strong>Plat Nomor :</strong> <?= htmlspecialchars($data['trx']['plat_nomor']) ?></p>
        <p style="margin: 5px 0;"><strong>Jenis      :</strong> <?= ucfirst($data['trx']['jenis']) ?></p>
        <p style="margin: 5px 0;"><strong>Area       :</strong> <?= htmlspecialchars($data['trx']['nama_area']) ?></p>
        <p style="margin: 5px 0;"><strong>Waktu Masuk:</strong> <?= $data['trx']['waktu_masuk'] ?></p>
        <p style="margin: 5px 0;"><strong>Waktu Keluar:</strong> <?= $data['trx']['waktu_keluar'] ?></p>
        <p style="margin: 5px 0;"><strong>Durasi     :</strong> <?= $data['trx']['durasi_jam'] ?> Jam (Rp <?= number_format($data['trx']['tarif_per_jam'], 0, ',', '.') ?>/jam)</p>
    </div>
    
    <div style="border-top: 2px dashed #000; padding-top: 10px; text-align: right; font-size: 1.2rem; font-weight: bold;">
        TOTAL: Rp <?= number_format($data['trx']['biaya_total'], 0, ',', '.') ?>
    </div>
    
    <div style="text-align: center; margin-top: 20px; color: #666; font-size: 0.8rem;">
        <p>Petugas: <?= htmlspecialchars($data['trx']['nama_petugas']) ?></p>
        <p>Terima kasih telah menggunakan fasilitas kami.</p>
    </div>
    
    <div style="text-align: center; margin-top: 20px;" class="hide-print">
        <button onclick="window.print()" class="btn-primary" style="margin-right: 10px; color:#fff; border:none; padding:10px 20px; border-radius:5px;"><i class="fa-solid fa-print"></i> Cetak</button>
        <a href="<?= BASE_URL ?>/transaksi" class="btn-primary" style="background: #333; color:#fff; text-decoration:none; padding:10px 20px; border-radius:5px;"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
    </div>
</div>

<style>
body { background: #e2e8f0; } /* Simple bg for struk display */
@media print {
    body { background: #fff; }
    .hide-print { display: none !important; }
}
</style>
