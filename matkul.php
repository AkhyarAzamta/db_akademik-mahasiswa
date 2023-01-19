<?php
require 'koneksi.php'; 
require 'fmatkul.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Karyawan Teknik Uninus</title>
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
                    header("refresh:5;url=matkul.php");//5 : detik
                }
                ?>
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                    header("refresh:5;url=matkul.php");
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="KodeMK" class="col-sm-2 col-form-label">KodeMK</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="KodeMK" name="KodeMK" value="<?php echo $KodeMK ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="NamaMatakuliah" class="col-sm-2 col-form-label">NamaMatakuliah</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="NamaMatakuliah" name="NamaMatakuliah" value="<?php echo $NamaMatakuliah ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="SKS" class="col-sm-2 col-form-label">SKS</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="SKS" name="SKS" value="<?php echo $SKS ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="JenisKelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="JenisKelamin" id="JenisKelamin">
                                <option value="">- Pilih Jenis Kelamin -</option>
                                <option value="Laki-Laki" <?php if ($JenisKelamin== "Laki-Laki") echo "selected" ?>>Laki-Laki</option>
                                <option value="Perempuan" <?php if ($JenisKelamin== "Perempuan") echo "selected" ?>>Perempuan</option>
                            </select>
                        </div>
                    </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-success" />
                    </div>
                </form>
            </div>
        </div>

        <!-- untuk mengeluarkan data -->
        <div class="card">
            <div class="card-header text-white bg-gradient bg-primary">
            Data Mata Kuliah 
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">KodeMK</th>
                            <th scope="col">Nama MataKuliah</th>
                            <th scope="col">SKS</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql2   = "select * from Matakuliah";
                        $q2     = mysqli_query($koneksi, $sql2);
                        $urut   = 1;
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $id         = $r2['KodeMK'];
                            $KodeMK        = $r2['KodeMK'];
                            $NamaMatakuliah       = $r2['NamaMatakuliah'];
                            $SKS  = $r2['SKS'];


                        ?>
                            <tr>
                                <th scope="row"><?php echo $urut++ ?></th>
                                <td scope="row"><?php echo $KodeMK ?></td>
                                <td scope="row"><?php echo $NamaMatakuliah ?></td>
                                <td scope="row"><?php echo $SKS?></td>
                                <td scope="row">
                                    <a href="matkul.php?op=edit&KodeMK=<?php echo $KodeMK ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                    <a href="matkul.php?op=delete&KodeMK=<?php echo $KodeMK?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn btn-danger">Delete</button></a>            
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
