<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <i class="fa-brands fa-playstation"></i>
        </div>
        <div class="sidebar-brand-text mx-1">Admin Profile</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Query menu -->
    <?php
    $menu = $this->db->get('admin_menu')->result_array();
    ?>

    <!-- Looping menu -->
    <?php foreach ($menu as $menuItem): ?>
        <div class="sidebar-heading">
            <?= $menuItem['menu']; ?>
        </div>

        <!-- Ambil submenu berdasarkan menu_id -->
        <?php
        $menuId = $menuItem['id'];
        $subMenu = $this->db->get_where('admin_sub_menu', ['menu_id' => $menuId])->result_array();
        ?>

        <?php foreach ($subMenu as $sub): ?>
            <?php if ($title == $sub['title']): ?> 
                <li class="nav-item active">
                <?php else: ?>
                <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link pb-0" href="<?= base_url($sub['url']); ?>">
                    <i class="<?= $sub['icon']; ?>"></i>
                    <span><?= $sub['title']; ?></span></a>
            </li>
        <?php endforeach; ?>

        <hr class="sidebar-divider mt-3">

    <?php endforeach; ?>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->