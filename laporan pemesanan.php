 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-11">
            <h1 class="m-0">LAPORAN PEMESANAN</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Laporan Pemesanan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Nomer Kamar</th>
                    <th>Tanggal</th>
                   
                  </tr>
                  </thead>
                  <tbody>
            <!-- Query Menampilkan Data -->
                <?php
                    $no=1;
                    $sql = mysqli_query($conn,"select * from data_pemesanan where status = 1");
                   
                    while ($data = mysqli_fetch_array($sql)) {
                        ?>
                  <tr>
                    <td><?=$no?></td>
                    <td><?=$data['nama']?></td>
                    <td><?=$data['no_kamar']?></td>
                    <td><?=$data['tgl_pemesanan']?></td>
                    
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
  </div> <!-- Content Wrapper. Contains page content -->
 