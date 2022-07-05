<?php
    function rupiah($angka){
	
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;
     
    }
    include '../config/koneksi.php';
    require_once '../dist/laporan/fpdf.php';
    if(isset($_POST['search_user'])){
        $id = $_POST['search_user'];
        $sql = mysqli_query($conn,
        "select * from user where id_user = '$id'");
        echo json_encode($sql->fetch_row());
    }
    if(isset($_POST['search_kamar'])){
        $id = $_POST['search_kamar'];
        $sql = mysqli_query($conn,
        "select * from kamar where id_kamar = '$id' and status = 1");
        echo json_encode($sql->fetch_row());
    }
    if(isset($_POST['submit'])){
        $id_user = $_POST['id_user'];
        $id_kamar = $_POST['id_kamar'];
        $tgl_mulai = $_POST['tgl_mulai'];
        $tgl_selesai = $_POST['tgl_selesai'];
        $tgl_sekarang = date_create('now')->format('Y-m-d');
        $sql1 = mysqli_query($conn,
        "insert into pemesanan 
        (id_user,id_kamar,tgl_mulai,tgl_selesai,tgl_pemesanan,status)
        values
        ('$id_user','$id_kamar','$tgl_mulai','$tgl_selesai',
        '$tgl_sekarang','2')");
        $sql2 = mysqli_query($conn,
        "update kamar set status = 2 where id_kamar = '$id_kamar'");
        if($sql1 && $sql2){ 
            return true;
        }else{
            return mysqli_error($conn);
        }
    }
    if(isset($_POST['aksi'])){
        if($_POST['aksi'] == "ya"){
            $id_pemesanan = $_POST['id_pemesanan'];
            $id_kamar = $_POST['id_kamar'];
            $sql = mysqli_query($conn,
            "update pemesanan set status = 3 where id_pemesanan = '$id_pemesanan'");
            $sql2 = mysqli_query($conn,
            "update kamar set status = 3 where id_kamar = '$id_kamar'");
            if($sql && $sql2){
                return true;
            }else{
                return false;
            }
        }
        
    }
    if (@$_GET['aksi'] == "cetak_boking") {
        $id_pemesanan = $_GET['id'];
        $sql = mysqli_query(
            $conn,
            "SELECT id_pemesanan,nama, no_kamar,pemesanan.status,
        kamar.harga,lantai,tgl_pemesanan,tgl_mulai,tgl_selesai
        FROM USER,pemesanan,kamar 
        WHERE user.id_user = pemesanan.id_user
        AND kamar.id_kamar = pemesanan.id_kamar
        AND id_pemesanan = '$id_pemesanan'"
        );
        while ($data = mysqli_fetch_array($sql)) {
            $pdf=new FPDF('L', 'mm', 'A5');
            // menghitung jarak hari
            $tanggal1 = new DateTime($data['tgl_mulai']);
            $tanggal2 = new DateTime($data['tgl_selesai']);
            $jarak_hari = $tanggal2->diff($tanggal1)->format("%a");
            /*membuat file PDF untuk dicetak*/
            $pdf->setMargins(10, 6, 10);
            $pdf->AddPage();
            $pdf->Image('../assets/stempel_boking.jpg',110,60,-300);
            $pdf->SetFont('Arial', 'B', 13);
            $pdf->Cell(0, 5, " HOTEL LOTUS", 0, 1, 'C');
            $pdf->SetFont('Arial', '', 11);
            $pdf->MultiCell(0, 5, "Jln kediri mojoroto kediri \n"."08999999999",0,'C');
            $pdf->SetLineWidth(0.8);
            $pdf->Line(10, 28, 199, 28);
            $pdf->Ln(8);
            $pdf->SetFont('Arial', 'B', 13);
            $pdf->Cell(70,10, '', 10, 0, '1');
            $pdf->Cell(0, 16, "BUKTI BOKING", 0, 1, 'L');
            $pdf->SetLineWidth(0.4);
            $pdf->Rect(60, 30, 80, 13);
            $pdf->SetFont('Arial', '', 11);
           
          
            $pdf->Cell(45, 5, 'Nama Pemesan :', 0, 0, 'L');
            $pdf->Cell(10, 5, ':', 0, 0, 'C');
            $pdf->Cell(50, 7,$data['nama'], 0, 1, 'L');
            $pdf->Cell(45, 5, 'Nomer Kamar ', 0, 0, 'L');
            $pdf->Cell(10, 5, ':', 0, 0, 'C');
            $pdf->Cell(50, 7,$data['no_kamar'], 0, 1, 'L');
            $pdf->Cell(45, 5, 'Status ', 0, 0, 'L');
            $pdf->Cell(10, 5, ':', 0, 0, 'C');
            $pdf->Cell(50, 7,"BOKING", 0, 1, 'L');
            $pdf->Cell(45, 5, 'Harga ', 0, 0, 'L');
            $pdf->Cell(10, 5, ':', 0, 0, 'C');
            $pdf->Cell(50, 7,rupiah($data['harga']), 0, 1, 'L');
            $pdf->Cell(45, 5, 'Lama Hari', 0, 0, 'L');
            $pdf->Cell(10, 5, ':', 0, 0, 'C');
            $pdf->Cell(50, 7,$jarak_hari, 0, 1, 'L');
            $pdf->Cell(45, 5, 'Harga Total', 0, 0, 'L');
            $pdf->Cell(10, 5, ':', 0, 0, 'C');
            $pdf->Cell(50, 7,rupiah((int)$data['harga']*(int)$jarak_hari), 0, 1, 'L');
            $pdf->Cell(45, 5, 'Tanggal Pemesanan', 0, 0, 'L');
            $pdf->Cell(10, 5, ':', 0, 0, 'C');
            $pdf->Cell(50, 7,$data['tgl_pemesanan'], 0, 1, 'L');
            $pdf->Output();
        }
    }elseif(@$_GET['aksi']== "cetak_checkin"){
        $id_pemesanan = $_GET['id'];
        $sql = mysqli_query(
            $conn,
            "SELECT id_pemesanan,nama, no_kamar,pemesanan.status,
        kamar.harga,lantai,tgl_pemesanan,tgl_mulai,tgl_selesai
        FROM USER,pemesanan,kamar 
        WHERE user.id_user = pemesanan.id_user
        AND kamar.id_kamar = pemesanan.id_kamar
        AND id_pemesanan = '$id_pemesanan'"
        );
        while ($data = mysqli_fetch_array($sql)) {
            $pdf=new FPDF('L', 'mm', 'A5');
            // menghitung jarak hari
           
            $tanggal1 = new DateTime($data['tgl_mulai']);
            $tanggal2 = new DateTime($data['tgl_selesai']);
            $jarak_hari = $tanggal2->diff($tanggal1)->format("%a");
            /*membuat file PDF untuk dicetak*/
            $pdf->setMargins(10, 6, 10);
            $pdf->AddPage();
            $pdf->Image('../assets/stempel_checkinjpg.jpg',110,60,-300);
            $pdf->SetFont('Arial', 'B', 13);
            $pdf->Cell(0, 5, " HOTEL LOTUS", 0, 1, 'C');
            $pdf->SetFont('Arial', '', 11);
            $pdf->MultiCell(0, 5, "Jln kediri mojoroto kediri \n"."08999999999",0,'C');
            $pdf->SetLineWidth(0.8);
            $pdf->Line(10, 28, 199, 28);
            $pdf->Ln(8);
            $pdf->SetFont('Arial', 'B', 13);
            $pdf->Cell(70,10, '', 10, 0, '1');
            $pdf->Cell(0, 16, "BUKTI CHECK IN", 0, 1, 'L');
            $pdf->SetLineWidth(0.4);
            $pdf->Rect(60, 30, 80, 13);
            $pdf->SetFont('Arial', '', 11);
           
          
            $pdf->Cell(45, 5, 'Nama Pemesan :', 0, 0, 'L');
            $pdf->Cell(10, 5, ':', 0, 0, 'C');
            $pdf->Cell(50, 7,$data['nama'], 0, 1, 'L');
            $pdf->Cell(45, 5, 'Nomer Kamar ', 0, 0, 'L');
            $pdf->Cell(10, 5, ':', 0, 0, 'C');
            $pdf->Cell(50, 7,$data['no_kamar'], 0, 1, 'L');
            $pdf->Cell(45, 5, 'Status ', 0, 0, 'L');
            $pdf->Cell(10, 5, ':', 0, 0, 'C');
            $pdf->Cell(50, 7,"Checkin", 0, 1, 'L');
            $pdf->Cell(45, 5, 'Harga ', 0, 0, 'L');
            $pdf->Cell(10, 5, ':', 0, 0, 'C');
            $pdf->Cell(50, 7,rupiah($data['harga']), 0, 1, 'L');
            $pdf->Cell(45, 5, 'Lama Hari', 0, 0, 'L');
            $pdf->Cell(10, 5, ':', 0, 0, 'C');
            $pdf->Cell(50, 7,$jarak_hari, 0, 1, 'L');
            $pdf->Cell(45, 5, 'Harga Total', 0, 0, 'L');
            $pdf->Cell(10, 5, ':', 0, 0, 'C');
            $pdf->Cell(50, 7,rupiah((int)$data['harga']*(int)$jarak_hari), 0, 1, 'L');
            $pdf->Cell(45, 5, 'Tanggal Pemesanan', 0, 0, 'L');
            $pdf->Cell(10, 5, ':', 0, 0, 'C');
            $pdf->Cell(50, 7,$data['tgl_pemesanan'], 0, 1, 'L');
            $pdf->Output();
        }
    }elseif(@$_GET['aksi']=="checkout"){
        $id_pemesanan = $_GET['id_pemesanan'];
        $id_kamar = $_GET['id_kamar'];
       
        $sql_kamar = mysqli_query($conn,
        "update kamar set status = 1 where id_kamar='$id_kamar' ");

        $sql_pemesanan = mysqli_query($conn,
        "update pemesanan set status = 1 where id_pemesanan='$id_pemesanan'");
        // cetak bukti checkout
        $sql = mysqli_query(
            $conn,
            "SELECT id_pemesanan,nama, no_kamar,pemesanan.status,
        kamar.harga,lantai,tgl_pemesanan,tgl_mulai,tgl_selesai
        FROM USER,pemesanan,kamar 
        WHERE user.id_user = pemesanan.id_user
        AND kamar.id_kamar = pemesanan.id_kamar
        AND id_pemesanan = '$id_pemesanan'"
        );
        while ($data = mysqli_fetch_array($sql)) {
            $pdf=new FPDF('L', 'mm', 'A5');
            // menghitung jarak hari
           
            $tanggal1 = new DateTime($data['tgl_mulai']);
            $tanggal2 = new DateTime($data['tgl_selesai']);
            $jarak_hari = $tanggal2->diff($tanggal1)->format("%a");
            /*membuat file PDF untuk dicetak*/
            $pdf->setMargins(10, 6, 10);
            $pdf->AddPage();
            $pdf->Image('../assets/stempel_checkout.jpg',110,60,-300);
            $pdf->SetFont('Arial', 'B', 13);
            $pdf->Cell(0, 5, " HOTEL LOTUS", 0, 1, 'C');
            $pdf->SetFont('Arial', '', 11);
            $pdf->MultiCell(0, 5, "Jln kediri mojoroto kediri \n"."08999999999",0,'C');
            $pdf->SetLineWidth(0.8);
            $pdf->Line(10, 28, 199, 28);
            $pdf->Ln(8);
            $pdf->SetFont('Arial', 'B', 13);
            $pdf->Cell(70,10, '', 10, 0, '1');
            $pdf->Cell(0, 16, "BUKTI CHECK OUT", 0, 1, 'L');
            $pdf->SetLineWidth(0.4);
            $pdf->Rect(60, 30, 80, 13);
            $pdf->SetFont('Arial', '', 11);
           
          
            $pdf->Cell(45, 5, 'Nama Pemesan :', 0, 0, 'L');
            $pdf->Cell(10, 5, ':', 0, 0, 'C');
            $pdf->Cell(50, 7,$data['nama'], 0, 1, 'L');
            $pdf->Cell(45, 5, 'Nomer Kamar ', 0, 0, 'L');
            $pdf->Cell(10, 5, ':', 0, 0, 'C');
            $pdf->Cell(50, 7,$data['no_kamar'], 0, 1, 'L');
            $pdf->Cell(45, 5, 'Status ', 0, 0, 'L');
            $pdf->Cell(10, 5, ':', 0, 0, 'C');
            $pdf->Cell(50, 7,"Checkin", 0, 1, 'L');
            $pdf->Cell(45, 5, 'Harga ', 0, 0, 'L');
            $pdf->Cell(10, 5, ':', 0, 0, 'C');
            $pdf->Cell(50, 7,rupiah($data['harga']), 0, 1, 'L');
            $pdf->Cell(45, 5, 'Lama Hari', 0, 0, 'L');
            $pdf->Cell(10, 5, ':', 0, 0, 'C');
            $pdf->Cell(50, 7,$jarak_hari, 0, 1, 'L');
            $pdf->Cell(45, 5, 'Harga Total', 0, 0, 'L');
            $pdf->Cell(10, 5, ':', 0, 0, 'C');
            $pdf->Cell(50, 7,rupiah((int)$data['harga']*(int)$jarak_hari), 0, 1, 'L');
            $pdf->Cell(45, 5, 'Tanggal Pemesanan', 0, 0, 'L');
            $pdf->Cell(10, 5, ':', 0, 0, 'C');
            $pdf->Cell(50, 7,$data['tgl_pemesanan'], 0, 1, 'L');
            $pdf->Output();
        }


    }
    
?>