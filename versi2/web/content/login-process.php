<?php
//register process
if(isset($_SESSION['username'])){
  header("Location: index.php");
}
if(isset($_POST['id_form']) && $_POST['id_form']=='form_login'){

    $username = $_POST['username'];
    $password = $_POST['password'];
    $msg = '';
    $ktg_msg = '';
    $class = "alert-info";
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
      $sql = "select * from user where username='$username' and password='$password'";
      $login = mysql_fetch_array(mysql_query($sql));
       if (isset($login['username'])) {
          $_SESSION['valid'] = true;
          $_SESSION['timeout'] = time();
          $_SESSION['username'] = $login['username'];
          $_SESSION['level'] = $login['id_user_level'];

          $class = "alert-success";
          $ktg_msg = 'Login Berhasil';
       }else {
         $class = "alert-danger";
         $ktg_msg = 'Login Gagal';
       }
    }else {
      $class = "alert-danger";
      $ktg_msg = 'Data Tidak Valid';
    }
}
