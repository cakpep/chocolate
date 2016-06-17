<?php
//save process
if(isset($_POST['id_form']) && $_POST['id_form']=='form_produk'){    
    //upload foto
        $target_dir = "uploads/produk/";
        $target_file = $target_dir . basename($_FILES["foto"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["foto"]["tmp_name"]);
            if($check !== false) {
               // echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
               // echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            //echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["foto"]["size"] > 500000) {
            //echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            //echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
                //echo "The file ". basename( $_FILES["foto"]["name"]). " has been uploaded.";
            } else {
                //echo "Sorry, there was an error uploading your file.";
            }
        }
    //endof upload foto
        $sql_foto = "select * from barang where idbarang=".$_GET['edit-produk'];
        $cek_foto = mysql_query($sql_foto);
        $data_foto = mysql_fetch_array($cek_foto); 
        $nama = $_POST['nama_produk'];
        $id_kategori = $_POST['id_kategori'];
        $harga = $_POST['harga'];    
        $foto = empty($_FILES["foto"]["name"]) ? $data_foto['foto'] : $_FILES["foto"]["name"];
    if(isset($_GET['edit-produk'])){
        $insert = "UPDATE `barang`
                    SET `id_kategori` = $id_kategori,
                      `nama` = '$nama',
                      `harga` = '$harga',
                      `foto` = '$foto'
                    WHERE `idbarang` =".$_GET['edit-produk'];
    } else {
        $insert = "INSERT INTO `barang` (`id_kategori`,`nama`,`harga`,`foto`) VALUES ($id_kategori,'$nama',$harga,'$foto')";
    }    
    $is_success = mysql_query($insert);
    if (!$is_success) {
            die("Gagal query.." . mysql_error());
    }
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
$harga = NULL;
$id_ktg = NULL;
if(isset($_GET['edit-produk'])){
    //select data to update
    $sql = "select * from barang where idbarang=".$_GET['edit-produk'];
    $edit = mysql_query($sql);
    $edit_data = mysql_fetch_array($edit);    
    $id = isset($edit_data[0]) ? $edit_data['idbarang'] : NULL;
    $id_ktg = isset($edit_data[0]) ? $edit_data['id_kategori'] : NULL;
    $nama = isset($edit_data[0]) ? $edit_data['nama'] : NULL;
    $harga = isset($edit_data[0]) ? $edit_data['harga'] : NULL;    
    $foto = isset($edit_data[0]) ? $edit_data['foto'] : NULL;
}
//show into table
$sql = "SELECT b.*,kb.`nama` AS nama_ktg,kb.`keterangan` FROM barang b LEFT JOIN kategori_barang kb ON b.`id_kategori`=kb.`idkategori` ORDER BY b.`idbarang` DESC";
$daftar_produk = mysql_query($sql);
if (!$daftar_produk) {
    die("Gagal query.." . mysql_error());
}
$no = 1;

//show into table
$sql = "select * from kategori_barang order by idkategori desc ";
$kategori_barang = mysql_query($sql);
if (!$kategori_barang) {
    die("Gagal query.." . mysql_error());
}
