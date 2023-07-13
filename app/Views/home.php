<?= $this->extend('master') ?>

<?= $this->section('content') ?>
<section>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-8 offset-md-2">
                <h1 class="text-center">HOME!</h1>

                <?php $currentPage = $pager->getCurrentPage() ?? 1; ?>
                <?php $startIndex = ($currentPage - 1) * $pager->getPerPage(); ?>

                <ol class="list-unstyled pl-4">
                    <?php foreach ($posts as $index => $post) : ?>
                        <li class="mb-4">
                            <span class="mr-2"><?= $startIndex + $index + 1 ?>.</span>
                            <a href="<?= url_to('post.slug', $post->slug) ?>" class="text-decoration-none"><?= $post->title ?></a>
                        </li>
                    <?php endforeach ?>
                </ol>

                <div class="d-flex justify-content-start mt-3">
                    <?= $pager->links('default_full') ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection('') ?>