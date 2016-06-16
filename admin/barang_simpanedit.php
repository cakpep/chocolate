<?php
  $id 		= $_POST['id'];
  $nama  	= $_POST['nama'];
  $harga	= $_POST['harga'];
  $proses	= $_POST['proses'];
  $foto_lama = $_POST['foto_lama'];
  
  $foto     = $_FILES['foto']['name'];
  $tmpName  = $_FILES['foto']['tmp_name'];
  $size     = $_FILES['foto']['size'];
  $type     = $_FILES['foto']['type'];
  	
  $maxsize     = 500000; 
  $typeYgBoleh = array("image/jpeg","image/png","image/pjpeg");
  
  $dirFoto     = "pict";
  if(!is_dir($dirFoto))
    mkdir($dirFoto) ;
  $fileTujuanFoto  = $dirFoto."/".$foto;
  
  $dirThumb    = "thumb";
  if(!is_dir($dirThumb))
    mkdir($dirThumb) ;
  $fileTujuanThumb     = $dirThumb."/t_".$foto;
  
  $dataValid="YA";
  
  if ($size > 0 ){
      if ($size > $maxsize){
        echo "Ukuran File Terlalu Besar <br/>";
        $dataValid="TIDAK";
      }
      if (!in_array($type, $typeYgBoleh)) {
        echo "Type File Tidak DiKenal <br/>";
        $dataValid="TIDAK";
      }
  }

  if (strlen(trim($nama))==0) {
     echo "Nama Barang Harus Diisi! <br />";
     $dataValid = "TIDAK";
  }
  if (strlen(trim($harga))==0) {
     echo "Harga Harus Diisi! <br />";
     $dataValid = "TIDAK";
  }  

  if ($dataValid == "TIDAK") {
     echo "Masih Ada Kesalahan, silakan perbaiki! </br>";
     echo "<input type='button' value='Kembali'
      onClick='self.history.back()'>";
     exit;
  }

  include "koneksi.php";
  
  if ($size == 0){
	$foto = $foto_lama;
  }
  
  if ($proses == "Simpan") {
  	$sql = "update barang set  
            nama = '$nama',harga='$harga',foto='$foto'
			where idbarang = '$id' ";
  } 
  $hasil = mysql_query($sql);
  if (!$hasil) {
    echo "Gagal Simpan, silakan diulangi! <br /> ".mysql_error();
    echo "<input type='button' value='Kembali'
     onClick='self.history.back()'>";
    exit;
  } 
  
  if ($size > 0)
    $perluUplod = TRUE;
  else
    $perluUplod = FALSE; 
    
  if ($perluUplod ) {
       if (!move_uploaded_file($tmpName, $fileTujuanFoto)) { 
        echo "Gagal Upload Gambar..<br/>";
        echo "<a href='barang_tampil.php'>Daftar Barang</a>";
        exit;
       } else {
           buat_thumbnail($fileTujuanFoto, $fileTujuanThumb);
       }
   }

  echo "Data sudah disimpan dan file berhasil di upload" ;
  
  function buat_thumbnail($file_src, $file_dst) {
       //-- hapus jika thumbail sebelumnya sudah ada
       list($w_src,$h_src,$type) = getImageSize($file_src);
       
       switch ($type)     {
          case 1:   //   gif -> jpg
            $img_src = imagecreatefromgif($file_src);
            break;
          case 2:   //   jpeg -> jpg
            $img_src = imagecreatefromjpeg($file_src);
            break;
          case 3:  //   png -> jpg
            $img_src = imagecreatefrompng($file_src);
            break;
         }
       
        $thumb = 100;  //--- max. size untuk thumb ---
        if ($w_src > $h_src) {
            $w_dst = $thumb;  //--- landscape ---
            $h_dst = round($thumb / $w_src * $h_src);
        } else {
            $w_dst = round($thumb / $h_src * $w_src);  //--- portrait ---
            $h_dst = $thumb;
        }
      
      $img_dst = imagecreatetruecolor($w_dst, $h_dst);  //  resample
        
       imagecopyresampled($img_dst, $img_src, 0, 0, 0, 0, 
              $w_dst, $h_dst, $w_src, $h_src);
       imagejpeg($img_dst, $file_dst);    //  simpan thumbnail
        //-- bersihkan memori
       imagedestroy($img_src);       
       imagedestroy($img_dst);
  } 
?>
<hr/>
<a href="gamis.php" />DAFTAR BARANG</a>