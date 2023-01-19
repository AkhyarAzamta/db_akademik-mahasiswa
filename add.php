<?php
require './config/koneksi.php';
require './config/functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Tambah Data</title>
</head>

<body><nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Akademik</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./dosen/dosen.php">Dosen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="./matkul/matkul.php">Matkul</a>
                    </li>
                </ul>
                <form action="./index.php" method="post" class="d-flex">
                    <input class="form-control me-2" name="NIM" type="search" placeholder="Cari Data Mahasiswa" aria-label="Search">
                    <button class="btn btn-outline-success" name="search" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="mx-auto m-5">
        <!-- untuk memasukkan data -->
        <div class="card">
            <div class="card-header bg-info bg-gradient ">
                Create / Edit Data
            </div>
            <div class="card-body">
                <?php
                if ($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php
                    header("refresh:5;url=index.php"); //5 : detik
                }
                ?>
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                    header("refresh:5;url=index.php");
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="NIM" class="col-sm-2 col-form-label">NIM</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="NIM" name="NIM" value="<?php echo $NIM ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="Nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="Nama" name="Nama" value="<?php echo $Nama ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="NIK" class="col-sm-2 col-form-label">NIK</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="NIK" name="NIK" value="<?php echo $NIK ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="JenisKelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="JenisKelamin" id="JenisKelamin">
                                <option value="">- Pilih Jenis Kelamin -</option>
                                <option value="Laki-Laki" <?php if ($JenisKelamin == "Laki-Laki") echo "selected" ?>>Laki-Laki</option>
                                <option value="Perempuan" <?php if ($JenisKelamin == "Perempuan") echo "selected" ?>>Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="TempatLahir" class="col-sm-2 col-form-label">TempatLahir</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="TempatLahir" name="TempatLahir" value="<?php echo $TempatLahir ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="TanggalLahir" class="col-sm-2 col-form-label">TanggalLahir</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="TanggalLahir" name="TanggalLahir" value="<?php echo $TanggalLahir ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="Alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="Alamat" name="Alamat" value="<?php echo $Alamat ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="NoTelp" class="col-sm-2 col-form-label">NoTelp</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="NoTelp" name="NoTelp" value="<?php echo $NoTelp ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-success" />
                    </div>
                </form>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>