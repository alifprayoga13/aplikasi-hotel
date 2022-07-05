 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol> -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php 
                   $sql = mysqli_query($conn,"select count(id_kamar) as jumlah from kamar");
                   while ($data = mysqli_fetch_array($sql)) {
                       ?>
                <h3>
                  <?php 
                      echo $data['jumlah'];
                   }?>
                </h3>

                <p>Kamar</p>
              </div>
              <div class="icon">
                 <i class="fas fa-hospital"></i>
              </div>
              <a href="?halaman=data_kamar" class="small-box-footer">More info
                   <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <?php 
                   $sql = mysqli_query($conn,"select count(id_user) as jumlah from user");
                   while ($data = mysqli_fetch_array($sql)) {
                       ?>
                <h3>
                  <?php 
                      echo $data['jumlah'];
                   }?>
                </h3>

                <p>Costumer</p>
              </div>
              <div class="icon">
               <i class="fas fa-bed"></i>
              </div>
              <a href="?halaman=data_costumer" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              <?php 
                   $sql = mysqli_query($conn,"select count(id_operator) as jumlah from operator");
                   while ($data = mysqli_fetch_array($sql)) {
                       ?>
                <h3>
                  <?php 
                      echo $data['jumlah'];
                   }?>
                </h3>

                <p>Operator</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <?php 
                   $sql_kamar = mysqli_query($conn,"
                   select id_kamar as jumlah from kamar");
                   $sql_pemesanan = mysqli_query($conn,"
                   select id_kamar as jumlah from kamar where status != 2 and status != 3");
                   $data_kamar = mysqli_num_rows($sql_kamar);
                   $data_pemesanan = mysqli_num_rows($sql_pemesanan);
                   $data = ($data_pemesanan/$data_kamar)/0.1;
                  
                  ?>
                <h3>
                  <?php 
                      echo $data."%";
                   ?>
                </h3>

                <p>Kapasitas Hotel</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        







        
            
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>