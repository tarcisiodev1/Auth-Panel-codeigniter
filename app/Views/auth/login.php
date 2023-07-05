<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-4 offset-4">
                <h4>
                    Sign Ip
                </h4>
                <hr>
                <form action="" method="post" class="form mb-3">
                    <?= csrf_field(); ?>
                    <div class="form-group  mb-3">
                        <label for="">E-mail</label>
                        <input type="text" class="form-control" name="email" placeholder="Email Here">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password Here">
                    </div>
                    <div class="form-group mb-3">
                        <input type="submit" class="btn btn-info" value="Sing In">
                    </div>
                </form>
                <br>
                <a href="<?= url_to('auth.register') ?>">
                    Create a new account
                </a>
            </div>
        </div>
    </div>
</body>

</html>