<?php require_once "input-kategori-query.php"; ?>
<div class="col-md-12">
    <h3>Input Kategori Barang</h3><hr>
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
            <form role="form" method="post">
                <input type="hidden" name="id_form" value="form_kategori_barang">
                <div class="form-group">
                    <label for="nama_kategori">Nama Kategori</label>
                    <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="<?= $nama ?>">
                </div>
                <div class="form-group">
                    <label for="kategori_keterangan">Keterangan</label>
                    <textarea class="form-control" id="kategori_keterangan" name="kategori_keterangan"><?= $ket ?></textarea>
                </div>  
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
</div>
<div class="col-md-12">
    <h3>Daftar Kategori Barang</h3><hr>
</div>
<div class="col-md-12">
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id kategori</th>
                    <th>Nama kategori</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>        
            </thead>
            <tbody>
                <?php while ($row = mysql_fetch_assoc($kategori_barang)) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['idkategori']; ?></td>
                        <td><?= $row['nama']; ?></td>
                        <td><?= $row['keterangan']; ?></td>
                        <td><a href="index.php?page=input-kategori&edit-ktg=<?= $row['idkategori'] ?>" class="btn btn-sm btn-info">Edit</a></td>
                    </tr>
                <?php } ?>
            </tbody>      
        </table>
    </div>
</div>