from FilmBioskop import FilmBioskop


def tampilkanData(daftarFilm):
    # Fungsi ini menampilkan seluruh film yang tersimpan di dalam daftar.
    for i, film in enumerate(daftarFilm, start=1):
        print(f"\nFilm ke-{i}")
        print("--------------------------")
        film.tampilkanData()


def main():
    # Fungsi utama ini membuat data awal, membaca data baru, dan menampilkan hasilnya.
    daftarFilm = [
        FilmBioskop(1, "Interstellar", "Sci-Fi", 169, "Christopher Nolan", 2014, "Studio 1", 50000, "19:30"),
        FilmBioskop(2, "Inception", "Sci-Fi", 148, "Christopher Nolan", 2010, "Studio 2", 45000, "20:00"),
        FilmBioskop(3, "Avengers: Doomsday", "Action", 180, "Russo Bros", 2026, "Studio 3", 60000, "21:00"),
        FilmBioskop(4, "Agak Laen 2", "Comedy", 96, "Aco Tenri", 2025, "Studio 4", 35000, "17:30"),
        FilmBioskop(5, "Merah Putih One For All", "Action", 120, "Unknown", 2025, "Studio 5", 40000, "18:45")
    ]

    # Bagian ini menampilkan seluruh data awal sebelum menerima input baru.
    print("=== Data Awal ===")
    tampilkanData(daftarFilm)

    # Blok ini membaca data film baru dan menangani input yang bukan angka atau tidak tersedia.
    try:
        id_film = int(input().strip())
        judul = input().strip()
        genre = input().strip()
        durasi = int(input().strip())
        sutradara = input().strip()
        tahun = int(input().strip())
        studio = input().strip()
        harga = float(input().strip())
        jadwal = input().strip()
    except (ValueError, EOFError):
        print("Input tidak valid!")
        return

    # Data baru hanya diproses apabila semua teks terisi dan angka memiliki nilai yang valid.
    if not judul or not genre or not sutradara or not studio or not jadwal or durasi <= 0 or harga < 0:
        print("Input tidak valid!")
        return

    # Pemeriksaan ini memastikan ID film baru belum digunakan oleh data sebelumnya.
    if any(f.getId() == id_film for f in daftarFilm):
        print("ID sudah digunakan!")
        return

    # Data film baru ditambahkan setelah lolos validasi dan pemeriksaan ID.
    daftarFilm.append(FilmBioskop(id_film, judul, genre, durasi, sutradara, tahun, studio, harga, jadwal))
    print("\n=== Data Setelah Penambahan ===")
    tampilkanData(daftarFilm)


if __name__ == "__main__":
    main()
