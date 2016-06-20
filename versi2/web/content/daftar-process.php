<?php
//register process
if(isset($_POST['id_form']) && $_POST['id_form']=='form_daftar'){

    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $jenkel = $_POST['jenkel'];
    $email = $_POST['email'];
    $notelp = $_POST['notelp'];
    $ttl = $_POST['ttl'];
    $alamat = $_POST['alamat'];
    $status = 1;
    $level = 2; // level user biasa

    $insert = " INSERT INTO `user` (`id_user_level`,`username`,`password`,`nama`,`jenkel`,`email`,`notelp`,`ttl`,`alamat`,`status`)
            VALUES ($level,'$username','$password','$nama','$jenkel','$email','$notelp','$ttl','$alamat',$status);";

    $is_success = mysql_query($insert);
    $ktg_msg = '';
    $class = "alert-info";
    if($is_success){
        $class = "alert-success";
        $ktg_msg = 'Data Berhasil di simpan.';
    } else {
        $class = "alert-danger";
        $ktg_msg = 'Data Gagal Disimpan.';
    }
}
