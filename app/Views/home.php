<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <section>
        <a href=" <?= url_to('auth.register') ?>">
            <h3>
                Register
            </h3>

        </a>
        <a href=" <?= url_to('auth.login') ?>">
            <h3>
                Login
            </h3>

        </a>
    </section>
</body>

</html>