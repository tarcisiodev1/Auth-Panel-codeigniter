<?= $this->extend('master') ?>

<?= $this->section('content') ?>
<section>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-8 offset-md-2">
                <h1 class="text-center">HOME!</h1>

                <ol class="list-unstyled">
                    <?php $index = 1; ?>
                    <?php foreach ($posts as $post) : ?>
                    <li class="mb-4">
                        <span class="mr-2"><?= $index++ ?>.</span>
                        <a href="<?= url_to('post.slug', $post->slug) ?>"
                            class="text-decoration-none"><?= $post->title ?></a>
                    </li>
                    <?php endforeach ?>
                </ol>

                <div class="d-flex justify-content-center mt-3">
                    <?= $pager->links() ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection('') ?>