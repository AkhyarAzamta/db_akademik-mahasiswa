<?php
require 'koneksi.php';
require 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa Karyawan Teknik Uninus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 95vw;
        }

        .card {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <form method="post" class="d-flex">
                    <input class="form-control me-2" name="NIM" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" name="search" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <button class="btn btn-success m-4 ">Tambah Data</button>
    <!-- untuk mengeluarkan data -->
    <div class="card">
        <div class="card-header text-white bg-gradient bg-primary">
            Data Mahasiswa Karyawan Teknik Uninus
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Nama</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Tempat Lahir</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">NoTelp</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['search'])) {
                        $NIM = $_POST['NIM'];
                        $Nama = $_POST['Nama'];
                        $JenisKelamin = $_POST['JenisKelamin'];
                        $TempatLahir = $_POST['TempatLahir'];
                        $TanggalLahir = $_POST['TanggalLahir'];
                        $Alamat = $_POST['Alamat'];
                        $NoTelp = $_POST['NoTelp'];

                        //query untuk mencari data Mahasiswa
                        $sql2 = "SELECT * FROM Mahasiswa WHERE NIM LIKE '%$NIM%' AND Nama LIKE '%$Nama%' AND JenisKelamin LIKE '%$JenisKelamin%' AND TempatLahir LIKE '%$TempatLahir%' AND TanggalLahir LIKE '%$TanggalLahir%' AND Alamat LIKE '%$Alamat%' AND NoTelp LIKE '%$NoTelp%'";

                        //eksekusi query
                        $q2     = mysqli_query($koneksi, $sql2);
                        $urut   = 1;

                        //menampilkan data Mahasiswa
                        while ($r2 = mysqli_fetch_array($q2)) {
                            // $id         = $r2['NIM'];
                            $NIM        = $r2['NIM'];
                            $Nama       = $r2['Nama'];
                            $NIK        = $r2['NIK'];
                            $JenisKelamin  = $r2['JenisKelamin'];
                            $TempatLahir        = $r2['TempatLahir'];
                            $TanggalLahir        = $r2['TanggalLahir'];
                            $Alamat     = $r2['Alamat'];
                            $NoTelp     = $r2['NoTelp'];
                    ?>
                            <tr>
                                <th scope="row"><?php echo $urut++ ?></th>
                                <td scope="row"><?php echo $NIM ?></td>
                                <td scope="row"><?php echo $Nama ?></td>
                                <td scope="row"><?php echo $NIK ?></td>
                                <td scope="row"><?php echo $JenisKelamin ?></td>
                                <td scope="row"><?php echo $TempatLahir ?></td>
                                <td scope="row"><?php echo $TanggalLahir ?></td>
                                <td scope="row"><?php echo $Alamat ?></td>
                                <td scope="row"><?php echo $NoTelp ?></td>
                                <td scope="row">
                                    <a href="index.php?op=edit&NIM=<?php echo $NIM ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                    <a href="index.php?op=delete&NIM=<?php echo $NIM ?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn btn-danger">Delete</button></a>
                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <?php

                        $sql2   = "select * from Mahasiswa";
                        $q2     = mysqli_query($koneksi, $sql2);
                        $urut   = 1;
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $id         = $r2['NIM'];
                            $NIM        = $r2['NIM'];
                            $Nama       = $r2['Nama'];
                            $NIK        = $r2['NIK'];
                            $JenisKelamin  = $r2['JenisKelamin'];
                            $TempatLahir        = $r2['TempatLahir'];
                            $TanggalLahir        = $r2['TanggalLahir'];
                            $Alamat     = $r2['Alamat'];
                            $NoTelp     = $r2['NoTelp'];

                        ?>
                            <tr>
                                <th scope="row"><?php echo $urut++ ?></th>
                                <td scope="row"><?php echo $NIM ?></td>
                                <td scope="row"><?php echo $Nama ?></td>
                                <td scope="row"><?php echo $NIK ?></td>
                                <td scope="row"><?php echo $JenisKelamin ?></td>
                                <td scope="row"><?php echo $TempatLahir ?></td>
                                <td scope="row"><?php echo $TanggalLahir ?></td>
                                <td scope="row"><?php echo $Alamat ?></td>
                                <td scope="row"><?php echo $NoTelp ?></td>
                                <td scope="row">
                                    <a href="index.php?op=edit&NIM=<?php echo $NIM ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                    <a href="index.php?op=delete&NIM=<?php echo $NIM ?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn btn-danger">Delete</button></a>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>

            </table>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>