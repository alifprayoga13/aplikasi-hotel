<?php 
  session_start();
  include "config/koneksi.php";
  @$page = $_GET['halaman'];
  @$action = $_GET['action'];
  
  if ($_SESSION['email '] && $_SESSION['pass']) {
      ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/png" href="assets/logo1.svg"/>
  <title>HOTEL PERMATA | <?= @$page ?></title>
  <!-- Source Sweetalert -->
  <script src="dist/js/sweetalert.js"></script>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li> -->
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> -->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="?halaman" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">HOTEL PERMATA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Andrian's</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
     
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <?php
              if ($_SESSION['role']=="O") {
                  ?>
            <li class="nav-item ">
                <a href="?halaman=dashboard" class="nav-link ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    
                    </p>
                </a>
                
            </li>
          <li class="nav-item ">
            <a href="#" class="nav-link ">
            <i class=" nav-icon fas fa-database"></i>
              <p>
                Data Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?halaman=data_kamar" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                  <p>Data Kamar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?halaman=data_costumer" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Custumer</p>
                </a>
              </li>
             
            </ul>
          </li>
          <li class="nav-item ">
            <a href="#" class="nav-link ">
             <i class="nav-icon fas fa-handshake"></i>
              <p>
                TRANSAKSI
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?halaman=pemesanan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pemesanan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?halaman=persetujuan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Persetujuan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?halaman=checkout" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Check Out</p>
                </a>
              </li>
             
            </ul>
          </li>
          <li class="nav-item ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Laporan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?halaman=laporan_pemesanan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pemesanan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?halaman=laporan_custumer" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Costumer</p>
                </a>
              </li>
             
            </ul>
          </li>
          <?php
              }elseif($_SESSION['role']=="U"){
          ?>
          <li class="nav-item ">
            <a href="#" class="nav-link ">
             <i class="nav-icon fas fa-handshake"></i>
              <p>
                TRANSAKSI
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?halaman=pemesanan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pemesanan</p>
                </a>
              </li>
            </ul>
          </li>
          <?php
              }
          ?>
          <li class="nav-item ">
            <a href="controller/proses_login.php?aksi=logout" class="nav-link">
            <i class="fas fa-sign-out-alt nav-icon"></i>
              <p>
                LOGOUT
      
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <?php
    
    if ($page == 'dashboard' || $page == null) {
        include "dashboard.php";
    } elseif ($page == "data_kamar") {
        include "data_kamar.php";
    } elseif ($page == "tambah_kamar") {
        include "tambah_kamar.php";
    } elseif ($page == "update_kamar") {
        include "update_kamar.php";
    } elseif ($page =="data_costumer") {
        include "data_costumer.php";
    } elseif ($page =="tambah_costumer") {
        include "tambah_costumer.php";
    } elseif ($page == "update_costumer") {
        include "update_costumer.php";
    } elseif ($page == "pemesanan") {
        include "pemesanan.php";
    } elseif ($page == "persetujuan") {
        include "persetujuan.php";
    } elseif ($page == "checkout") {
        include "checkout.php";
    } elseif ($page == "laporan_pemesanan") {
        include "laporan pemesanan.php";
    } elseif ($page == "laporan_custumer") {
        include "laporan_customer.php";
    } ?>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2022 Muhammmad Daffa Nur Maulidan
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>

<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
</body>
</html>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
   
   

  });
</script>
<script>
  $(document).ready(function(){
    $('#id_user').on('change',function(){
      var id = $(this).val();
      $.ajax({
            type: 'POST',
            url: 'controller/proses_pemesanan.php',
            data: {
              search_user: id
            },
              cache: false,
              success: function(data) {
                
                var dataparse = $.parseJSON(data);
                console.log(dataparse);
                $('#nama').val(dataparse[1]);
                $('#tgl_lahir').val(dataparse[3]);
            }
        });
    });
    $('#id_kamar').on('change',function(){
      
      var id = $(this).val();
    
      $.ajax({
            type: 'POST',
            url: 'controller/proses_pemesanan.php',
            data: {
              search_kamar: $('#id_kamar').val()
            },
              cache: false,
              success: function(data) {
                
                var dataparse = $.parseJSON(data);
                console.log(dataparse);
                $('#no_kamar').val(dataparse[1]);
                $('#lantai').val(dataparse[3]);
            }
        });
    });
  });
</script>
<script>
$( "#boking" ).click(function() {
  var id_user = $('#id_user').val();
  var id_kamar = $('#id_kamar').val();
  var tgl_mulai = $('#tgl_mulai').val();
  var tgl_selesai = $('#tgl_selesai').val();
  var submit = "submit";
  $.ajax({
    type:'POST',
    url: 'controller/proses_pemesanan.php',
    data: {
        "id_user":id_user,
        "id_kamar":id_kamar,
        "tgl_mulai":tgl_mulai,
        "tgl_selesai":tgl_selesai,
        "submit": submit,
    },
        cache: false,
        success: function(data) {
          swal({
            title: "Berhasil",
            text: "Data Pemesanan Masuk",
            icon: "success",
          });
    }
  })
});
</script> 
<script>
  $('.id_ya').click(function(){
    var row = $(this).closest("tr");    
    var id_pemesanan = row.find("#id_pemesanan").val();
    var id_kamar = row.find("#id_kamar").val();
    var aksi = "ya";
    $.ajax({
      type:'POST',
      url: 'controller/proses_pemesanan.php',
      data: {
          "id_pemesanan":id_pemesanan,
          "id_kamar":id_kamar,
          "aksi":aksi
          
      },
          cache: false,
          success: function(data) {
            swal({
              title: "Berhasil",
              text: "Selamat Datang",
              icon: "success",
            });
            location.reload();
      }
    });
  });
  // $('.cetak_boking').click(function(){
  //   var row = $(this).closest("tr");    
  //   var id_pemesanan = row.find("#id_pemesanan").val();
  //   var aksi = "cetak_boking";
  //   $.ajax({
  //     type:'POST',
  //     url: 'controller/proses_pemesanan.php',
  //     data: {
  //         "id_pemesanan":id_pemesanan,
  //         "aksi":aksi
          
  //     },
  //         cache: false,
  //         success: function(data) {
  //           ('#id_pemesanan').html(data)
  //     }
  //   });
  // });
  // $('.cetak_checkin').click(function(){
  //   alert("coba2");
  // });
</script>
<?php
  }else{
    header("Location: login.php");
  }
?>