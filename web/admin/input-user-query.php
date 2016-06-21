<?php
//save process
if(isset($_POST['id_form']) && $_POST['id_form']=='form_user'){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $nama = $_POST['nama'];
  $jenkel = $_POST['jenkel'];
  $email = $_POST['email'];
  $notelp = $_POST['notelp'];
  $ttl = $_POST['ttl'];
  $alamat = $_POST['alamat'];
  $status = 1;
  $level = $_POST['level_user'];


    if(isset($_GET['edit-ktg'])){
        $iduser = $_GET['edit-ktg'];
        $insert = "
        UPDATE `user`
        SET
        `id_user_level` = $level,
        `username` = '$username',";
        if(!empty($password)){
            $insert .= "`password` = '$password',";
        }
        $insert .="`nama` = '$nama',
        `jenkel` = '$jenkel',
        `email` = '$email',
        `notelp` = '$notelp',
        `ttl` = '$ttl',
        `alamat` = '$alamat' WHERE `iduser`=$iduser";

    } else {
      $insert = " INSERT INTO `user`
                  (
                  `id_user_level`,`username`,`password`,`nama`,`jenkel`,`email`,
                  `notelp`,`ttl`,`alamat`,`status`
                  )
                  VALUES
                  ($level,'$username','$password','$nama','$jenkel','$email','$notelp','$ttl','$alamat',$status);";
    }
    $is_success = mysql_query($insert);
    $ktg_msg = '';
    $class = "alert-info";
    if($is_success){
        $class = "alert-success";
        $ktg_msg = 'Simpan Berhasil';
    } else {
        $class = "alert-danger";
        $ktg_msg = 'Simpan Gagal '.mysql_error();
    }
}
$username = null;
$password = null;
$nama = null;
$jenkel = null;
$email = null;
$notelp = null;
$ttl = null;
$alamat = null;
$status = null;
$level = null; //level admin
if(isset($_GET['edit-ktg'])){
    //select data to update
    $sql = "select * from user where iduser=".$_GET['edit-ktg'];
    $edit = mysql_query($sql);
    $edit_data = mysql_fetch_array($edit);

    $username = isset($edit_data[0]) ? $edit_data['username'] : NULL;
    $password = isset($edit_data[0]) ? $edit_data['password'] : NULL;
    $nama = isset($edit_data[0]) ? $edit_data['nama'] : NULL;
    $jenkel = isset($edit_data[0]) ? $edit_data['jenkel'] : NULL;
    $email = isset($edit_data[0]) ? $edit_data['email'] : NULL;
    $notelp = isset($edit_data[0]) ? $edit_data['notelp'] : NULL;
    $ttl = isset($edit_data[0]) ? $edit_data['ttl'] : NULL;
    $alamat = isset($edit_data[0]) ? $edit_data['alamat'] : NULL;
    $status = isset($edit_data[0]) ? $edit_data['status'] : NULL;
    $level = isset($edit_data[0]) ? $edit_data['id_user_level'] : NULL;
}
//show into table
$sql = "select * from user order by iduser desc ";
$users = mysql_query($sql);
if (!$users) {
    die("Gagal query.." . mysql_error());
}
$no = 1;

//show into table
$sql = "select * from user_level ";
$user_level = mysql_query($sql);
