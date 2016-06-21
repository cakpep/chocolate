<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Chocolate Butique</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/shop-homepage.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>
        <?php include "config/koneksi.php"; ?>
        <!-- Navigation -->
        <?php include "web/layouts/navigation.php"; ?>

        <!-- Page Content -->
        <div class="container">

            <div class="row">

                <div class="col-md-3">
                    <?php include "web/layouts/sidebar.php"; ?>
                </div>

                <div class="col-md-9">

                    <div class="row">
                        <?php
                                $page = isset($_GET['page']) ? $_GET['page'] : NULL;
                                switch ($page) {
                                    case 'input-kategori':
                                        include "web/admin/input-kategori.php";
                                        break;
                                    case 'input-produk':
                                        include "web/admin/input-produk.php";
                                        break;
                                    case 'input-user':
                                        include "web/admin/input-user.php";
                                        break;
                                    case 'sms':
                                        include "web/admin/sms.php";
                                        break;
                                    case 'produk':
                                        include "web/content/produk.php";
                                        break;
                                    case 'contact':
                                        include "web/content/contact.php";
                                        break;
                                    case 'login':
                                        include "web/content/login.php";
                                        break;
                                    case 'logout':
                                        include "web/content/logout.php";
                                        break;
                                    case 'daftar':
                                        include "web/content/daftar.php";
                                        break;
                                    default:
                                        include "web/content/produk.php";
                                        break;
                                }
                        ?>
                    </div>

                </div>

            </div>

        </div>
        <!-- /.container -->

        <div class="container">

            <hr>

            <!-- Footer -->
            <?php include "web/layouts/footer.php"; ?>

        </div>
        <!-- /.container -->

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

    </body>

</html>
