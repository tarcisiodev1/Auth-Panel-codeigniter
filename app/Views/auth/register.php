<?= $this->extend('master') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row mt-3">
        <div class="col-md-4 offset-4 mt-5">
            <h4 class="mt-4">
                Sign Up📝
            </h4>
            <hr>
            <form action=" <?= url_to('auth.register'); ?>" method="post" class="form mb-3">

                <?= csrf_field(); ?>
                <div class=" form-group mb-3">
                    <label for="">User</label>
                    <input type="text" class="form-control" name="user" placeholder="User Here">
                    <span class="text text-danger">
                        <!-- INCLUIR Flash data -->
                        <?= session()->getFlashdata('errors')['user'] ?? ''  ?>

                    </span>
                </div>

                <div class="form-group  mb-3">
                    <label for="">E-mail</label>
                    <input type="text" class="form-control" name="email" placeholder="Email Here">
                    <span class="text text-danger">
                        <!-- INCLUIR Flash data -->
                        <?= session()->getFlashdata('errors')['email'] ?? ''  ?>

                    </span>
                </div>
                <div class="form-group mb-3 ">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password Here">
                    <span class="text text-danger">
                        <!-- INCLUIR Flash data -->
                        <?= session()->getFlashdata('errors')['password'] ?? ''  ?>

                    </span>
                </div>

                <div class="form-group  mb-4">
                    <input type="submit" class="btn btn-info" value="Sing Up">
                </div>

                <div class="form-group  mt-3">

                    <?php if (session()->has('error')) : ?>
                    <span class="text text-danger">
                        <?= session()->getFlashdata('error'); ?>

                    </span>
                    <?php endif ?>
                    <?php if (session()->has('success')) : ?>
                    <span class="alert alert-info">
                        <?= session()->getFlashdata('success'); ?>

                    </span>
                    <?php endif ?>

                </div>
            </form>
            <br>
            <a href="<?= url_to('auth.login'); ?>">
                I already have an account, login
            </a>
        </div>
    </div>
</div>

<?= $this->endSection('') ?>