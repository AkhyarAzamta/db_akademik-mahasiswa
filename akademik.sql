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
CREATE TABLE Prodi (
    IDProdi INT PRIMARY KEY,
    NamaProdi VARCHAR(50) NOT NULL,
    Jenjang VARCHAR(20) NOT NULL
);
CREATE TABLE Kelas (
    IDKelas INT PRIMARY KEY,
    NamaKelas VARCHAR(50) NOT NULL,
    IDProdi INT NOT NULL,
    FOREIGN KEY (IDProdi) REFERENCES Prodi(IDProdi)
);
CREATE TABLE Matakuliah (
    IDMatakuliah INT PRIMARY KEY,
    NamaMatakuliah VARCHAR(50) NOT NULL,
    SKS INT NOT NULL,
    IDProdi INT NOT NULL,
    FOREIGN KEY (IDProdi) REFERENCES Prodi(IDProdi)
);
CREATE TABLE AmbilMatakuliah (
    IDAmbilMatakuliah INT PRIMARY KEY,
    NIM VARCHAR(10) NOT NULL,
    IDMatakuliah INT NOT NULL,
    Nilai INT NOT NULL,
    Semester VARCHAR(10) NOT NULL,
    FOREIGN KEY (NIM) REFERENCES Mahasiswa(NIM),
    FOREIGN KEY (IDMatakuliah) REFERENCES Matakuliah(IDMatakuliah)
);
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
CREATE TABLE Mengajar (
    IDMengajar INT PRIMARY KEY,
    NIP VARCHAR(20) NOT NULL,
    IDMatakuliah INT NOT NULL,
    IDKelas INT NOT NULL,
    FOREIGN KEY (NIP) REFERENCES Dosen(NIP),
    FOREIGN KEY (IDMatakuliah) REFERENCES Matakuliah(IDMatakuliah),
    FOREIGN KEY (IDKelas) REFERENCES Kelas(IDKelas)
);
CREATE TABLE Jadwal (
    IDJadwal INT PRIMARY KEY,
    IDKelas INT NOT NULL,
    IDMatakuliah INT NOT NULL,
    Hari VARCHAR(10) NOT NULL,
    Waktu TIME NOT NULL,
    FOREIGN KEY (IDKelas) REFERENCES Kelas(IDKelas),
    FOREIGN KEY (IDMatakuliah) REFERENCES Matakuliah(IDMatakuliah)
);