<?php
if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if($op == 'delete'){
    $id         = $_GET['KodeMK'];
    $sql1       = "delete from Matakuliah where KodeMK = '$id'";
    $q1         = mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses = "Berhasil hapus data";
    }else{
        $error  = "Gagal melakukan delete data";
    }
}
if ($op == 'edit') {
    $id         = $_GET['KodeMK'];
    $sql1       = "select * from Matakuliah where KodeMK = '$id'";
    $q1         = mysqli_query($koneksi, $sql1);
    $r1         = mysqli_fetch_array($q1);
    $KodeMK        = $r1['KodeMK'];
    $NamaMatakuliah       = $r1['NamaMatakuliah'];
    $SKS  = $r1['SKS'];

    if ($KodeMK == '') {
        $error = "Data tidak ditemukan";
    }
}
if (isset($_POST['simpan'])) { //untuk create
    $KodeMK        = $_POST['KodeMK'];
    $NamaMatakuliah       = $_POST['NamaMatakuliah'];
    $SKS  = $_POST['SKS'];


    if ($KodeMK && $NamaMatakuliah && $SKS) {
        if ($op == 'edit') { //untuk update
            $sql1       = "update Matakuliah set KodeMK = '$KodeMK',NamaMatakuliah='$NamaMatakuliah',SKS='$SKS' where KodeMK = '$id'";
            $q1         = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error  = "Data gagal diupdate";
            }
        } else { //untuk insert
            $sql1   = "insert into Matakuliah(KodeMK, NamaMatakuliah, SKS) values ('$KodeMK','$NamaMatakuliah','$SKS')";
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