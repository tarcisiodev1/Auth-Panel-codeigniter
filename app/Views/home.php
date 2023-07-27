<?= $this->extend('master') ?>

<?= $this->section('content') ?>

<section>
    <div class="container ">



        <div class="row mt-5">
            <div class="col-md-8 offset-md-2">
                <h1 class="text-center m-4 "></h1>

                <?php $currentPage = $pager->getCurrentPage() ?? 1; ?>
                <?php $startIndex  = ($currentPage - 1) * $pager->getPerPage(); ?>
                <?php if (! empty(session()->getFlashData('notification'))) : ?>
                <div class="alert alert-info" id="notification">
                    <?= session()->getFlashData('notification') ?>
                </div>
                <?php endif ?>

                <ol class="list-unstyled pl-4  ">
                    <?php foreach ($posts as $index => $post) : ?>
                    <li class=" mb-4   ">
                        <span class=" mr-2"><?= $startIndex + $index + 1 ?>.</span>
                        <a class="link-dark link-underline-opacity-0  link-underline-opacity-100-hover"
                            href="<?= url_to('post.slug', $post->slug) ?>">
                            <span class=""><?= $post->title ?></span>
                        </a>
                        <div class="text-muted small">
                            <div class=""></div>
                            <small>Posted
                                <?= date('d/m/Y', strtotime($post->created_at)) ?></small>
                        </div>
                    </li>
                    <?php endforeach ?>
                </ol>

                <div class="d-flex justify-content-center mt-3 ">
                    <?= $pager->simpleLinks() ?>
                </div>

                <div class="form-group mb-3">
                    <?php if (session()->has('error')) : ?>
                    <span class="text text-danger">
                        <?= session()->getFlashdata('error') ?>
                    </span>
                    <?php endif ?>
                </div>
            </div>
        </div>

    </div>

</section>



<?= $this->endSection('') ?>