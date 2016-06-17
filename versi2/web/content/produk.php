<?php
$nama_barang = "";
if (isset($_POST["nama_barang"]))
$nama_barang = $_POST["nama_barang"];

$sql = "select * from barang where nama like '%" . $nama_barang . "%' order by idbarang desc ";
$hasil = mysql_query($sql);
if (!$hasil) {
    die("Gagal query.." . mysql_error());
}
?>
<!-- carousel-holder-->
<?php include "web/layouts/carousel.php"; ?>
<?php
while ($row = mysql_fetch_assoc($hasil)) {
    ?>
    <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">            
            <img src="uploads/produk/<?= $row['foto']; ?>" alt="" style="width:320px; height:150px;">
            <div class="caption">
                <h4 class="pull-right"><?= $row['harga'] ?></h4>
                <h4><a href="#"><?= $row['nama'] ?></a></h4>
                <p>Teks deskripsi barang</p>
            </div>
            <div class="ratings">
                <p class="pull-right">15 reviews</p>
                <p>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                </p>
            </div>
        </div>
    </div>
<?php } ?>