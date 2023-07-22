<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="<?= base_url(); ?>/assets/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="<?= base_url(); ?>/assets/dist/css/signin.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

    <title>Login SiJaspel</title>
    <link rel="icon" href="<?= base_url(); ?>/assets/brand/favicon.png">

</head>

<<<<<<< HEAD

<body class="text-center">


=======
<body class="text-center">
>>>>>>> 3632f67d70929d023233240ca19762ef1293323e

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>

<<<<<<< HEAD
    <div class="form-signin container-fluid sd-flex justify-content-center align-item-center">
        <form action="<?= base_url(); ?>login/proses" method="post">
            <img class="mb-4" src="<?= base_url(); ?>/assets/brand/pn.svg" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="form-floating">
                <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username">
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <?= $this->session->flashdata('error') ? $this->session->flashdata('error') : ''; ?>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted">RSUD Panti Nugoroho &copy; <?= date('Y'); ?></p>
        </form>
=======
    <div class="form-signin container sd-flex justify-content-center align-item-center">
        <form action="<?= base_url(); ?>login/proses" method="post">
            <img class="mb-4" src="<?= base_url(); ?>/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="Username">
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
>>>>>>> 3632f67d70929d023233240ca19762ef1293323e

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted">&copy; <?= date("Y"); ?></p>
        </form>
    </div>
<<<<<<< HEAD
</body>

=======

</body>


>>>>>>> 3632f67d70929d023233240ca19762ef1293323e
</html>