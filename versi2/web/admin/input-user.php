<?php require_once "input-user-query.php"; ?>
<div class="col-md-12">
    <h3>Daftar User/Pengguna</h3><hr>
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
              <form method="post">
                <input type="HIDDEN" name="id_form" value="form_user">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-sm-6 form-group">
                      <label>Username</label>
                      <input type="text" placeholder="masukan Username" class="form-control" name="username" value="<?= $username; ?>">
                    </div>
                    <div class="col-sm-6 form-group">
                      <label>Password</label>
                      <input type="password" placeholder="Masukan Password" class="form-control" name="password" >
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-4 form-group">
                      <label>Nama</label>
                      <input type="text" placeholder="masukan nama lengkap" class="form-control" name="nama" value="<?= $nama; ?>">
                    </div>
                    <div class="col-sm-4 form-group">
                      <label>Tanggal Lahir</label>
                      <input type="text" placeholder="masukan Tanggal Lahir" class="form-control" name="ttl" value="<?= $ttl; ?>">
                    </div>
                    <div class="col-sm-4 form-group">
                      <label>Jenis kelamin</label>
                      <input type="text" placeholder="Pilih Kelamin" class="form-control" name="jenkel" value="<?= $jenkel; ?>">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4 form-group">
                      <label>Alamat Email</label>
                      <input type="email" placeholder="Masukan Alamat Email" class="form-control" name="email" value="<?= $email; ?>">
                    </div>
                    <div class="col-sm-4 form-group">
                      <label>No Telp</label>
                      <input type="text" placeholder="Masukan No Telp" class="form-control" name="notelp" value="<?= $notelp; ?>">
                    </div>
                    <div class="col-sm-4 form-group">
                      <label>Level</label>
                      <select class="form-control" name="level_user">
                          <?php while ($row_ktg = mysql_fetch_assoc($user_level)) { ?>
                          <option value="<?= $row_ktg['id_level'] ?>" <?php echo ($level==$row_ktg['id_level']  ? 'selected' : ""); ?>>
                                  <?= $row_ktg['nama'] ?>
                              </option>
                          <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <textarea placeholder="Masukan Alamat" rows="3" class="form-control" name="alamat"><?= $alamat; ?></textarea>
                  </div>
                  <div class="form-group">
                       <button type="submit" class="btn btn-md btn-info">Simpan data</button>
                  </div>
                </div>
              </form>

</div>
<div class="col-md-12">
    <h3>Daftar Pengguna</h3><hr>
</div>
<div class="col-md-12">
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id User</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysql_fetch_assoc($users)) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['iduser']; ?></td>
                        <td><?= $row['username']; ?></td>
                        <td><?= $row['nama']; ?></td>
                        <td><?= $row['email']; ?></td>
                        <td><a href="index.php?page=input-user&edit-ktg=<?= $row['iduser'] ?>" class="btn btn-sm btn-info">Edit</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
