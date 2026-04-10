<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <h2>Kelola Area Parkir</h2>
    <button class="btn-primary" onclick="document.getElementById('formArea').style.display='block'; window.scrollTo(0,0);">
        <i class="fa-solid fa-plus"></i> Tambah Area
    </button>
</div>

<div id="formArea" class="form-section glass-panel" style="display: none;">
    <h3><i class="fa-solid fa-map-location-dot"></i> Form Tambah Area</h3>
    <form action="<?= BASE_URL ?>/area/tambah" method="POST" style="margin-top: 15px;">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
            <div>
                <label style="display:block; margin-bottom:5px; color:var(--text-muted);">Nama Area</label>
                <input type="text" name="nama_area" required style="width:100%; padding:10px; border-radius:5px; background:rgba(0,0,0,0.2); border:1px solid var(--border-color); color:#fff;">
            </div>
            <div>
                <label style="display:block; margin-bottom:5px; color:var(--text-muted);">Kapasitas Area</label>
                <input type="number" name="kapasitas" required style="width:100%; padding:10px; border-radius:5px; background:rgba(0,0,0,0.2); border:1px solid var(--border-color); color:#fff;">
            </div>
        </div>
        <button type="submit" class="btn-primary">Simpan Area</button>
        <button type="button" class="btn-primary" style="background:var(--danger)" onclick="document.getElementById('formArea').style.display='none'">Batal</button>
    </form>
</div>

<div class="table-container">
    <table>
        <thead>
            <tr><th>No</th><th>Nama Area</th><th>Kapasitas Total</th><th>Kendaraan Terisi</th><th>Ruang Tersedia</th><th>Aksi</th></tr>
        </thead>
        <tbody>
            <?php $i = 1; foreach($data['area'] as $a): ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= htmlspecialchars($a['nama_area']) ?></td>
                <td><?= $a['kapasitas'] ?></td>
                <td><?= $a['terisi'] ?></td>
                <td style="<?= ($a['kapasitas'] - $a['terisi'] <= 0) ? 'color:var(--danger);font-weight:bold;' : 'color:var(--success);' ?>"><?= $a['kapasitas'] - $a['terisi'] ?></td>
                <td>
                    <a href="<?= BASE_URL ?>/area/hapus/<?= $a['id_area'] ?>" class="btn-primary" style="background:var(--danger); padding:5px 10px; font-size:0.8rem;" onclick="return confirm('Yakin hapus?');"><i class="fa-solid fa-trash"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
