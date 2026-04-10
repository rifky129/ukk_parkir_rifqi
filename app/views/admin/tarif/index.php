<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <h2>Kelola Tarif Parkir</h2>
    <button class="btn-primary" onclick="document.getElementById('formTarif').style.display='block'; document.getElementById('formEditTarif').style.display='none'; window.scrollTo(0,0);">
        <i class="fa-solid fa-plus"></i> Tambah Tarif
    </button>
</div>

<!-- Add Form -->
<div id="formTarif" class="form-section glass-panel" style="display: none;">
    <h3><i class="fa-solid fa-money-bill"></i> Form Tambah Tarif</h3>
    <form action="<?= BASE_URL ?>/tarif/tambah" method="POST" style="margin-top: 15px;">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
            <div>
                <label style="display:block; margin-bottom:5px; color:var(--text-muted);">Jenis Kendaraan</label>
                <select name="jenis_kendaraan" required style="width:100%; padding:10px; border-radius:5px; background:rgba(0,0,0,0.2); border:1px solid var(--border-color); color:#fff;">
                    <option value="motor" style="background:#1e293b;">Motor</option>
                    <option value="mobil" style="background:#1e293b;">Mobil</option>
                    <option value="lainnya" style="background:#1e293b;">Lainnya</option>
                </select>
            </div>
            <div>
                <label style="display:block; margin-bottom:5px; color:var(--text-muted);">Tarif per Jam (Rp)</label>
                <input type="number" name="tarif_per_jam" required style="width:100%; padding:10px; border-radius:5px; background:rgba(0,0,0,0.2); border:1px solid var(--border-color); color:#fff;">
            </div>
        </div>
        <button type="submit" class="btn-primary">Simpan Tarif</button>
        <button type="button" class="btn-primary" style="background:var(--danger)" onclick="document.getElementById('formTarif').style.display='none'">Batal</button>
    </form>
</div>

<!-- Edit Form -->
<div id="formEditTarif" class="form-section glass-panel" style="display: none;">
    <h3><i class="fa-solid fa-edit"></i> Form Ubah Tarif (<span id="editJenisLabel"></span>)</h3>
    <form action="<?= BASE_URL ?>/tarif/ubah" method="POST" style="margin-top: 15px;">
        <input type="hidden" name="id_tarif" id="edit_id_tarif">
        <input type="hidden" name="jenis_kendaraan" id="edit_jenis_kendaraan">
        <div style="display: grid; grid-template-columns: 1fr; gap: 15px; margin-bottom: 15px;">
            <div>
                <label style="display:block; margin-bottom:5px; color:var(--text-muted);">Tarif per Jam Baru (Rp)</label>
                <input type="number" name="tarif_per_jam" id="edit_tarif_per_jam" required style="width:100%; padding:10px; border-radius:5px; background:rgba(0,0,0,0.2); border:1px solid var(--border-color); color:#fff;">
            </div>
        </div>
        <button type="submit" class="btn-primary" style="background:var(--success)">Update Tarif</button>
        <button type="button" class="btn-primary" style="background:var(--danger)" onclick="document.getElementById('formEditTarif').style.display='none'">Batal</button>
    </form>
</div>

<div class="table-container">
    <table>
        <thead>
            <tr><th>No</th><th>Jenis Kendaraan</th><th>Tarif per Jam</th><th>Aksi</th></tr>
        </thead>
        <tbody>
            <?php $i = 1; foreach($data['tarif'] as $t): ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= ucfirst($t['jenis_kendaraan']) ?></td>
                <td>Rp <?= number_format($t['tarif_per_jam'], 0, ',', '.') ?></td>
                <td>
                    <button class="btn-primary" style="background:var(--warning); color:#000; padding:5px 10px; font-size:0.8rem; border:none; cursor:pointer;" onclick="appEditTarif(<?= $t['id_tarif'] ?>, '<?= $t['jenis_kendaraan'] ?>', <?= $t['tarif_per_jam'] ?>)"><i class="fa-solid fa-pencil"></i></button>
                    <a href="<?= BASE_URL ?>/tarif/hapus/<?= $t['id_tarif'] ?>" class="btn-primary" style="background:var(--danger); padding:5px 10px; font-size:0.8rem;" onclick="return confirm('Yakin hapus?');"><i class="fa-solid fa-trash"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
function appEditTarif(id, jenis, tarif) {
    document.getElementById('formTarif').style.display = 'none';
    document.getElementById('formEditTarif').style.display = 'block';
    
    document.getElementById('edit_id_tarif').value = id;
    document.getElementById('edit_jenis_kendaraan').value = jenis;
    document.getElementById('editJenisLabel').innerText = jenis.toUpperCase();
    document.getElementById('edit_tarif_per_jam').value = tarif;
    
    window.scrollTo(0,0);
}
</script>
