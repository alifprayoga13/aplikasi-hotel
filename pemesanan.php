 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-11">
            <h1 class="m-0">PEMESANAN</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">FORM USER</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">ID User</label>
                    <!-- menampilkan data user dan akun terakhir -->
                    <input type="text" class="form-control" name="id_user" id="id_user">
                    
                 </div>
                 <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <!-- menampilkan data user dan akun terakhir -->
                    <input type="text" class="form-control" name="nama" id="nama" readonly>
                    
                 </div>
                 <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Lahir</label>
                    <!-- menampilkan data user dan akun terakhir -->
                    <input type="text" class="form-control" name="tgl_lahir" id="tgl_lahir" readonly>
                    
                 </div>
                </div>
                <!-- /.card-body -->
                           
                
              
            </div>
            <!-- /.card -->
          </div>
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">FORM KAMAR</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">ID KAMAR</label>
                    <!-- menampilkan data user dan akun terakhir -->
                    <input type="text" class="form-control" name="id_kamar" id="id_kamar">
                    
                 </div>
                 <div class="form-group">
                    <label for="exampleInputEmail1">Nomer Kamar</label>
                    <!-- menampilkan data user dan akun terakhir -->
                    <input type="text" class="form-control" name="no_kamar" id="no_kamar" readonly>
                    
                 </div>
                 <div class="form-group">
                    <label for="exampleInputEmail1">Lantai</label>
                    <!-- menampilkan data user dan akun terakhir -->
                    <input type="text" class="form-control" name="lantai" id="lantai" readonly>
                    
                 </div>
                </div>
                <!-- /.card-body -->
                           
                
              
            </div>
          </div>
        <!-- /.row -->
        <div class="col">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Detail Pesan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class="card-body">
                    <div class="row">
                        <div class="col-md">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal Mulai</label>
                            <input type="date" class="form-control" name="tgl_mulai" id="tgl_mulai">
                        </div>
                        </div>
                        <div class="col-md">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal Selesai</label>
                            <input type="date" class="form-control" name="tgl_selesai" id="tgl_selesai">
                        </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                           
                <div class="card-footer">
                  <button class="btn btn-primary" id="boking">Boking</button>
                </div>
              
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  