<!-- <ul>
    <li><a href="<?= url_to('') ?>">HOME</a></li>
    <li><a href="<?= url_to('auth.login') ?>">LOGIN</a></li>
    <li><a href="<?= url_to('') ?>">PRODUCTS</a></li>
</ul> -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <!-- <a class="navbar-brand" href="?= url_to('/') ?>">Minimalist Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button> -->
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?= url_to('/') ?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= url_to('auth.login') ?>">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= url_to('auth.register') ?>">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= url_to('dashboard') ?>">Dashboard</a>
            </li>
        </ul>
    </div>
</nav>