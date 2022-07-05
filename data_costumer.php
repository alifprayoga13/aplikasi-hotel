  <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-11">
            <h1 class="m-0">DATA CUSTOMER</h1>
          </div><!-- /.col -->
          <div class="col-sm-1">
            <a href="?halaman=tambah_costumer"
             type="button" class="btn btn-primary ml-10">Tambah</a>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Customer</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
            <!-- Query Menampilkan Data -->
                <?php
                    $no=1;
                    $sql = mysqli_query($conn,
                    "select * from user,akun where user.id_user = akun.id_pengguna");
                   
                    while ($data = mysqli_fetch_array($sql)) {
                        ?>
                  <tr>
                    <td><?=$no?></td>
                    <td><?=$data['nama']?></td>
                    <td><?=$data['alamat']?></td>
                    <td><?=$data['username']?></td>
                    <td><?=$data['email']?></td>
                    <td>
                      <a href="?halaman=update_costumer&id=<?=$data['id_user']?>" type="button" class=" btn btn-warning"><i class="fas fa-edit"></i></a>
                      <a href="controller/proses_costumer.php?aksi=delete&id=<?=$data['id_user']?>" type="button" class=" btn btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                  <?php
                   $no++; }
                  ?>
                 <!-- /Query menampilkan data -->
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>