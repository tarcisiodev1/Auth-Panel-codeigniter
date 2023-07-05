<?= $this->extend('master') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row pt-3">
        <div class="col-md-8 offset-2">
            <h4>
                <!-- ?= $title; ? --> Dashboard
            </h4>
            <hr>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">
                            <!--img src="/images/?= $userInfo['avatar']; ?>" -->
                            <img src="" alt="" width="200px" height="150px" class="mb-2">
                            <!-- form action="?= base_url('auth/uploadImage'); ?>" -->
                            <form action="" method="post" enctype="multipart/form-data">
                                <input type="file" class="form-control" name="userImage" size="10" />
                                <hr>
                                <input type="submit">
                            </form>
                        </th>
                        <td>
                            <!-- ?= $userInfo['name']; ?> -->
                            Mark
                        </td>
                        <td>
                            <!-- ?= $userInfo['email']; ?> -->
                            Otto
                        </td>
                        <td>
                            <!--  href="?= site_url('auth/logout); ?>"  -->
                            <a href="">Log out</a>

                        </td>
                        <td>
                            <!--  href="?= site_url('auth/logout); ?>"  -->
                            <a href="">New Password</a>

                        </td>

                    </tr>
                </tbody>
            </table>
            <!-- ?php 
                if (!empty(session()->getFlashData('notification'))) {
                    ?>
                <div class="alert alert-info">
                    ?= session()->getFlashData('notification')?>
                </div>;
                ?php
                }
                ?> -->
        </div>
    </div>
</div>
<?= $this->endSection('') ?>