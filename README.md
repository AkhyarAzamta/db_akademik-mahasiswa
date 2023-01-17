# ERD Akademik Mahasiswa
ERD (Entity Relationship Diagram) adalah sebuah diagram yang digunakan untuk menggambarkan hubungan antara entitas dalam sebuah basis data. ERD digunakan untuk mendesain struktur basis data yang akan dibuat dan membantu dalam pembuatan kode SQL.

<img src="/img.png">

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
import akademik.sql to database and enjoy COPY PASTE

##

## Project Structure
Tabel Mahasiswa:
```bash
NIM (PK)
Nama
JenisKelamin
TempatLahir
TanggalLahir
Alamat
NoTelp
Email
```
Tabel Prodi:
```bash
IDProdi (PK)
NamaProdi
Jenjang
```
Tabel Kelas:
```bash
IDKelas (PK)
NamaKelas
IDProdi (FK)
```
Tabel Matakuliah:
```bash
IDMatakuliah (PK)
NamaMatakuliah
SKS
IDProdi (FK)
```
Tabel AmbilMatakuliah:
```bash
IDAmbilMatakuliah (PK)
NIM (FK)
IDMatakuliah (FK)
Nilai
Semester
```
Tabel Dosen:
```bash
NIP (PK)
Nama
JenisKelamin
TempatLahir
TanggalLahir
Alamat
NoTelp
Email
```
Tabel Mengajar:
```bash
IDMengajar (PK)
NIP (FK)
IDMatakuliah (FK)
IDKelas (FK)
```
Tabel Jadwal:
```bash
IDJadwal (PK)
IDKelas (FK)
IDMatakuliah (FK)
Hari
Waktu
```
##
Note : Primary Key (PK)
       Foreign KEY (FK)
