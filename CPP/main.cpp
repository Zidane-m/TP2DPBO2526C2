#include <iostream>
#include <iomanip>
#include <string>
#include <vector>
#include "FilmBioskop.cpp"
using namespace std;

// Method utama ini membuat data awal, menerima data baru, dan menampilkan hasilnya.
int main() {
    vector<FilmBioskop> daftarFilm;

    // Lima objek berikut digunakan sebagai data awal film bioskop.
    daftarFilm.push_back(FilmBioskop(1, "Interstellar", "Sci-Fi", 169, "Christopher Nolan", 2014, "Studio 1", 50000, "19:30"));
    daftarFilm.push_back(FilmBioskop(2, "Inception", "Sci-Fi", 148, "Christopher Nolan", 2010, "Studio 2", 45000, "20:00"));
    daftarFilm.push_back(FilmBioskop(3, "Avengers: Doomsday", "Action", 180, "Russo Bros", 2026, "Studio 3", 60000, "21:00"));
    daftarFilm.push_back(FilmBioskop(4, "Agak Laen 2", "Comedy", 96, "Aco Tenri", 2025, "Studio 4", 35000, "17:30"));
    daftarFilm.push_back(FilmBioskop(5, "Merah Putih One For All", "Action", 120, "Unknown", 2025, "Studio 5", 40000, "18:45"));

    int id, durasi, tahun;
    string judul, genre, sutradara, studio, jadwal;
    double harga;

    // Bagian ini menampilkan seluruh data awal sebelum menerima input baru.
    cout << "\n=== Data Awal ===\n";
    for (int i = 0; i < daftarFilm.size(); i++) {
        cout << "\nFilm ke-" << i + 1 << endl;
        daftarFilm[i].tampilkanData();
    }

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
            for (int i = 0; i < daftarFilm.size(); i++) {
                cout << "\nFilm ke-" << i + 1 << endl;
                daftarFilm[i].tampilkanData();
            }
        }
    }

    return 0;
}
