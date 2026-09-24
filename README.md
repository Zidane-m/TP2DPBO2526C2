# Tugas Praktikum 2 DPBO 2526 C2 (TP2DPBO2526C2)
Sistem Manajemen Data Film Bioskop dengan Multilevel Inheritance dalam C++, Java, Python, dan PHP.

---

## Janji

> Saya Muhammad Zidan Mirza Fedrieka dengan NIM 2507692 mengerjakan Tugas Praktikum 2 dalam mata kuliah Desain Pemrograman Berorientasi Objek untuk keberkahan-Nya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

---

## Penjelasan Desain dan Kode (Flow Kode)

### 1. Desain Class dan Multilevel Inheritance

Program menggunakan tiga class dengan hubungan pewarisan bertingkat berikut:

```mermaid
classDiagram
	Konten <|-- Film
	Film <|-- FilmBioskop

	class Konten {
		-id
		-judul
		-genre
		+tampilkanData()
	}

	class Film {
		-durasi
		-sutradara
		-tahunRilis
		+tampilkanData()
	}

	class FilmBioskop {
		-studio
		-hargaTiket
		-jadwalTayang
		+tampilkanData()
	}
```

#### Class `Konten`

Class dasar yang menyimpan informasi umum film:

- `id`: identitas unik film.
- `judul`: judul film.
- `genre`: genre film.
- Constructor, getter, setter, dan method `tampilkanData()`.

#### Class `Film extends Konten`

Class turunan pertama yang menambahkan informasi khusus film:

- `durasi`: durasi film dalam menit.
- `sutradara`: nama sutradara film.
- `tahunRilis`: tahun film dirilis.
- Constructor yang memanggil constructor `Konten`.
- Getter, setter, dan override method `tampilkanData()`.

#### Class `FilmBioskop extends Film`

Class turunan kedua yang menambahkan informasi penayangan di bioskop:

- `studio`: nomor atau nama studio.
- `hargaTiket`: harga tiket dalam rupiah.
- `jadwalTayang`: waktu penayangan film.
- Constructor yang memanggil constructor `Film`.
- Getter, setter, dan override method `tampilkanData()`.

Implementasi PHP juga memiliki atribut khusus `gambar` untuk menyimpan path poster film.

### 2. Struktur File

```text
TP2DPBO2526C2/
├── README.md
├── plan.md
├── .gitignore
├── CPP/
│   ├── Konten.cpp
│   ├── Film.cpp
│   ├── FilmBioskop.cpp
│   ├── main.cpp
│   └── testcase.txt
├── Java/
│   ├── Konten.java
│   ├── Film.java
│   ├── FilmBioskop.java
│   ├── Main.java
│   └── testcase.txt
├── Python/
│   ├── Konten.py
│   ├── Film.py
│   ├── FilmBioskop.py
│   ├── main.py
│   └── testcase.txt
└── PHP/
	├── Konten.php
	├── Film.php
	├── FilmBioskop.php
	├── index.php
	├── testcase.txt
	└── images/
```

### 3. Data Awal

Setiap implementasi membuat lima objek awal `FilmBioskop`:

1. Interstellar
2. Inception
3. Avengers: Doomsday
4. Agak Laen 2
5. Merah Putih One For All

PHP menampilkan poster dari folder `PHP/images` dan menyediakan upload poster baru melalui form Bootstrap.

### 4. Alur Eksekusi Program

1. Program membuat lima objek film awal.
2. Seluruh data awal ditampilkan.
3. Program menerima data film baru sesuai urutan testcase.
4. Program memvalidasi data kosong, angka, dan ID duplikat.
5. Jika valid, objek `FilmBioskop` baru ditambahkan ke list, vector, `ArrayList`, atau array.
6. Seluruh data ditampilkan kembali setelah penambahan.

Pada PHP, alur input dilakukan melalui form HTML berbasis Bootstrap. Poster yang diunggah divalidasi, disimpan ke `PHP/images`, dan path-nya disimpan pada atribut `gambar`.

---

## Fitur Program

- Membuat lima data awal film bioskop.
- Menampilkan seluruh atribut dari `Konten`, `Film`, dan `FilmBioskop`.
- Menambah satu data film baru.
- Menolak ID yang sudah digunakan.
- Memvalidasi judul, genre, sutradara, studio, dan jadwal tayang.
- Memvalidasi durasi, tahun rilis, dan harga tiket.
- Menerima teks yang memiliki spasi.
- Menampilkan poster pada implementasi PHP.
- Mengunggah poster baru pada form PHP dengan format JPG, PNG, atau WebP.

Fitur update, delete, dan search tidak digunakan karena TP2 hanya memerlukan fitur Add.

## Cara Menjalankan Program

### 1. Persiapan

Pastikan compiler atau interpreter berikut sudah tersedia:

- `g++` untuk C++.
- `javac` dan `java` untuk Java.
- `python` atau `py` untuk Python.
- `php` untuk PHP.

### 2. C++

```bash
cd CPP
g++ main.cpp -o main.exe
main.exe < testcase.txt
```

Pada PowerShell, gunakan `Get-Content testcase.txt | .\main.exe` karena operator `<` tidak digunakan untuk redirection input.

### 3. Java

```bash
cd Java
javac *.java
java Main < testcase.txt
```

### 4. Python

```bash
cd Python
python main.py < testcase.txt
```

### 5. PHP

```bash
cd PHP
php -S localhost:8000
```
Buka `http://localhost:8000` pada browser. Form PHP menerima semua atribut film dan satu file poster untuk data baru.

## Penjelasan Error Handling

1. **ID duplikat** diperiksa dengan menelusuri seluruh data film sebelum objek baru ditambahkan.
2. **Input teks kosong** ditolak pada C++, Java, Python, dan PHP.
3. **Durasi dan tahun rilis** harus lebih besar dari nol.
4. **Harga tiket** tidak boleh bernilai negatif.
5. **C++** menggunakan `cin.ignore()` sebelum membaca teks dengan `getline()`.
6. **Java** menggunakan `Scanner` untuk membaca data sesuai urutan testcase.
7. **Python** menangani kesalahan konversi angka dengan `try-except`.
8. **PHP** memeriksa status upload, tipe MIME gambar, dan keberhasilan penyimpanan file poster.

## Format Testcase

Setiap folder bahasa memiliki `testcase.txt` dengan urutan input berikut:

```text
101
Dune Part Two
Sci-Fi
166
Denis Villeneuve
2024
Studio 1
50000
19:30
```

Urutan tersebut adalah ID, judul, genre, durasi, sutradara, tahun rilis, studio, harga tiket, dan jadwal tayang.

## Dokumentasi Program

Bagian ini sengaja dikosongkan untuk diisi manual.

### C++

<!-- Isi dokumentasi C++ di sini. -->

### Java

<!-- Isi dokumentasi Java di sini. -->

### Python

<!-- Isi dokumentasi Python di sini. -->

### PHP

<!-- Isi dokumentasi PHP di sini. -->

## Checklist Sebelum Pengumpulan

- [ ] Terdapat tiga class dengan multilevel inheritance.
- [ ] Setiap bahasa memiliki lima objek awal.
- [ ] C++, Java, dan Python menerima input sesuai testcase.
- [ ] PHP memiliki atribut dan input gambar poster.
- [ ] Seluruh atribut tampil dalam tabel lengkap.
- [ ] Terdapat `testcase.txt` pada setiap folder bahasa.
- [ ] Diagram class tersedia pada README.
- [ ] Dokumentasi screenshot telah diisi.
- [ ] File hasil kompilasi tidak disertakan.