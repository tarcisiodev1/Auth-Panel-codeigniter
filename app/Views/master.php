<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> -->


    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/bootstrap.min.css') ?>">
    <!-- <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>"> -->

    <title><?= $title ?? 'Project Codeigniter' ?></title>


</head>


<body>
    <?= $this->include('partials/navbar.php') ?>

    <?= $this->renderSection('content') ?>
    <script src="<?= base_url(' assets/bootstrap/bootstrap.bundle.min.js') ?>">
    </script>
    <script src="<?= base_url('assets/js/index.js') ?>">
    </script>
    <?= $this->renderSection('js') ?>
</body>

</html>