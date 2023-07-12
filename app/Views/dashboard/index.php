<?= $this->extend('master') ?>

<?= $this->section('content') ?>
<div class="container mt-3">
    <div class="row pt-3">
        <div class="col-md-8 offset-2 mt-5">
            <h4>
                <!-- ?= $title; ? --> Dashboard🤖
            </h4>
            <hr>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                        <th scope="col">Update password</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">
                            <!-- <?= var_dump(WRITEPATH . 'uploads\images\\' . session()->get('avatar')); ?> -->
                            <!--img src="/images/?= $userInfo['avatar']; ?>" -->

                            <img src="<?= 'images/' . session()->get('avatar'); ?>" alt="Img" width="200px" height="200px" class="mb-2">
                            <!-- form action="?= base_url('auth/uploadImage'); ?>" -->
                            <form action="<?= url_to('dashboard.upload'); ?>" method="post" enctype="multipart/form-data">
                                <input type="file" name="userfile" class="form-control-file" size="10" />
                                <hr>
                                <input type="submit">
                            </form>
                        </th>
                        <td>
                            <?= session()->get('name') ?>

                        </td>
                        <td>
                            <?= session()->get('email') ?>

                        </td>
                        <td>
                            <!--  href="?= site_url('auth/logout); ?>"  -->
                            <a href="<?= url_to('logout') ?>">Log out</a>

                        </td>
                        <td>
                            <!--  href="?= site_url('auth/logout); ?>"  -->
                            <a href="">Update password</a>

                        </td>

                    </tr>
                </tbody>
            </table>
            <?php if (!empty(session()->getFlashData('notification'))) : ?>
                <div class="alert alert-info">
                    <?= session()->getFlashData('notification') ?>
                </div>
            <?php endif ?>
            <div class="form-group mb-3">
                <?php if (session()->has('error')) : ?>
                    <span class="text text-danger">
                        <?php echo session()->getFlashdata('error') ?>
                    </span>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('') ?>