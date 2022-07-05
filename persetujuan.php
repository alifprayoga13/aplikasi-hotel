 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-11">
            <h1 class="m-0">PERSETUJUAN</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Silahkan Di Setujui</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Nomer Kamar</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
            <!-- Query Menampilkan Data -->
                <?php
                    $no=1;
                    $sql = mysqli_query($conn,"select * from data_pemesanan where status = 2 or status = 3");
                   
                    while ($data = mysqli_fetch_array($sql)) {
                        ?>
                  <tr>
                    <td><?=$no?></td>
                    <td><?=$data['nama']?></td>
                    <td><?=$data['no_kamar']?></td>
                    <td>
                        <?php if($data['status'] == 2){ ?>
                          <a type="button" href="controller/proses_pemesanan.php?id=<?=$data['id_pemesanan']?>&aksi=cetak_boking" 
                          class="btn btn-success ">
                            <i class="nav-icon fas fa-file-alt"></i> Boking
                          </a>
                        <?php  }else{  ?>
                          <a type="button" href="controller/proses_pemesanan.php?id=<?=$data['id_pemesanan']?>&aksi=cetak_checkin" class="btn btn-info ">
                            <i class="nav-icon fas fa-file-alt"></i> Checkin
                          </a>
                        <?php  }?>
                    </td>
                    <td>
                    <input type="hidden" id="id_pemesanan" value="<?=$data['id_pemesanan']?>">
                    <input type="hidden" id="id_kamar" value="<?=$data['id_kamar']?>">
                      <button type="button" id="ya" class=" btn btn-warning id_ya"><i class="fas fa-check"></i></button>
                      <button type="button" id="tidak" class=" btn btn-danger id_tidak"><i class="fas fa-times"></i></button>
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