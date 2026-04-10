<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom: 25px;">
    <div>
        <h2 style="font-size: 1.8rem;">Tugas Operasional</h2>
        <p style="color:var(--text-muted);">Halo, <strong><?= htmlspecialchars($_SESSION['user_parkir']['nama_lengkap']) ?></strong>. Semangat bekerja melayani pengunjung hari ini!</p>
    </div>
    <div>
        <a href="<?= BASE_URL ?>/transaksi" class="btn-primary" style="font-size:1.1rem; padding: 15px 30px;"><i class="fa-solid fa-car-side"></i> Buka Layanan Transaksi</a>
    </div>
</div>

<div class="stats-grid">
    <div class="stat-card orange">
        <i class="fa-solid fa-car-on stat-icon"></i>
        <div class="stat-details">
            <h4>Kendaraan Masih Terparkir</h4>
            <h2><?= $data['kendaraan_aktif'] ?> <span style="font-size:1rem; color:var(--text-muted); font-weight:400;">unit</span></h2>
        </div>
    </div>
    <div class="stat-card purple">
        <i class="fa-solid fa-chart-pie stat-icon"></i>
        <div class="stat-details">
            <h4>Ruang Parkir Tersisa (Total)</h4>
            <h2><?= $data['kapasitas'] - $data['terisi'] ?> <span style="font-size:1rem; color:var(--text-muted); font-weight:400;">slot area</span></h2>
        </div>
    </div>
</div>

<div class="glass-panel" style="padding: 25px; margin-top: 30px;">
    <h3 style="margin-bottom:20px; border-bottom:1px solid rgba(255,255,255,0.1); padding-bottom:15px;">
        <i class="fa-solid fa-bullhorn" style="color:var(--primary); margin-right:10px;"></i>
        Panduan Transaksi Parkir
    </h3>
    <div style="display:flex; gap:20px;">
        <div style="flex:1; background:rgba(0,0,0,0.3); padding:20px; border-radius:12px; border-left:4px solid var(--primary);">
            <h4 style="margin-bottom:10px;"><i class="fa-solid fa-1"></i> Kendaraan Masuk</h4>
            <p style="color:var(--text-muted); font-size:0.95rem; line-height: 1.6;">Arahkan pelanggan dengan sopan. Buka Transaksi Parkir, isi form Pelat Nomor, Kendaraan, dan Titik Area. Jika itu adalah pelanggan lama, sistem akan meng-autocomplete informasi kendaraan secara otomatis.</p>
        </div>
        <div style="flex:1; background:rgba(0,0,0,0.3); padding:20px; border-radius:12px; border-left:4px solid var(--warning);">
            <h4 style="margin-bottom:10px;"><i class="fa-solid fa-2"></i> Kendaraan Keluar</h4>
            <p style="color:var(--text-muted); font-size:0.95rem; line-height: 1.6;">Klik menu 'Tandai Keluar' pada data terkait. Tagihan (beserta pengalian per-jamnya) dihitung dari server secara murni tanpa rekayasa. Ambil uang sesuai tagihan, baru klik Cetak Struk dan serahkan ke pelanggan!</p>
        </div>
    </div>
</div>
