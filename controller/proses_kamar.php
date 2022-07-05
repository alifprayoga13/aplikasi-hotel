<?php
    include "../config/koneksi.php";
    @$aksi = $_POST['aksi'];
    if($aksi == null){
        $aksi = $_GET['aksi'];
    }
    if($aksi == "submit"){
        // fungsi menambahkan data kamar
        $id_kamar = $_POST['id_kamar'];
        $no_kamar = $_POST['no_kamar'];
        $jenis_kamar = $_POST['jenis_kamar'];
        $lantai = $_POST['lantai'];
        $kapasitas = $_POST['kapasitas'];
        $harga = $_POST['harga'];
        $id_operator = "O-001";
        $status = 1;
        $sql = mysqli_query($conn,
        "insert into kamar values ('$id_kamar','$no_kamar',
        '$jenis_kamar','$lantai','$kapasitas'
        ,'$harga','$id_operator','$status')");
        if($sql){
            header('location: ../index.php?halaman=data_kamar');
        }else{
            echo "salah";
        }
    }else if($aksi == "update"){
        // update data kamar
        $id_kamar = $_POST['id_kamar'];
        $no_kamar = $_POST['no_kamar'];
        $jenis_kamar = $_POST['jenis_kamar'];
        $lantai = $_POST['lantai'];
        $kapasitas = $_POST['kapasitas'];
        $harga = $_POST['harga'];
        $id_operator = "O-001";
        $status = 1;
        
        $sql = mysqli_query($conn,"update kamar set no_kamar = 
        '$no_kamar',jenis_kamar = '$jenis_kamar',lantai = '$lantai',
        kapasitas = '$kapasitas',harga ='$harga',id_operator = '$id_operator',
        status = '$status' where id_kamar = '$id_kamar'");
       
        if($sql){
            header('location: ../index.php?halaman=data_kamar');
        }else{
            echo "Kode error: ".mysqli_errno($conn);
            echo "<br />";
            echo "Pesan error: ".mysqli_error($conn);
        }
    }else if($aksi == "delete"){
        $id= $_GET['id'];
        $sql = mysqli_query($conn,
        "delete from kamar where id_kamar = '$id'");
        if($sql){
            header('location: ../index.php?halaman=data_kamar');
        }else{
            echo "Kode error: ".mysqli_errno($conn);
            echo "<br />";
            echo "Pesan error: ".mysqli_error($conn);
        }
    }
    
?>