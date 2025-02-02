<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>
    <link href="<?= base_url() ?>assets/img/icon.ico" rel="icon">

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-secondary">

    <div class="container">

        <!-- Outer Row -->
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">REGISTRASI AKUN</h1>
                            </div>
                            <form method="post" action="<?= base_url('Auth/regis'); ?>" class="user mt-5">

                                <div class="form-group mb-4">
                                    <input type="hidden" name="id_jemaat">
                                    <input type="name" class="form-control form-control-user" id="exampleInputName" name="username" placeholder="Masukkan Nama...">
                                    <?= form_error('username', '<div class="text-danger small ml-2">', '</div>'); ?>
                                </div>
                                <div class="form-group mb-4">
                                    <input type="email" class="form-control form-control-user" id="exampleInputUsername" name="email" placeholder="Masukkan Email...">
                                    <?= form_error('email', '<div class="text-danger small ml-2">', '</div>'); ?>
                                </div>
                                <div class="form-group mb-4">
                                    <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Password">
                                    <?= form_error('password', '<div class="text-danger small ml-2">', '</div>'); ?>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block mt-4">
                                    Registrasi Akun
                                </button>

                                <hr width="0">
                                    <hr width="0">
                                    <hr width="0">
                                <hr>
                            </form>
                            <div class="text-center">
                                <a class="small" href="<?= base_url('Auth/index'); ?>">Sudah Punya Akun? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>

</body>

</html>
