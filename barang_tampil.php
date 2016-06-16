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
<a href="barang_isi.php" >INPUT BARANG</a>
&nbsp; &nbsp; &nbsp; 
<a href="barang_cari.php" >CARI BARANG</a>
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
         echo "  <td> <a href='pict/".$row['foto']." ' />
                 <img src='thumb/t_".$row['foto']." ' width='100' /> 
                 </a> </td> " ;
         echo "  <td> ".$row['nama']." </td> " ;
         echo "  <td> ".$row['harga']." </td> " ;        
		 
		 echo " <td> ";
		 echo " <a href='barang_edit.php?id=" .$row['idbarang'] . "'> EDIT </a> ";
		 echo "&nbsp;&nbsp;";
		 echo " <a href='barang_hapus.php?id=" .$row['idbarang'] . "'> HAPUS </a>";
		 echo " </td>";
		 echo " </tr> ";
       }
    ?>
</table>