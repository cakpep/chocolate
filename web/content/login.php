<!-- login process -->
<?php require_once "login-process.php"; ?>
<div class="container" >
<div class="col-md-4"></div>
  <div class="col-md-4">
      <div class="container" style="margin-top: 30px">
          <div class="col-md-4">
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <h1 class="panel-title"><span class="glyphicon glyphicon-user"></span> <strong>Log In </strong></h1>
                  </div>
                  <div class="panel-body">
                      <form action="index.php?page=login" method="POST">
                          <input type="HIDDEN" name="id_form" value="form_login">
                          <div class="form-group">
                              <label for="email">silakan Masukan Username Anda </label>
                              <input type="text" class="form-control" id="email" placeholder="Username" required="required" name="username"/>
                          </div>
                          <div class="form-group">
                              <label for="pwd">Masukan Password Anda </label>
                              <input type="password" class="form-control" id="pwd" placeholder="Password" required="required" name="password"/>
                          </div>
                          <button type="submit" class="btn btn-lg btn-block btn-primary"><span class="glyphicon glyphicon-log-in"></span> Masuk</button>
                      </form>
                  </div>
              </div>
              <?php if(!empty($ktg_msg)){ ?>
                  <div class="col-md-12">
                      <div class="alert <?= $class ?>">
                          <?= $ktg_msg ?>
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      </div>
                  </div>
              <?php
                  }
                  if(isset($_SESSION['username'])){
                    header("Location: index.php");
                  }
              ?>
          </div>
      </div>
  </div>
