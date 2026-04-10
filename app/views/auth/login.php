<div class="login-wrapper">
    <div class="login-container glass-panel">
        <div class="login-header">
            <div class="icon-car">
                <i class="fa-solid fa-car-side"></i>
            </div>
            <h2>Sistem <span>Parkir</span></h2>
            <p>Silakan masuk ke akun Anda</p>
        </div>
        
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger">
                <?= $_SESSION['error'] ?>
            </div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <form action="<?= BASE_URL ?>/auth/login" method="POST" class="login-form">
            <div class="input-group">
                <label for="username"><i class="fa-solid fa-user"></i> Username</label>
                <input type="text" id="username" name="username" required autocomplete="off">
            </div>
            <div class="input-group">
                <label for="password"><i class="fa-solid fa-lock"></i> Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn-primary btn-block">Log In <i class="fa-solid fa-arrow-right-to-bracket"></i></button>
        </form>
    </div>
</div>
