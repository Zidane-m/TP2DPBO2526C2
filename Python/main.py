from FilmBioskop import FilmBioskop


def tampilkanData(daftarFilm):
    # Fungsi ini menampilkan seluruh film yang tersimpan di dalam daftar dalam format tabel dinamis.
    headers = ["ID", "Judul", "Genre", "Durasi", "Sutradara", "Tahun Rilis", "Studio", "Harga Tiket", "Jadwal Tayang"]
    rows = []

    for film in daftarFilm:
        rows.append([
            str(film.getId()),
            film.getJudul(),
            film.getGenre(),
            str(film.getDurasi()),
            film.getSutradara(),
            str(film.getTahunRilis()),
            film.getStudio(),
            str(film.getHargaTiket()),
            film.getJadwalTayang()
        ])

    widths = [len(str(header)) for header in headers]
    for row in rows:
        for i, value in enumerate(row):
            widths[i] = max(widths[i], len(value))

    def print_row(values):
        cells = [str(value).ljust(widths[i]) for i, value in enumerate(values)]
        print("| " + " | ".join(cells) + " |")

    border = "+" + "+".join("-" * (width + 2) for width in widths) + "+"
    print(border)
    print_row(headers)
    print(border)
    for row in rows:
        print_row(row)
    print(border)


def bacaInput(prompt):
    # Fungsi ini menampilkan teks petunjuk, lalu membaca satu baris input dari user.
    print(prompt, end="")
    return input().strip()


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
    print("=== Data Film ===")
    tampilkanData(daftarFilm)
    print("\n=== Masukkan Data Film Baru ===")

    # Blok ini membaca data film baru dan menangani input yang bukan angka atau tidak tersedia.
    try:
        id_film = int(bacaInput("Masukkan ID baru: "))
        judul = bacaInput("Masukkan judul: ")
        genre = bacaInput("Masukkan genre: ")
        durasi = int(bacaInput("Masukkan durasi: "))
        sutradara = bacaInput("Masukkan sutradara: ")
        tahun = int(bacaInput("Masukkan tahun rilis: "))
        studio = bacaInput("Masukkan studio: ")
        harga = int(bacaInput("Masukkan harga tiket: "))
        jadwal = bacaInput("Masukkan jadwal tayang: ")
    except (ValueError, EOFError):
        print("Input tidak valid!")
        return

    # Data baru hanya diproses apabila semua field wajib telah diisi dan nilainya sesuai ketentuan.
    if id_film <= 0 or tahun <= 0 or not judul or not genre or not sutradara or not studio or not jadwal or durasi <= 0 or harga < 0:
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
