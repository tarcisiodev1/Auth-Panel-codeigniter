<?= $this->extend('master') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row mt-3">
        <div class="col-md-8 offset-md-2 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><?= $post->title ?></h4>
                    <p class="card-text"><?= $post->body ?></p>
                    <hr>
                    <div class="text-muted">
                        <small>Posted <?= date('d/m/Y', strtotime($post->created_at)) ?></small>
                    </div>
                    <div class="mt-3">
                        <a href="<?= url_to('/') ?>" class="btn btn-primary">Back to Posts</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>