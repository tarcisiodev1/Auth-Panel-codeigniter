<thead>
    <tr>
        <th scope="col">Image</th>
        <th scope="col">User</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
        <th scope="col">Update password</th>
    </tr>
</thead>
<tbody>
    <tr>
        <th scope="row">
            <!-- <?= var_dump(WRITEPATH . 'uploads\images\\' . session()->get('avatar')); ?> -->
            <!--img src="/images/?= $userInfo['avatar']; ?>"
        'images/' . session()->get('avatar');-->

            <img src="<?= url_to('upload.serveImage', session()->get('avatar')) ?>" alt="Img" width="200px" height="200px" class="mb-2">
            <!-- form action="?= base_url('auth/uploadImage'); ?>" -->
            <form action="<?= url_to('dashboard.upload'); ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="file" name="userfile" class="form-control-file" size="10" />
                <hr>
                <input type="submit">
            </form>
        </th>
        <td>
            <?= session()->get('user') ?>

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