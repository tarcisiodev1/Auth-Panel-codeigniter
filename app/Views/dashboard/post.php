<?= $this->extend('master') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row mt-3">
        <div class="col-md-4 offset-4 mt-5">
            <h4>
                POST!😁
            </h4>
            <hr>

            <form action="<?= url_to('post.create') ?>" method="post" class="form mb-3">
                <?= csrf_field(); ?>

                <div class="form-group  mb-3">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter the title">
                    <span class="text text-danger">
                        <!-- Include Flash data -->
                        <?= session()->getFlashdata('errors')['title'] ?? '' ?>
                    </span>
                </div>
                <div class="form-group mb-3">
                    <label for="body">Body</label>
                    <textarea class="form-control" name="body" id="body" rows="5"
                        placeholder="Enter the body"></textarea>
                    <span class="text text-danger">
                        <!-- Include Flash data -->
                        <?= session()->getFlashdata('errors')['body'] ?? '' ?>
                    </span>
                </div>
                <div class="form-group mb-3">
                    <input type="submit" class="btn btn-info" value="Submit">
                </div>
                <div class="form-group mb-3">
                    <?php if (session()->has('error')) : ?>
                    <span class="text text-danger">
                        <?= session()->getFlashdata('error') ?>
                    </span>
                    <?php endif ?>
                </div>
                <div class="form-group mb-3" id="notification">
                    <?php if (session()->has('notification')) : ?>
                    <span class="alert alert-info" id="notification">
                        <?= session()->getFlashdata('notification') ?>
                    </span>
                    <?php endif ?>
                </div>
            </form>
            <br>

        </div>
    </div>
</div>

<?= $this->endSection('') ?>