<?= $this->extend('master') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row mt-3">
        <div class="col-md-4 offset-4 mt-5">
            <h4>
                Sign Up
            </h4>
            <hr>
            <form action="" method="post" class="form mb-3">

                <?= csrf_field(); ?>
                <div class="form-group mb-3">
                    <span style="color: red;">
                        <!-- INCLUIR A VARIÁVEL $msg 
                                            <?php echo $msg ?? ''  ?>
                                            <?php if (isset($errors)) : ?>
                                                <ul>
                                                    <?php foreach ($errors as $error) : ?>
                                                        <li><?php echo $error ?></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php endif; ?>
                                        -->
                    </span>
                </div>
                <div class="form-group mb-3">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name Here">
                </div>
                <div class="form-group  mb-3">
                    <label for="">E-mail</label>
                    <input type="text" class="form-control" name="email" placeholder="Email Here">
                </div>
                <div class="form-group mb-3">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password Here">
                </div>
                <div class="form-group mb-3">
                    <label for="">Confirm Password</label>
                    <input type="password" class="form-control" name="passwordConf" placeholder="Confirm Password Here">
                </div>
                <div class="form-group mb-3">
                    <input type="submit" class="btn btn-info" value="Sing Up">
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