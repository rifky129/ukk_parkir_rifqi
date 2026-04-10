<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom: 25px;">
    <div>
        <h2 style="font-size: 1.8rem;">Dashboard Admin</h2>
        <p style="color:var(--text-muted);">Informasi ringkas real-time dari sistem manajemen parkir Anda.</p>
    </div>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <i class="fa-solid fa-users stat-icon"></i>
        <div class="stat-details">
            <h4>Total Pengguna</h4>
            <h2><?= $data['total_users'] ?></h2>
        </div>
    </div>
    <div class="stat-card green">
        <i class="fa-solid fa-rupiah-sign stat-icon"></i>
        <div class="stat-details">
            <h4>Total Pendapatan</h4>
            <h2>Rp <?= number_format($data['total_pendapatan'], 0, ',', '.') ?></h2>
        </div>
    </div>
    <div class="stat-card orange">
        <i class="fa-solid fa-car stat-icon"></i>
        <div class="stat-details">
            <h4>Kapasitas Terisi</h4>
            <h2><?= $data['terisi'] ?> <span style="font-size:1rem; color:var(--text-muted); font-weight:400;">/ <?= $data['kapasitas'] ?></span></h2>
        </div>
    </div>
    <div class="stat-card purple">
        <i class="fa-solid fa-clock stat-icon"></i>
        <div class="stat-details">
            <h4>Kendaraan Aktif</h4>
            <h2><?= $data['kendaraan_aktif'] ?></h2>
        </div>
    </div>
</div>

<div style="display: grid; grid-template-columns: 2fr 1fr; gap: 20px;">
    <div class="glass-panel" style="padding: 25px;">
        <h3 style="margin-bottom:15px; border-bottom:1px solid rgba(255,255,255,0.1); padding-bottom:15px;">
            <i class="fa-solid fa-chart-line" style="color:var(--primary); margin-right:10px;"></i>
            Statistik Cepat
        </h3>
        <p style="color:var(--text-muted); line-height:1.8;">
            Aplikasi ini terhubung dengan basis database langsung (Real-time).<br>
            - Tingkat Pengisian Parkir secara keseluruhan saat ini: 
            <strong style="color: <?= ($data['kapasitas'] > 0 && ($data['terisi']/$data['kapasitas']) > 0.8) ? 'var(--danger)' : 'var(--success)' ?>;">
                <?= $data['kapasitas'] > 0 ? round(($data['terisi']/$data['kapasitas']) * 100) : 0 ?>%
            </strong><br>
            Pastikan untuk selalu memonitor master data "Log Aktifitas" secara berkala untuk me-review operasional aplikasi.
        </p>
    </div>
    <div class="glass-panel" style="padding: 25px; background: linear-gradient(to bottom right, rgba(99,102,241,0.1), rgba(0,0,0,0));">
        <h3 style="margin-bottom:15px;"><i class="fa-solid fa-bolt" style="color:#eab308; margin-right:10px;"></i> Akses Cepat</h3>
        <ul style="list-style:none;">
            <li style="margin-bottom:10px;"><a href="<?= BASE_URL ?>/tarif" class="btn-primary" style="width:100%;"><i class="fa-solid fa-money-bill"></i>Kelola Tarif</a></li>
            <li style="margin-bottom:10px;"><a href="<?= BASE_URL ?>/area" class="btn-primary" style="width:100%;"><i class="fa-solid fa-map-location-dot"></i> Kelola Area</a></li>
        </ul>
    </div>
</div>
