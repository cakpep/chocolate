<!-- register process -->
<?php require_once "daftar-process.php"; ?>
<div class="container">
    <h1 class="well">Form Pendaftaran</h1>
      <div class="col-lg-12 well">
        <div class="row">
            <?php if(!empty($ktg_msg)){ ?>
                <div class="col-md-12">
                    <div class="alert <?= $class ?>">
                        <?= $ktg_msg ?>
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                </div>
            <?php } ?>
      			<form action="index.php?page=daftar" method="post">
              <input type="HIDDEN" name="id_form" value="form_daftar">
      				<div class="col-sm-12">
      					<div class="row">
      						<div class="col-sm-6 form-group">
      							<label>Username</label>
      							<input type="text" placeholder="masukan Username anda.." class="form-control" name="username">
      						</div>
      						<div class="col-sm-6 form-group">
      							<label>Password</label>
      							<input type="password" placeholder="Masukan Password anda.." class="form-control" name="password">
      						</div>
      					</div>
                <hr>
                <div class="row">
      						<div class="col-sm-4 form-group">
      							<label>Nama</label>
      							<input type="text" placeholder="masukan nama lengkap Anda.." class="form-control" name="nama">
      						</div>
      						<div class="col-sm-4 form-group">
      							<label>Tanggal Lahir</label>
      							<input type="text" placeholder="masukan Tanggal Lahir anda.." class="form-control" name="ttl">
      						</div>
      						<div class="col-sm-4 form-group">
      							<label>Jenis kelamin</label>
      							<input type="text" placeholder="Pilih Kelamin Anda.." class="form-control" name="jenkel">
      						</div>
      					</div>
      					<div class="row">
                  <div class="col-sm-6 form-group">
      							<label>Alamat Email</label>
      							<input type="email" placeholder="Masukan Alamat Email Anda.." class="form-control" name="email">
      						</div>
      						<div class="col-sm-6 form-group">
      							<label>No Telp</label>
      							<input type="text" placeholder="Masukan Halaman anda disini.." class="form-control" name="notelp">
      						</div>
      					</div>
      					<div class="form-group">
      						<label>Alamat</label>
      						<textarea placeholder="Masukan Alamat anda disini.." rows="3" class="form-control" name="alamat"></textarea>
      					</div>
                <div class="form-group text-center">
      				       <button type="submit" class="btn btn-lg btn-info">Daftar</button>
                </div>
      				</div>
      			</form>
          </div>
      </div>
	</div>
