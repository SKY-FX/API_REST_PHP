<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="<?= URL ?>back/login">Menu</a>

    <?php if(!securityClass::verifAccessSession()) :?>
        <li class="navbar-nav nav-item">
            <a class="nav-link" href="<?= URL ?>back/login">Login</a>
        </li>
    <?php else : ?>

        <li class="navbar-nav nav-item">
            <a class="nav-link" href="<?= URL ?>back/admin">Accueil</a>
        </li>

        <li class="navbar-nav nav-item">
            <a class="nav-link" href="<?= URL ?>back/datas">Datas</a>
        </li>

        <li class="navbar-nav nav-item">
            <a class="nav-link" href="<?= URL ?>back/clients">clients</a>
        </li>

        <li class="navbar-nav nav-item">
            <a class="nav-link" href="<?= URL ?>back/deconnection">Logout</a>
        </li>
    <?php endif; ?>
</nav>