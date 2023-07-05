<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>dashboard</title>
</head>

<body>
    <div class="conteiner">
        <div class="row pt-3">
            <div class="col-md-8 offset-2">
                <h4>
                    <!-- ?= $title; ? --> Dashboard
                </h4>
                <hr>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1
                                <!--img src="/images/?= $userInfo['avatar']; ?>" -->
                                <img src="" alt="" width="200px" height="150px">
                                <!-- form action="?= base_url('auth/uploadImage'); ?>" -->
                                <form action="" method="post" enctype="multipart/form-data">
                                    <input type="file" class="form-control" name="userImage" size="10" />
                                    <hr>
                                    <input type="submit">
                                </form>
                            </th>
                            <td>
                                <!-- ?= $userInfo['name']; ?> -->
                                Mark
                            </td>
                            <td>
                                <!-- ?= $userInfo['email']; ?> -->
                                Otto
                            </td>
                            <td>
                                <!--  href="?= site_url('auth/logout); ?>"  -->
                                <a href="">Log out</a>

                            </td>

                        </tr>
                    </tbody>
                </table>
                <!-- ?php 
                if (!empty(session()->getFlashData('notification'))) {
                    ?>
                <div class="alert alert-info">
                    ?= session()->getFlashData('notification')?>
                </div>;
                ?php
                }
                ?> -->
            </div>
        </div>
    </div>
</body>

</html>