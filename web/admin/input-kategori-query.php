<?php
//save process
if(isset($_POST['id_form']) && $_POST['id_form']=='form_kategori_barang'){    
    $nama = $_POST['nama_kategori'];
    $ket = $_POST['kategori_keterangan'];
    if(isset($_GET['edit-ktg'])){
        $insert = "UPDATE `kategori_barang` SET  `nama` = '$nama', `keterangan` = '$ket' WHERE `idkategori` = '".$_GET['edit-ktg']."'";
    } else {
        $insert = "insert into `kategori_barang` (`nama`,`keterangan`) values ('$nama','$ket');";
    }    
    $is_success = mysql_query($insert);
    $ktg_msg = '';
    $class = "alert-info";
    if($is_success){
        $class = "alert-success";
        $ktg_msg = 'Simpan Berhasil';
    } else {
        $class = "alert-danger";
        $ktg_msg = 'Simpan Gagal';
    }
}
$id = NULL;
$nama = NULL;
$ket = NULL;
if(isset($_GET['edit-ktg'])){
    //select data to update
    $sql = "select * from kategori_barang where idkategori=".$_GET['edit-ktg'];
    $edit = mysql_query($sql);
    $edit_data = mysql_fetch_array($edit);    
    $id = isset($edit_data[0]) ? $edit_data['idkategori'] : NULL;
    $nama = isset($edit_data[0]) ? $edit_data['nama'] : NULL;
    $ket = isset($edit_data[0]) ? $edit_data['keterangan'] : NULL;
}
//show into table
$sql = "select * from kategori_barang order by idkategori desc ";
$kategori_barang = mysql_query($sql);
if (!$kategori_barang) {
    die("Gagal query.." . mysql_error());
}
$no = 1;
