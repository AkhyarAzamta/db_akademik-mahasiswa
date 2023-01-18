<?php
if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if($op == 'delete'){
    $id         = $_GET['NIM'];
    $sql1       = "delete from Mahasiswa where NIM = '$id'";
    $q1         = mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses = "Berhasil hapus data";
    }else{
        $error  = "Gagal melakukan delete data";
    }
}
if ($op == 'edit') {
    $id         = $_GET['NIM'];
    $sql1       = "select * from Mahasiswa where NIM = '$id'";
    $q1         = mysqli_query($koneksi, $sql1);
    $r1         = mysqli_fetch_array($q1);
    $NIM        = $r1['NIM'];
    $Nama       = $r1['Nama'];
    $NIK       = $r1['NIK'];
    $JenisKelamin  = $r1['JenisKelamin'];
    $TempatLahir       = $r1['TempatLahir'];
    $TanggalLahir       = $r1['TanggalLahir'];
    $Alamat     = $r1['Alamat'];
    $NoTelp     = $r1['NoTelp'];

    if ($NIM == '') {
        $error = "Data tidak ditemukan";
    }
}
if (isset($_POST['simpan'])) { //untuk create
    $NIM        = $_POST['NIM'];
    $Nama       = $_POST['Nama'];
    $NIK       = $_POST['NIK'];
    $JenisKelamin  = $_POST['JenisKelamin'];
    $TempatLahir       = $_POST['TempatLahir'];
    $TanggalLahir       = $_POST['TanggalLahir'];
    $Alamat     = $_POST['Alamat'];
    $NoTelp     = $_POST['NoTelp'];

    if ($NIM && $Nama && $NIK && $JenisKelamin && $TempatLahir && $TanggalLahir && $Alamat && $NoTelp) {
        if ($op == 'edit') { //untuk update
            $sql1       = "update Mahasiswa set NIM = '$NIM',Nama='$Nama',NIK='$NIK',JenisKelamin='$JenisKelamin',TempatLahir='$TempatLahir',TanggalLahir='$TanggalLahir',Alamat = '$Alamat',NoTelp = '$NoTelp' where NIM = '$id'";
            $q1         = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error  = "Data gagal diupdate";
            }
        } else { //untuk insert
            $sql1   = "insert into Mahasiswa values ('$NIM','$Nama','$NIK','$JenisKelamin','$TempatLahir','$TanggalLahir','$Alamat','$NoTelp')";
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