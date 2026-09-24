#include <iostream>
#include <iomanip>
#include <string>
#include <vector>
#include "FilmBioskop.cpp"
using namespace std;

// Method ini menampilkan daftar film dalam format tabel yang dinamis.
void tampilkanTabel(const vector<FilmBioskop>& daftarFilm) {
    vector<string> header = {"ID", "Judul", "Genre", "Durasi", "Sutradara", "Tahun Rilis", "Studio", "Harga Tiket", "Jadwal Tayang"};
    vector<int> lebar;
    for (const auto& kolom : header) {
        lebar.push_back((int)kolom.length());
    }

    for (const auto& film : daftarFilm) {
        lebar[0] = max(lebar[0], (int)to_string(film.getId()).length());
        lebar[1] = max(lebar[1], (int)film.getJudul().length());
        lebar[2] = max(lebar[2], (int)film.getGenre().length());
        lebar[3] = max(lebar[3], (int)to_string(film.getDurasi()).length());
        lebar[4] = max(lebar[4], (int)film.getSutradara().length());
        lebar[5] = max(lebar[5], (int)to_string(film.getTahunRilis()).length());
        lebar[6] = max(lebar[6], (int)film.getStudio().length());
        lebar[7] = max(lebar[7], (int)to_string((long long)film.getHargaTiket()).length());
        lebar[8] = max(lebar[8], (int)film.getJadwalTayang().length());
    }

    auto cetakBaris = [&](const vector<string>& kolom) {
        cout << "|";
        for (size_t i = 0; i < kolom.size(); i++) {
            cout << " " << left << setw(lebar[i]) << kolom[i] << " |";
        }
        cout << endl;
    };

    string garis = "+";
    for (int w : lebar) {
        garis += string(w + 2, '-') + "+";
    }

    cout << garis << endl;
    cetakBaris(header);
    cout << garis << endl;

    for (const auto& film : daftarFilm) {
        vector<string> data = {
            to_string(film.getId()),
            film.getJudul(),
            film.getGenre(),
            to_string(film.getDurasi()),
            film.getSutradara(),
            to_string(film.getTahunRilis()),
            film.getStudio(),
            to_string((long long)film.getHargaTiket()),
            film.getJadwalTayang()
        };
        cetakBaris(data);
    }

    cout << garis << endl;
}

// Method utama ini membuat data awal, menerima data baru, dan menampilkan hasilnya.
int main() {
    vector<FilmBioskop> daftarFilm;

    // Lima objek berikut digunakan sebagai data awal film bioskop.
    daftarFilm.push_back(FilmBioskop(1, "Interstellar", "Sci-Fi", 169, "Christopher Nolan", 2014, "Studio 1", 50000, "19:30"));
    daftarFilm.push_back(FilmBioskop(2, "Inception", "Sci-Fi", 148, "Christopher Nolan", 2010, "Studio 2", 45000, "20:00"));
    daftarFilm.push_back(FilmBioskop(3, "Avengers: Doomsday", "Action", 180, "Russo Bros", 2026, "Studio 3", 60000, "21:00"));
    daftarFilm.push_back(FilmBioskop(4, "Agak Laen 2", "Comedy", 96, "Aco Tenri", 2025, "Studio 4", 35000, "17:30"));
    daftarFilm.push_back(FilmBioskop(5, "Merah Putih One For All", "Action", 120, "Bowo", 2025, "Studio 5", 40000, "18:45"));

    int id, durasi, tahun;
    string judul, genre, sutradara, studio, jadwal;
    double harga;

    // Bagian ini menampilkan seluruh data awal sebelum menerima input baru.
    cout << "\n=== Data Film ===\n";
    tampilkanTabel(daftarFilm);
    cout << "\n=== Masukkan Data Film Baru ===\n";

    // Bagian ini membaca seluruh informasi film baru dari pengguna.
    cout << "\nMasukkan ID : ";
    cin >> id;
    cin.ignore();
    cout << "Judul : ";
    getline(cin, judul);
    cout << "Genre : ";
    getline(cin, genre);
    cout << "Durasi : ";
    cin >> durasi;
    cin.ignore();
    cout << "Sutradara : ";
    getline(cin, sutradara);
    cout << "Tahun Rilis : ";
    cin >> tahun;
    cin.ignore();
    cout << "Studio : ";
    getline(cin, studio);
    cout << "Harga Tiket : ";
    cin >> harga;
    cin.ignore();
    cout << "Jadwal Tayang : ";
    getline(cin, jadwal);

    // Data baru hanya diproses apabila semua teks terisi dan angka memiliki nilai yang valid.
    if (judul.empty() || genre.empty() || sutradara.empty() || studio.empty() || jadwal.empty() || durasi <= 0 || harga < 0) {
        cout << "Input tidak valid!" << endl;
    } else {
        // Pemeriksaan ini memastikan ID film baru belum digunakan oleh data sebelumnya.
        bool duplikat = false;
        for (const auto &film : daftarFilm) {
            duplikat = duplikat || film.getId() == id;
        }

        if (duplikat) {
            cout << "ID sudah digunakan!" << endl;
        } else {
            // Data film baru ditambahkan setelah lolos validasi dan pemeriksaan ID.
            daftarFilm.push_back(FilmBioskop(id, judul, genre, durasi, sutradara, tahun, studio, harga, jadwal));
            cout << "\n=== Data Setelah Penambahan ===\n";
            tampilkanTabel(daftarFilm);
        }
    }

    return 0;
}
