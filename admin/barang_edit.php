<?php
	$id = $_GET['id'];
	include "koneksi.php";
	$sql = "select * from barang where idbarang = '$id'";
	$hasil = mysql_query($sql);
	if (!$hasil) die ('Gagal query...');
	
	$data = mysql_fetch_array($hasil);
	$nama = $data['nama'];
	$harga = $data['harga'];
	$foto = $data['foto'];
	?>
   <h2>.:: EDIT BARANG ::.</h2>
   <form action='barang_simpanedit.php' method='post' enctype='multipart/form-data'>
   <input type="hidden" name="id" value="<?php echo $id;?>" />
   <table border='1'>
    <tr>
     <td>Nama Barang</td>
     <td><input type='text' name='nama' maxlength='40' size='31' value="<?php echo $nama;?>" /></td>
    </tr>
    <tr>
     <td>Harga Jual</td>
     <td><input type='text' name='harga' maxlength='9' size='10' value="<?php echo $harga;?>" /></td>
    </tr>
    <tr>
     <td>Gambar [max=500kb]</td>
     <td>
		<input type="file" name="foto" size="50">
		<input type="hidden" name="foto_lama" value="<?php echo $foto;?> "/><br/>
		<img src="<?php echo "thumb/t_$foto";?>" width="100px" height="100px"/>
	</td>
    </tr>
    <tr>
     <td colspan='2' align='center'>
      <input type='submit' value='Simpan' name='proses' />
      <input type='reset' value='Reset' name='reset' />
     </td>
    </tr>
   </table>
   </form>