<?php 
    include "../config/koneksi.php";
    session_start();
    if ($_GET['aksi']=="login") {
        $email = $_POST['email'];
        $pass   = $_POST['password'];
        $sql = mysqli_query($conn,"
        select * from akun where email='$email' and password=md5('$pass')");
        $role = mysqli_query($conn,
        "SELECT SUBSTR(id_pengguna,1,1) AS id_pengguna FROM akun 
        where email='$email' and password=md5('$pass')");
        
        $validasi = mysqli_num_rows($sql);
        
        if ($validasi >= 1) {
            $_SESSION['email ']= $email;
            $_SESSION['pass'] =$pass;
            while($data = mysqli_fetch_array($role)){
                $_SESSION['role'] = $data['id_pengguna'];
               
            }
            header("location: ../index.php?halaman=dashboard");
        }else{
            header("location: ../login.php");
        }
    }elseif($_GET['aksi']=="logout"){
        session_destroy();
        header("location: ../login.php");
    }
?>