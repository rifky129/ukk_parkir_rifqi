<div class="login-wrapper">
    <div class="login-container glass-panel">
        <div class="login-header">
            <div class="icon-car">
                <i class="fa-solid fa-user-plus"></i>
            </div>
            <h2>Sistem <span>Parkir</span></h2>
            <p>Buat akun baru</p>
        </div>
        
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger" style="margin-bottom: 15px;">
                <?= $_SESSION['error'] ?>
            </div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <form action="<?= BASE_URL ?>/auth/proses_register" method="POST" class="login-form">
            <div class="input-group">
                <label for="nama_lengkap"><i class="fa-solid fa-id-card"></i> Nama Lengkap</label>
                <input type="text" id="nama_lengkap" name="nama_lengkap" required autocomplete="off">
            </div>
            <div class="input-group">
                <label for="username"><i class="fa-solid fa-user"></i> Username</label>
                <input type="text" id="username" name="username" required autocomplete="off">
            </div>
            <div class="input-group">
                <label for="password"><i class="fa-solid fa-lock"></i> Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn-primary btn-block" style="background:var(--secondary); color:#fff; border:none; margin-top:20px;">Daftar Akun <i class="fa-solid fa-check"></i></button>
        </form>

        <div style="text-align: center; margin-top: 20px;">
            <p style="color: var(--text-muted); font-size: 0.9rem;">
                Sudah punya akun? <a href="<?= BASE_URL ?>/auth/index" style="color: var(--secondary); text-decoration: none; font-weight: 600;">Login di sini</a>
            </p>
        </div>
    </div>
</div>
