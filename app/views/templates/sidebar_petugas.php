<div class="dashboard-wrapper">
    <aside class="sidebar">
        <div class="sidebar-header">
            <h3>Sistem <span>Parkir</span></h3>
        </div>
        <ul class="sidebar-menu">
            <li><a href="<?= BASE_URL ?>/petugas"><i class="fa-solid fa-gauge"></i> Dashboard</a></li>
            <li><a href="<?= BASE_URL ?>/transaksi"><i class="fa-solid fa-car"></i> Transaksi Parkir</a></li>
            <li><a href="<?= BASE_URL ?>/auth/logout" class="text-danger"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
        </ul>
    </aside>
    <main class="main-content">
        <header class="topbar">
            <div class="user-info">
                <span>Welcome, <strong><?= htmlspecialchars($_SESSION['user_parkir']['nama_lengkap']) ?></strong></span>
                <span class="badge" style="background: var(--warning); color: #000;"><?= ucfirst($_SESSION['user_parkir']['role']) ?></span>
            </div>
        </header>
        <div class="content">
