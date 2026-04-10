<div class="dashboard-wrapper">
    <aside class="sidebar">
        <div class="sidebar-header">
            <h3>Sistem <span>Parkir</span></h3>
        </div>
        <ul class="sidebar-menu">
            <li><a href="<?= BASE_URL ?>/admin"><i class="fa-solid fa-gauge"></i> Dashboard</a></li>
            <li><a href="<?= BASE_URL ?>/user"><i class="fa-solid fa-users"></i> Kelola User</a></li>
            <li><a href="<?= BASE_URL ?>/tarif"><i class="fa-solid fa-money-bill"></i> Tarif Parkir</a></li>
            <li><a href="<?= BASE_URL ?>/area"><i class="fa-solid fa-map-location-dot"></i> Area Parkir</a></li>
            <li><a href="<?= BASE_URL ?>/kendaraan"><i class="fa-solid fa-car"></i> Data Kendaraan</a></li>
            <li><a href="<?= BASE_URL ?>/log"><i class="fa-solid fa-clock-rotate-left"></i> Log Aktifitas</a></li>
            <li><a href="<?= BASE_URL ?>/auth/logout" class="text-danger"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
        </ul>
    </aside>
    <main class="main-content">
        <header class="topbar">
            <div class="user-info">
                <span>Welcome, <strong><?= htmlspecialchars($_SESSION['user_parkir']['nama_lengkap']) ?></strong></span>
                <span class="badge"><?= ucfirst($_SESSION['user_parkir']['role']) ?></span>
            </div>
        </header>
        <div class="content">
