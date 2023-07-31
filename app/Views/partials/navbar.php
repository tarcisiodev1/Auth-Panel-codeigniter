<!-- <ul>
    <li><a href="<?= url_to('') ?>" >HOME</a></li>
    <li><a href="<?= url_to('auth.login') ?>" >LOGIN</a></li>
    <li><a href="<?= url_to('') ?>" >PRODUCTS</a></li>
</ul> -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top p-2 mb-5">
    <!-- <a class="navbar-brand" href="?= url_to('/') ?>">Minimalist Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button> -->
    <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link text-white" href="<?= url_to('/') ?>"><img src="public\assets\img\nerd (1).png"
                        alt=""></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link text-white" href="<?= url_to('/') ?>"><img src="public\assets\img\nerd (1).png"
                        alt="">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="<?= url_to('auth.login') ?>">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="<?= url_to('auth.register') ?>">Register</a>
            </li>
        </ul>
        <?php if (session()->has('user')) : ?>
        <ul class="navbar-nav">
            <li class="nav-item ">
                <a class="nav-link text-white" href="<?= url_to('post.store') ?>"><svg
                        xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus"
                        viewBox="0 0 16 16">
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                    </svg></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="<?= url_to('dashboard') ?>"><?= session()->get('user') ?></a>
            </li>
        </ul>
        <?php endif; ?>
    </div>
</nav>