##
## ERD (Entity Relationship Diagram)
```bash
Tabel Mahasiswa terhubung dengan Tabel AmbilMatakuliah dengan FK NIM
```
```bash
Tabel Prodi terhubung dengan Tabel Kelas dengan FK IDProdi
```
```bash
Tabel Prodi terhubung dengan Tabel Matakuliah dengan FK IDProdi
```
```bash
Tabel Matakuliah terhubung dengan Tabel AmbilMatakuliah dengan FK IDMatakuliah
```
```bash
Tabel Matakuliah terhubung dengan Tabel Mengajar dengan FK IDMatakuliah
```
```bash
Tabel Kelas terhubung dengan Tabel Mengajar dengan FK IDKelas
```
```bash
Tabel Dosen terhubung dengan Tabel Mengajar dengan FK NIP
```
```bash
Tabel Kelas terhubung dengan Tabel Jadwal dengan FK IDKelas
```
```bash
Tabel Matakuliah terhubung dengan Tabel Jadwal dengan FK IDMatakuliah
```


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
Untuk Tabel Prodi:
```python
CREATE TABLE Prodi (
    IDProdi INT PRIMARY KEY,
    NamaProdi VARCHAR(50) NOT NULL,
    Jenjang VARCHAR(20) NOT NULL
);
```
Untuk Tabel Kelas:
```python
CREATE TABLE Kelas (
    IDKelas INT PRIMARY KEY,
    NamaKelas VARCHAR(50) NOT NULL,
    IDProdi INT NOT NULL,
    FOREIGN KEY (IDProdi) REFERENCES Prodi(IDProdi)
);
```
Untuk Tabel Matakuliah:
```python
CREATE TABLE Matakuliah (
    IDMatakuliah INT PRIMARY KEY,
    NamaMatakuliah VARCHAR(50) NOT NULL,
    SKS INT NOT NULL,
    IDProdi INT NOT NULL,
    FOREIGN KEY (IDProdi) REFERENCES Prodi(IDProdi)
);
```
Untuk Tabel AmbilMatakuliah:
```python
CREATE TABLE AmbilMatakuliah (
    IDAmbilMatakuliah INT PRIMARY KEY,
    NIM VARCHAR(10) NOT NULL,
    IDMatakuliah INT NOT NULL,
    Nilai INT NOT NULL,
    Semester VARCHAR(10) NOT NULL,
    FOREIGN KEY (NIM) REFERENCES Mahasiswa(NIM),
    FOREIGN KEY (IDMatakuliah) REFERENCES Matakuliah(IDMatakuliah)
);
```
Untuk Tabel Dosen:
```python
CREATE TABLE Dosen (
    NIP VARCHAR(20) PRIMARY KEY,
    Nama VARCHAR(50) NOT NULL,
    JenisKelamin VARCHAR(10) NOT NULL,
    TempatLahir VARCHAR(50) NOT NULL,
    TanggalLahir DATE NOT NULL,
    Alamat TEXT NOT NULL,
    NoTelp VARCHAR(15) NOT NULL,
    Email VARCHAR(50) NOT NULL
);
```
Untuk Tabel Mengajar:
```python
CREATE TABLE Mengajar (
    IDMengajar INT PRIMARY KEY,
    NIP VARCHAR(20) NOT NULL,
    IDMatakuliah INT NOT NULL,
    IDKelas INT NOT NULL,
    FOREIGN KEY (NIP) REFERENCES Dosen(NIP),
    FOREIGN KEY (IDMatakuliah) REFERENCES Matakuliah(IDMatakuliah),
    FOREIGN KEY (IDKelas) REFERENCES Kelas(IDKelas)
);
```
Untuk Tabel Jadwal:
```python
CREATE TABLE Jadwal (
    IDJadwal INT PRIMARY KEY,
    IDKelas INT NOT NULL,
    IDMatakuliah INT NOT NULL,
    Hari VARCHAR(10) NOT NULL,
    Waktu TIME NOT NULL,
    FOREIGN KEY (IDKelas) REFERENCES Kelas(IDKelas),
    FOREIGN KEY (IDMatakuliah) REFERENCES Matakuliah(IDMatakuliah)
);
```
##
## Menampilkan Data
Untuk menampilkan satu data dari tabel Mahasiswa, Anda dapat menggunakan perintah SELECT dengan menambahkan kondisi WHERE. Contohnya seperti ini:
```python
SELECT * FROM Mahasiswa WHERE NIM = '41037006211099';
```
Perintah di atas akan menampilkan semua data dari baris yang memiliki NIM = '41037006211099'. Jika Anda hanya ingin menampilkan beberapa kolom tertentu, Anda dapat mengganti '*' dengan nama kolom yang diinginkan. Contohnya seperti ini:
```python
SELECT Nama, JenisKelamin, TempatLahir FROM Mahasiswa WHERE NIM = '41037006211099';
```
Perintah di atas akan menampilkan hanya kolom Nama, JenisKelamin, dan TempatLahir dari baris yang memiliki NIM = '41037006211099'.

Jika Anda ingin menampilkan data mahasiswa dengan kondisi tertentu seperti tahun lahir atau alamat, Anda dapat menambahkan kondisi WHERE lainnya. Contohnya seperti ini:
```python
SELECT * FROM Mahasiswa WHERE TanggalLahir BETWEEN '2000-01-01' AND '2005-12-31' AND Alamat = 'Bandung';
```
Perintah di atas akan menampilkan semua data dari baris yang memiliki tanggal lahir antara tahun 2000-2005 dan alamat di Bandung.
##
## Menghapus Data
Untuk menghapus satu data dari tabel, Anda dapat menggunakan perintah DELETE dengan menambahkan kondisi WHERE. Contohnya seperti ini:
```python
DELETE FROM Mahasiswa WHERE NIM = '12345678';
```
Perintah di atas akan menghapus baris yang memiliki NIM = '12345678' dari tabel Mahasiswa. Ini akan menghapus seluruh data dari baris tersebut dan juga semua data yang terkait di tabel lain yang memiliki relasi dengan tabel Mahasiswa melalui foreign key.

Seperti contoh lain, jika Anda ingin menghapus data dari tabel Mengajar dengan IDMengajar = 1, Anda dapat menjalankan perintah seperti ini:
```python
DELETE FROM Mengajar WHERE IDMengajar = 1;
```
Sebelum menghapus data pastikan anda melakukan backup atau seleksi data yang akan dihapus, atau pastikan anda memiliki akses yang cukup untuk menghapus data.

Harap berhati-hati dalam menjalankan perintah DELETE karena data yang dihapus tidak dapat dikembalikan lagi.
##
## Source Code by

[Akhyar Azamta](https://github.com/AkhyarAzamta)
