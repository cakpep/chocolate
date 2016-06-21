<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home"></span> Chocolate</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="index.php?page=produk"><span class="glyphicon glyphicon-shopping-cart"></span> Produk</a>
                </li>
                <li>
                    <a href="index.php?page=contact"><span class="glyphicon glyphicon-envelope"></span> Contact</a>
                </li>
                <li>
                    <a href="index.php?page=sms"><span class="glyphicon glyphicon-envelope"></span> My Sms</a>
                </li>
                <?php if(isset($_SESSION['username'])){ ?>
                  <li>
                      <a href="index.php?page=logout"><span class="glyphicon glyphicon-log-out"></span> Logout ( <?= $_SESSION['username'] ?> )</a>
                  </li>
                <?php } else { ?>
                  <li>
                      <a href="index.php?page=login"><span class="glyphicon glyphicon-log-out"></span> Login</a>
                  </li>
                  <li>
                      <a href="index.php?page=daftar"><span class="glyphicon glyphicon-log-out"></span> Daftar</a>
                  </li>
                <?php } ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
