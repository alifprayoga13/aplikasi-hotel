<?php
    include "../config/koneksi.php";
    @$aksi = $_POST['aksi'];
    if($aksi == null){
        $aksi = $_GET['aksi'];
    }
 
    if($aksi=="submit"){
        $id_user = $_POST['id_user'];
        $id_akun = $_POST['id_akun'];
        $nama_lengkap = $_POST['nama_lengkap'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $alamat = $_POST['alamat'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $sql_user = mysqli_query($conn,
        "insert into user values ('$id_user','$nama_lengkap',
        '$tempat_lahir','$tanggal_lahir','$alamat')");
        $sql2_akun = mysqli_query($conn,
        "insert into akun values ('$id_akun','$username',md5('$password'),'$email',
        '$id_user')");
        if($sql_user && $sql2_akun){
            header('location: ../index.php?halaman=data_costumer');
        }else{
            echo "salah";
        }
    }elseif($aksi=="update"){
        $id_user = $_POST['id_user'];
        $id_akun = $_POST['id_akun'];
        $nama_lengkap = $_POST['nama_lengkap'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $alamat = $_POST['alamat'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $sql_user = mysqli_query($conn,
        "update user set nama = '$nama_lengkap',
        tempat_lahir ='$tempat_lahir', tanggal_lahir = '$tanggal_lahir',
        alamat = '$alamat' where id_user = '$id_user'");
        $sql2_akun = mysqli_query($conn,
        "update akun set username = '$username', password = md5('$password')
        ,email = '$email' where id_pengguna ='$id_user'");
        if($sql_user && $sql2_akun){
            header('location: ../index.php?halaman=data_costumer');
        }else{
            echo mysqli_error($conn);
        }

    }elseif($aksi=="delete"){
        $id_user = $_GET['id'];
        
        $sql_akun = mysqli_query($conn,"delete from akun where id_pengguna='$id_user'");
        $sql_user = mysqli_query($conn,"delete from user where id_user = '$id_user'");
        if($sql_akun && $sql_user){
            header('location: ../index.php?halaman=data_costumer');
        }else{
            echo mysqli_error($conn);
        }
    }
   
?>