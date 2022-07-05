 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-11">
            <h1 class="m-0">DATA KAMAR</h1>
          </div><!-- /.col -->
          <div class="col-sm-1">
            <a href="?halaman=tambah_kamar"
             type="button" class="btn btn-primary ml-10">Tambah</a>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Kamar & Jenis Kamar</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>No Kamar</th>
                    <th>Jenis Kamar</th>
                    <th>Kapasitas</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
            <!-- Query Menampilkan Data -->
                <?php
                    $no=1;
                    $sql = mysqli_query($conn,"select * from kamar");
                   
                    while ($data = mysqli_fetch_array($sql)) {
                        ?>
                  <tr>
                    <td><?=$no?></td>
                    <td><?=$data['no_kamar']?></td>
                    <td><?=$data['jenis_kamar']?></td>
                    <td><?=$data['kapasitas']?></td>
                    <td><?=$data['harga']?></td>
                    <td>
                      <a href="?halaman=update_kamar&id=<?=$data['id_kamar']?>" type="button" class=" btn btn-warning"><i class="fas fa-edit"></i></a>
                      <a href="controller/proses_kamar.php?aksi=delete&id=<?=$data['id_kamar']?>" type="button" class=" btn btn-danger"><i class="fas fa-trash"></i></a>
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