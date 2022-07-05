 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-11">
            <h1 class="m-0">EDIT CUSTOMER</h1>
          </div><!-- /.col -->
          <div class="col-sm-1">
            <a href="?halaman=data_costumer"
             type="button" class="btn btn-warning ml-10">Kembali</a>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
          <!-- left column -->
          <div class="col">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Tambah User dan Akun</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="controller/proses_costumer.php" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">ID User</label>
                    <!-- menampilkan data user dan akun terakhir -->
                    <?php
                     $id = $_GET['id'];
                        $sql = mysqli_query($conn,
                        "select * from user,akun 
                        where user.id_user = akun.id_pengguna and id_user = '$id'");
                        while ($data= mysqli_fetch_array($sql)) {
                            ?>
                    <input type="text" value="<?= $data['id_user']?>" class="form-control" id="id_user" name="id_user" readonly >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">ID Akun</label>
                    <!-- menampilkan id kamar terakhir -->
                   
                    <input type="text" value="<?= $data['id_akun']?>" class="form-control" id="id_akun" name="id_akun" readonly >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama Lengkap</label>
                    <input type="text" value="<?= $data['nama']?>" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Masukkan nama_lengkap">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Tempat Lahir</label>
                    <input type="text" value="<?= $data['tempat_lahir']?>" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Masukkan tempat_lahir">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Tanggal Lahir</label>
                    <input type="date" value="<?= date('Y-m-d', strtotime($data['tanggal_lahir']))?>" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Masukkan tanggal_lahir">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Alamat</label>
                    <input type="text" value="<?= $data['alamat']?>" class="form-control" name="alamat" id="alamat" placeholder="Masukkan alamat">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Username</label>
                    <input type="text" value="<?= $data['username']?>" class="form-control" name="username" id="username" placeholder="Masukkan username">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" value="<?= $data['password']?>" class="form-control" name="password" id="password" placeholder="Masukkan password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" value="<?= $data['email']?>" class="form-control" name="email" id="email" placeholder="Masukkan email">
                  </div>
                 </div>
                </div>
                <!-- /.card-body -->
                            <?php
                                 }
                        ?>
                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" name="aksi" value="update">
                </div>
              </form>
            </div>
            <!-- /.card -->
    
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  