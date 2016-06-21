<?php require_once "input-produk-query.php"; ?>
<div class="col-md-12">
    <h3>Input Produk</h3><hr>
</div>
<?php if(!empty($ktg_msg)){ ?>
    <div class="col-md-12">
        <div class="alert <?= $class ?>">
            <?= $ktg_msg ?>
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        </div>
    </div>
<?php } ?>

<div class="col-md-12">
    <div class="row">
        <div class="col-md-6">
            <form role="form" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_form" value="form_produk">
                <div class="form-group">
                    <label for="nama_produk">Nama Produk</label>
                    <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?= $nama ?>">
                </div>
                <div class="form-group">
                    <label for="id_kategori">Nama Kategori</label>
                    <select class="form-control" name="id_kategori">
                        <?php while ($row_ktg = mysql_fetch_assoc($kategori_barang)) { ?>
                        <option value="<?= $row_ktg['idkategori'] ?>" <?php echo ($id_ktg==$row_ktg['idkategori']  ? 'selected' : ""); ?>>
                                <?= $row_ktg['nama'] ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                  <label for="harga">Harga</label>
                  <div class="input-group">
                    <span class="input-group-btn">
                        <span class="btn btn-info">Rp</span>
                    </span>
                    <input type="text" class="form-control" id="harga" name="harga" value="<?= $harga ?>">
                  </div>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea class="form-control" id="keterangan" name="keterangan"><?= $ket ?></textarea>
                </div>
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control" id="foto" name="foto">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<div class="col-md-12">
    <h3>Daftar Produk</h3><hr>
</div>
<div class="col-md-12">
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id Produk</th>
                    <th>Nama Produk</th>
                    <th>Nama kategori</th>
                    <th>harga</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysql_fetch_assoc($daftar_produk)) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['idbarang']; ?></td>
                        <td><?= $row['nama']; ?></td>
                        <td><?= $row['nama_ktg']; ?></td>
                        <td><?= $row['harga']; ?></td>
                        <td><img src="uploads/produk/<?= $row['foto']; ?>" alt="" width="100" height="100"></td>
                        <td><a href="index.php?page=input-produk&edit-produk=<?= $row['idbarang'] ?>" class="btn btn-sm btn-info">Edit</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
