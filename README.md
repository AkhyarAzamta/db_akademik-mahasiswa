# ERD Akademik Mahasiswa
ERD (Entity Relationship Diagram) adalah sebuah diagram yang digunakan untuk menggambarkan hubungan antara entitas dalam sebuah basis data. ERD digunakan untuk mendesain struktur basis data yang akan dibuat dan membantu dalam pembuatan kode SQL.

## Instalasi
jalankan xampp di windows :
```bash
buka aplikasi xampp kemudian start apache & Mysql
```
di linux :
```bash
sudo /opt/lampp/xampp start
```

## import databases
import akademik.sql to database and enjoy coding

## Manual Installation
Untuk Tabel Mahasiswa:
```python
CREATE TABLE Mahasiswa (
    NIM VARCHAR(10) PRIMARY KEY,
    Nama VARCHAR(50) NOT NULL,
    JenisKelamin VARCHAR(10) NOT NULL,
    TempatLahir VARCHAR(50) NOT NULL,
    TanggalLahir DATE NOT NULL,
    Alamat TEXT NOT NULL,
    NoTelp VARCHAR(15) NOT NULL,
    Email VARCHAR(50) NOT NULL
);
```


Untuk menampilkan satu data dari tabel Mahasiswa, Anda dapat menggunakan perintah SELECT dengan menambahkan kondisi WHERE. Contohnya seperti ini:
```python
SELECT * FROM Mahasiswa WHERE NIM = '41037006211099';
```
## usage
