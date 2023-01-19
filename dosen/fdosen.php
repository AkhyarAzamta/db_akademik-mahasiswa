<?php
if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if($op == 'delete'){
    $id         = $_GET['NIP'];
    $sql1       = "delete from Dosen where NIP = '$id'";
    $q1         = mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses = "Berhasil hapus data";
    }else{
        $error  = "Gagal melakukan delete data";
    }
}
if ($op == 'edit') {
    $id         = $_GET['NIP'];
    $sql1       = "select * from Dosen where NIP = '$id'";
    $q1         = mysqli_query($koneksi, $sql1);
    $r1         = mysqli_fetch_array($q1);
    $NIP        = $r1['NIP'];
    $Nama       = $r1['Nama'];
    $JenisKelamin  = $r1['JenisKelamin'];

    if ($NIP == '') {
        $error = "Data tidak ditemukan";
    }
}
if (isset($_POST['simpan'])) { //untuk create
    $NIP        = $_POST['NIP'];
    $Nama       = $_POST['Nama'];
    $JenisKelamin  = $_POST['JenisKelamin'];


    if ($NIP && $Nama && $JenisKelamin) {
        if ($op == 'edit') { //untuk update
            $sql1       = "update Dosen set NIP = '$NIP',Nama='$Nama',JenisKelamin='$JenisKelamin' where NIP = '$id'";
            $q1         = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error  = "Data gagal diupdate";
            }
        } else { //untuk insert
            $sql1   = "insert into Dosen values ('$NIP','$Nama','$JenisKelamin')";
            $q1     = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses     = "Berhasil memasukkan data baru";
            } else {
                $error      = "Gagal memasukkan data";
            }
        }
    } else {
        $error = "Silakan masukkan semua data";
    }
}
?>