<div class="sidebar sidebar-cpanel col-md-4 col-lg-3 d-none d-md-block">
    <div class="sidebar-container">
        <div class="sidebar__item text-center pt-3">
            <h3 class="text-white">Panel de Control</h3>
        </div>
        <div class="sidebar__item">
            <ul>
                <li><a href="cpanel.php" class="<?php echo (!isset($opcion) || $opcion == '') ? 'active' : '';?> item">Inicio</a></li>
                <li><a href="cpanel.php?opcion=importar" class="<?php echo (isset($opcion) && $opcion == 'importar') ? 'active' : '';?> item">Importar Productos</a></li>
                <li><a href="cpanel.php?opcion=importar_rub" class="<?php echo (isset($opcion) && $opcion == 'importar_rub') ? 'active' : '';?> item">Importar Rubros...</a></li>
                <li><a href="cpanel.php?opcion=productos" class="<?php echo (isset($opcion) && $opcion == 'productos') ? 'active' : '';?> item">Gestión de Productos</a></li>
                <li><a href="cpanel.php?opcion=clientes" class="<?php echo (isset($opcion) && $opcion == 'clientes') ? 'active' : '';?> item">Gestión de Clientes</a></li>
                <li><a href="cpanel.php?opcion=banners" class="<?php echo (isset($opcion) && $opcion == 'banners') ? 'active' : '';?> item">Gestión de Banners</a></li>
                <li><a href="cpanel.php?opcion=categories" class="<?php echo (isset($opcion) && $opcion == 'categories') ? 'active' : '';?> item">Gestión de Categorías</a></li>
                <li><a href="cpanel.php?opcion=pedidos" class="<?php echo (isset($opcion) && $opcion == 'pedidos') ? 'active' : '';?> item">Gestión de Pedidos</a></li>
                <li><a href="logout.php" class="item">Cerrar Sesión</a></li>
            </ul>
        </div>
    </div>
</div>