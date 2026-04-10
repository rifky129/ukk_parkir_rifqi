<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom: 25px;">
    <div>
        <h2 style="font-size: 1.8rem;">Executive Summary</h2>
        <p style="color:var(--text-muted);">Selamat datang, Owner <strong><?= htmlspecialchars($_SESSION['user_parkir']['nama_lengkap']) ?></strong>.</p>
    </div>
</div>

<div class="stats-grid">
    <div class="stat-card green">
        <i class="fa-solid fa-coins stat-icon"></i>
        <div class="stat-details">
            <h4>Pendapatan Hari Ini</h4>
            <h2>Rp <?= number_format($data['pendapatan_hari_ini'], 0, ',', '.') ?></h2>
        </div>
    </div>
    <div class="stat-card">
        <i class="fa-solid fa-wallet stat-icon"></i>
        <div class="stat-details">
            <h4>Pendapatan Bulan Ini</h4>
            <h2>Rp <?= number_format($data['pendapatan_bulan_ini'], 0, ',', '.') ?></h2>
        </div>
    </div>
    <div class="stat-card purple">
        <i class="fa-solid fa-receipt stat-icon"></i>
        <div class="stat-details">
            <h4>Transaksi Parkir Selesai (Hari ini)</h4>
            <h2><?= $data['transaksi_hari_ini'] ?> <span style="font-size:1rem; color:var(--text-muted); font-weight:400;">unit</span></h2>
        </div>
    </div>
</div>

<div class="glass-panel" style="padding: 40px; margin-top:20px; text-align:center; background: linear-gradient(135deg, rgba(34, 197, 94, 0.1) 0%, rgba(99, 102, 241, 0.1) 100%), var(--panel-bg);">
    <i class="fa-solid fa-file-invoice-dollar" style="font-size: 4rem; margin-bottom: 20px; color: var(--success); opacity:0.8;"></i>
    <h3 style="margin-bottom:15px; font-size: 1.5rem;">Analitik Transaksi & Laporan Laba Rugi</h3>
    <p style="color:var(--text-muted); font-size:1.1rem; line-height:1.6; max-width: 600px; margin: 0 auto 30px;">
        Evaluasi performa operasional parkir tanpa perlu repot berhitung. Tarik laporan terperinci sesuai rentang tanggal yang kepingin Anda telusuri, dan biarkan sistem mengkalkulasi semuanya untuk Anda.
    </p>
    <a href="<?= BASE_URL ?>/laporan" class="btn-primary" style="background:var(--success); font-size:1.1rem; padding: 12px 30px;"><i class="fa-solid fa-magnifying-glass-chart"></i> Muat & Buka Rekap Laporan</a>
</div>
