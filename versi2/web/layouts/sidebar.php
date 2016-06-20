<?php    //show into table
$sql = "select * from kategori_barang order by nama";
$menu_kategori_barang = mysql_query($sql);
if (!$menu_kategori_barang) {
    die("Gagal query.." . mysql_error());
}
?>
<p class="lead">Chocholate Butique</p>
<div class="list-group">
    <a href="#" class="list-group-item"><span class="glyphicon glyphicon-user"></span> Menu Admin </a>
    <a href="index.php?page=input-kategori" class="list-group-item">Input Kategori </a>
    <a href="index.php?page=input-produk" class="list-group-item">Input Produk</a>
    <a href="#" class="list-group-item">Sms</a>
</div>
<div class="list-group">
    <a href="index.php" class="list-group-item"><span class="glyphicon glyphicon-home"></span> Beranda</a>
    <a href="#" class="list-group-item"><span class="glyphicon glyphicon-shopping-cart"></span> Kategori Produk </a>
    <?php while ($row = mysql_fetch_assoc($menu_kategori_barang)) { ?>
        <a href="index.php?kategori=<?= $row['idkategori']; ?>" class="list-group-item"><?= $row['nama']; ?></a>
    <?php } ?>
</div>
