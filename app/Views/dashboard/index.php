<?= $this->extend('master') ?>

<?= $this->section('content') ?>
<div class="container mt-3  _indexDashboard">

</div>
<?= $this->endSection('') ?>

<?= $this->section('js') ?>

<script>
var homePost = document.querySelector('._indexDashboard')

fetch('<?= url_to('dashboard.fetch', csrf_hash()) ?>', {
    method: 'get'
}).then(response => response.text()).then(html => {
    homePost.innerHTML = html;
}).catch(error => console.log(error));
</script>
<?= $this->endSection('') ?>