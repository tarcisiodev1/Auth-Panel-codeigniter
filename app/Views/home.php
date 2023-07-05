<?= $this->extend('master') ?>

<?= $this->section('content') ?>
<section>
    <a href=" <?= url_to('auth.register') ?>">
        <h3>
            Register
        </h3>

    </a>
    <a href=" <?= url_to('auth.login') ?>">
        <h3>
            Login
        </h3>

    </a>
</section>


<?= $this->endSection('') ?>