<div style="margin-bottom: 20px;">
    <h2>Log Aktifitas</h2>
    <p style="color:var(--text-muted);">Riwayat seluruh aktifitas terbaru sistem.</p>
</div>

<div class="table-container">
    <table>
        <thead>
            <tr><th>No</th><th>Waktu</th><th>Username</th><th>Nama Lengkap</th><th>Aktivitas</th></tr>
        </thead>
        <tbody>
            <?php $i = 1; foreach($data['logs'] as $l): ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $l['waktu_aktivitas'] ?></td>
                <td><strong><?= htmlspecialchars($l['username'] ?? 'TIDAK DIKETAHUI') ?></strong></td>
                <td><?= htmlspecialchars($l['nama_lengkap'] ?? '-') ?></td>
                <td><?= htmlspecialchars($l['aktivitas']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
