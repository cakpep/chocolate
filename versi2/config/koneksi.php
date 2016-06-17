<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
	$host = "localhost";
	$user = "root";
	$pass = "";
	$dbName = "chocolate";
	
	$kon = mysql_connect($host, $user, $pass);
	if (!$kon)
		die("Gagal koneksi...");
	$hasil = mysql_select_db($dbName);
	if (!$hasil){
		$hasil = mysql_query("CREATE DATABASE $dbName");
		if (!$hasil)
			die("Gagal Buat Database");
	else
		$hasil =mysql_select_db($dbName);
		if (!$hasil) die ("Gagal Konek Database");	
	}
	
	$sqlTabelBarang = "create table if not exists barang (
					idbarang int auto_increment not null primary key,
                                        id_kategori  int null,
					nama varchar(40) null,
					harga int null default 0,
					foto varchar(70) null default '', 
					KEY(nama))";
	
	$sqlTabelHjual = "create table if not exists hjual (
					idhjual int auto_increment not null primary key,
					tanggal date not null, namacust varchar(40) not null,
					email varchar(50) not null default '',
					notelp varchar(20) not null default'')";
		
	$sqlTabelDjual = "create table if not exists djual (
					iddjual int auto_increment not null primary key,
					idhjual int not null, idbarang int not null,
					qty int not null, harga int not null)";
        
        $sqlTabelkategoriBarang = "create table if not exists kategori_barang (
					idkategori int auto_increment not null primary key,
					nama varchar(50) not null, keterangan text null)";
	
	mysql_query ($sqlTabelBarang) or die ("Gagal Buat Tabel Barang");
	mysql_query ($sqlTabelHjual) or die ("Gagal Buat Tabel Header Jual");
	mysql_query ($sqlTabelDjual) or die ("Gagal Buat Tabel Detail Jual");
        mysql_query ($sqlTabelkategoriBarang) or die ("Gagal Buat Tabel Kategori Barang");