 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-11">
            <h1 class="m-0">EDIT KAMAR</h1>
          </div><!-- /.col -->
          <div class="col-sm-1">
            <a href="?halaman=data_kamar"
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
                <h3 class="card-title">Form Tambah Kamar</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="controller/proses_kamar.php" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">ID Kamar</label>
                    <!-- menampilkan id kamar terakhir -->
                    <?php
                        $id= $_GET['id'];
                        $sql = mysqli_query($conn,"select * from kamar where id_kamar = '$id'");
                        
                        while ($data= mysqli_fetch_array($sql)) {
                            ?>
                    <input type="text" value="<?php echo $id; ?>" class="form-control" id="id_kamar" name="id_kamar" readonly >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">No Kamar</label>
                    <input type="text" value="<?= $data['no_kamar']?>" class="form-control" name="no_kamar" id="no_kamar" placeholder="Masukkan No Kamar">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Jenis Kamar</label>
                    <select class="form-control" name="jenis_kamar" id="jenis_kamar">
                        <option value="single" <?= $data['jenis_kamar'] == "single" ? "selected" : null?>>Single</option>
                        <option value="Double"  <?= $data['jenis_kamar'] == "double" ? "selected" : null?>>Double</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Lantai</label>
                    <input type="text" value="<?= $data['lantai']?>" class="form-control" name="lantai" id="lantai" placeholder="Masukkan Lantai">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Kapasitas</label>
                    <input type="text" value="<?= $data['kapasitas']?>" class="form-control" name="kapasitas" id="kapasitas" placeholder="Masukkan Kapasitas">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Harga</label>
                   
                  <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input type="text" value="<?= $data['harga']?>" class="form-control" name="harga" id="harga">
                        <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                        </div>
                    </div>
                 </div>
                </div>
                <!-- /.card-body -->
                        <?php
                        }
                        ?>
                <div class="card-footer">
                  <input type="submit" class="btn btn-warning" name="aksi" value="update">
                </div>
              </form>
            </div>
            <!-- /.card -->
    
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  