<?php
// Dapatkan path saat ini
$current_page = basename($_SERVER['REQUEST_URI']);
?>

<nav id="navmenu" class="navmenu">
    <ul>
        <li><a href="index.php" class="<?= $current_page === 'index.php' ? 'active' : '' ?>">Home</a></li>
        <li><a href="portfolio.php" class="<?= $current_page === 'portfolio.php' ? 'active' : '' ?>">Portfolio</a></li>
        <li class="dropdown">
            <a href="#"><span>Addons</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
                <li><a href="portfolio_add.php" class="<?= $current_page === 'portfolio_add.php' ? 'active' : '' ?>">Add Portfolio</a></li>
                <li><a href="logout.php" class="<?= $current_page === 'logout.php' ? 'active' : '' ?>">Logout</a></li>
            </ul>
        </li>
    </ul>
    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>
