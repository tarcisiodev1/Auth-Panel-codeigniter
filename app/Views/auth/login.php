<?= $this->extend('master') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row mt-3">
        <div class="col-md-4 offset-4 mt-5">
            <h4>
                Sign Ip
            </h4>
            <hr>


            <form action="<?= url_to('auth.login') ?>" method="post" class="form mb-3">
                <?= csrf_field(); ?>

                <div class="form-group  mb-3">
                    <label for="">User</label>
                    <input type="text" class="form-control" name="user" placeholder="Email Here">
                    <span class="text text-danger">
                        <!-- INCLUIR Flash data -->
                        <?php echo session()->getFlashdata('errors')['user'] ?? ''  ?>

                    </span>
                </div>
                <div class="form-group mb-3">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password Here">
                    <span class="text text-danger">
                        <!-- INCLUIR Flash data -->
                        <?php echo session()->getFlashdata('errors')['password'] ?? ''  ?>

                    </span>
                </div>
                <div class="form-group mb-3">
                    <input type="submit" class="btn btn-info" value="Sing In">
                </div>
                <div class="form-group mb-3">
                    <?php if (session()->has('error')) : ?>
                    <span class="text text-danger">
                        <?php echo session()->getFlashdata('error'); ?>
                    </span>
                    <?php endif ?>
                </div>
            </form>
            <br>
            <a href="<?= url_to('auth.register') ?>">
                Create a new account
            </a>
        </div>
    </div>
</div>

<?= $this->endSection('') ?>