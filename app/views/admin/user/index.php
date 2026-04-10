<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <h2>Kelola User</h2>
    <button class="btn-primary" onclick="document.getElementById('formUser').style.display='block'; window.scrollTo(0,0);">
        <i class="fa-solid fa-plus"></i> Tambah User
    </button>
</div>

<div id="formUser" class="form-section glass-panel" style="display: none;">
    <h3><i class="fa-solid fa-user-plus"></i> Form Tambah User</h3>
    <form action="<?= BASE_URL ?>/user/tambah" method="POST" style="margin-top: 15px;">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
            <div>
                <label style="display:block; margin-bottom:5px; color:var(--text-muted);">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" required style="width:100%; padding:10px; border-radius:5px; background:rgba(0,0,0,0.2); border:1px solid var(--border-color); color:#fff;">
            </div>
            <div>
                <label style="display:block; margin-bottom:5px; color:var(--text-muted);">Username</label>
                <input type="text" name="username" required style="width:100%; padding:10px; border-radius:5px; background:rgba(0,0,0,0.2); border:1px solid var(--border-color); color:#fff;">
            </div>
            <div>
                <label style="display:block; margin-bottom:5px; color:var(--text-muted);">Password</label>
                <input type="password" name="password" required style="width:100%; padding:10px; border-radius:5px; background:rgba(0,0,0,0.2); border:1px solid var(--border-color); color:#fff;">
            </div>
            <div>
                <label style="display:block; margin-bottom:5px; color:var(--text-muted);">Role</label>
                <select name="role" required style="width:100%; padding:10px; border-radius:5px; background:rgba(0,0,0,0.2); border:1px solid var(--border-color); color:#fff;">
                    <option value="admin" style="background:#1e293b;">Admin</option>
                    <option value="petugas" style="background:#1e293b;">Petugas</option>
                    <option value="owner" style="background:#1e293b;">Owner</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn-primary">Simpan User</button>
        <button type="button" class="btn-primary" style="background:var(--danger)" onclick="document.getElementById('formUser').style.display='none'">Batal</button>
    </form>
</div>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>No</th><th>Nama Lengkap</th><th>Username</th><th>Role</th><th>Status</th><th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; foreach($data['users'] as $u): ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= htmlspecialchars($u['nama_lengkap']) ?></td>
                <td><?= htmlspecialchars($u['username']) ?></td>
                <td><span class="badge"><?= ucfirst($u['role']) ?></span></td>
                <td><?= $u['status_aktif'] ? '<span class="badge" style="background:var(--success)">Aktif</span>' : '<span class="badge" style="background:var(--danger)">Non-aktif</span>' ?></td>
                <td>
                    <?php if($u['id_user'] != $_SESSION['user_parkir']['id_user']): ?>
                    <a href="<?= BASE_URL ?>/user/hapus/<?= $u['id_user'] ?>" class="btn-primary" style="background:var(--danger); padding:5px 10px; font-size:0.8rem;" onclick="return confirm('Yakin hapus?');"><i class="fa-solid fa-trash"></i></a>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
