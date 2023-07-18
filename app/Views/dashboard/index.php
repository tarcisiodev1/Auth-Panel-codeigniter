<?= $this->extend('master') ?>

<?= $this->section('content') ?>
<div class="container mt-3  ">
    <div class="row pt-3">
        <div class="col-md-8 offset-2 mt-5">
            <h4>
                <!-- ?= $title; ? --> Dashboard🤖
            </h4>
            <hr>
            <table class="table table-hover _indexDashboard">

            </table>

            <div class="form-group mb-3">
                <?php if (!empty(session()->getFlashData('notification'))) : ?>
                <div class="alert alert-info" id="notification">
                    <?= session()->getFlashData('notification') ?>
                </div>
                <?php endif ?>
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

<?= $this->section('js') ?>

<script>
var dashboard = document.querySelector('._indexDashboard')

fetch('<?= url_to('dashboard.fetch', csrf_hash()) ?>', {
    method: 'get'
}).then(response => response.text()).then(html => {
    dashboard.innerHTML = html;
}).catch(error => console.log(error));
</script>
<?= $this->endSection('') ?>