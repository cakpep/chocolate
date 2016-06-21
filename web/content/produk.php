<?php
$nama_barang = "";
if (isset($_POST["nama_barang"])) {
  $nama_barang = $_POST["nama_barang"];
  $sql = "select * from barang where nama like '%" . $nama_barang . "%' order by idbarang desc ";
} elseif ($_GET["kategori"]) {
  $sql = "select * from barang where id_kategori=".$_GET['kategori']." order by idbarang desc ";
} else {
  $sql = "select * from barang order by idbarang desc ";
}

$hasil = mysql_query($sql);
if (!$hasil) {
    die("Gagal query.." . mysql_error());
}
?>
<!-- carousel-holder-->
<?php include "web/layouts/carousel.php"; ?>
	<div class="col-md-12 well well-sm">
        <div class="col-md-6">
        </div>
        <div class="col-md-6">
          <form action="index.php?page=produk"  method="post">
            <div id="custom-search-input">
                <div class="input-group col-md-12">
                      <input type="text" class="form-control input-md" name="nama_barang" placeholder="Cari Nama Barang disini" />
                      <span class="input-group-btn">
                          <button class="btn btn-info btn-lg" type="submit">
                              <i class="glyphicon glyphicon-search"></i>
                          </button>
                      </span>
                </div>
            </div>
            </form>
        </div>
	</div>
<?php
while ($row = mysql_fetch_assoc($hasil)) {
    ?>
    <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
            <img src="uploads/produk/<?= $row['foto']; ?>" alt="" style="width:320px; height:150px;">
            <div class="caption">
                <h4 class="pull-right">Rp <?= $row['harga'] ?></h4>
                <h4><a href="#"><?= $row['nama'] ?></a></h4>
                <p><?= $row['keterangan'] ?></p>
            </div>
            <!-- <div class="ratings">
                <p class="pull-right"><a href="index.php">Beli Produk Ini</a></p>
                <p>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                </p>
            </div> -->
        </div>
    </div>
<?php } ?>
<style>
#custom-search-input{
    padding: 3px;
    border: solid 1px #E4E4E4;
    border-radius: 6px;
    background-color: #fff;
}

#custom-search-input input{
    border: 0;
    box-shadow: none;
}

#custom-search-input button{
    margin: 2px 0 0 0;
    background: none;
    box-shadow: none;
    border: 0;
    color: #666666;
    padding: 0 8px 0 10px;
    border-left: solid 1px #ccc;
}

#custom-search-input button:hover{
    border: 0;
    box-shadow: none;
    border-left: solid 1px #ccc;
}

#custom-search-input .glyphicon-search{
    font-size: 23px;
}
</style>
