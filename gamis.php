<!DOCTYPE html>
<html>
<head>
<title>Chocolate</title>

<link rel='stylesheet' type='text/css' href='style.css'/>
</head>
<body>
<table border='1px' align='center' width='925px'>
<tr><td colspan='2' height='150px' bgcolor='grey'>
<div style="border: 5px black ridge; padding: 70px; box-shadow: 0 0 5px red;background-image:url(header.png);"><br/>
<font face="britannic bold"></font>
</td></tr>

<h3><tr><td colspan='2' height='25px' >
<div class='menu'>
<a href='gamis.php' title='home'>Home</a>
<a href='contact.php' title='contact'>Contact</a>
<a href='login.php' title='home'>Login</a></div></td></tr><h3>

<tr><td width='120px' height='500px' valign='top' bgcolor='maroon'>
<div class='menu'>
<h3>
<a href="gamis.php">Gamis</a><br>
<a href="koko.php">Baju Koko</a>
<a href="jilbab.php">Jilbab</a>
<a href="dress.php">Dress</a>
</h3>
</div>

</td><td width='500px' valign='top' bgcolor="grey">
<div class='isi'>
<?php
 $nama_barang = "" ;
 if(isset($_POST["nama_barang"]))
    $nama_barang = $_POST["nama_barang"] ;
    
 include "koneksi.php" ;
 $sql = "select * from barang where nama like '%".$nama_barang."%' 
        order by idbarang desc ";	
 $hasil = mysql_query($sql);
 if (!$hasil)
   die("Gagal query..".mysql_error());
?>

<table border="1">
    <tr>
     <th>Foto</th>
     <th>Nama Barang</th>
     <th>Harga Jual</th>
    </tr> 
    <?php	
       $no = 0;
       while ($row = mysql_fetch_assoc($hasil)) { 
         echo " <tr>";
         echo "  <td> <a href='admin/pict/".$row['foto']." ' />
                 <img src='admin/thumb/t_".$row['foto']." ' width='100' /> 
                 </a> </td> " ;
         echo "  <td> ".$row['nama']." </td> " ;
         echo "  <td> ".$row['harga']." </td> " ;        
		 
		 echo " </tr> ";
       }
    ?>
</table>
</div></td></tr>

<tr align='center'><td colspan='2' height='30px' bgcolor='maroon'>
<div class='footer'>&copy; All Right Reserved</div></td></tr>
</table>
</body>
</html>