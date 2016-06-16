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
	
	echo "<h2>Konfirmasi Hapus";
	echo "Nama Barang : ".$nama."<br/>";
	echo "Harga Barang : ".$harga."<br/>";
	echo "Foto : <img src='thumb/t_".$foto."' /><br/><br/>";
	echo "APAKAH DATA INI AKAN DIHAPUS? <br/>";
	echo "<a href='barang_hapus.php?id=$id&hapus=1'>YA</a>";
	echo "<a href='barang_tampil.php'>TIDAK</a>";
	
	if (isset($_GET['hapus'])){
		$data = mysql_fetch_assoc($hasil);
		$foto = $data['foto'];
		$sql = "delete from barang where idbarang = '$id'";
		$hasil = mysql_query($sql);
		if (!$hasil){
			echo "Gagal Hapus ID: $kode ..<br/>";
			echo "<a href='barang_tampil.php'>Kembali ke Daftar Barang</a>";
		}else {
			$gbr = "pict/$foto";
			if (file_exists($gbr)) unlink($gbr);
			$gbr = "thumb/t_$foto";
			if (file_exists($gbr)) unlink($gbr);
			header('location:barang_tampil.php');
		}
	}
?>