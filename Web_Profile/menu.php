<?php
// Dapatkan path saat ini
$current_page = basename($_SERVER['REQUEST_URI']);
?>

<nav id="navmenu" class="navmenu">
    <ul>
        <li><a href="index.php" class="<?= $current_page === 'index.php' ? 'active' : '' ?>">Home</a></li>
        <li><a href="about_resume.php" class="<?= $current_page === 'about_resume.php' ? 'active' : '' ?>">About</a></li>
        <li><a href="services.php" class="<?= $current_page === 'services.php' ? 'active' : '' ?>">Services</a></li>
        <li><a href="portfolio.php" class="<?= $current_page === 'portfolio.php' ? 'active' : '' ?>">Portfolio</a></li>
        <li><a href="contact.php" class="<?= $current_page === 'contact.php' ? 'active' : '' ?>">Contact</a></li>
        <li class="dropdown">
            <a href="#"><span>Setting</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
                <li><a href="index.php" class="<?= $current_page === 'index.php' ? 'active' : '' ?>">Logout</a></li>
            </ul>
        </li>
    </ul>
    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>
