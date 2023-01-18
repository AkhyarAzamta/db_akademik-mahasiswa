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
                                <td scope="row"><?php echo $JenisKelamin?></td>
                                <td scope="row"><?php echo $TempatLahir ?></td>
                                <td scope="row"><?php echo $TanggalLahir ?></td>
                                <td scope="row"><?php echo $Alamat ?></td>
                                <td scope="row"><?php echo $NoTelp ?></td>
                                <td scope="row">
                                    <a href="index.php?op=edit&NIM=<?php echo $NIM ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                    <a href="index.php?op=delete&NIM=<?php echo $NIM?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn btn-danger">Delete</button></a>            
                                </td>
                            </tr>
                        <?php
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
