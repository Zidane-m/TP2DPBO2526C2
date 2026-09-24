import java.util.ArrayList;
import java.util.Scanner;

public class Main
{
    // Method ini menampilkan seluruh film yang tersimpan di dalam daftar.
    private static void tampilkanData(ArrayList<FilmBioskop> daftarFilm){
        for (int i = 0; i < daftarFilm.size(); i++) {
            System.out.println("\nFilm ke-" + (i + 1));
            System.out.println("--------------------------");
            daftarFilm.get(i).tampilkanData();
        }
    }

    // Method utama ini membuat data awal, membaca data baru, dan menampilkan hasilnya.
    public static void main(String[] args){
        // Lima objek berikut digunakan sebagai data awal film bioskop.
        ArrayList<FilmBioskop> daftarFilm = new ArrayList<>();
        daftarFilm.add(new FilmBioskop(1, "Interstellar", "Sci-Fi", 169, "Christopher Nolan", 2014, "Studio 1", 50000, "19:30"));
        daftarFilm.add(new FilmBioskop(2, "Inception", "Sci-Fi", 148, "Christopher Nolan", 2010, "Studio 2", 45000, "20:00"));
        daftarFilm.add(new FilmBioskop(3, "Avengers: Doomsday", "Action", 180, "Russo Bros", 2026, "Studio 3", 60000, "21:00"));
        daftarFilm.add(new FilmBioskop(4, "Agak Laen 2", "Comedy", 96, "Aco Tenri", 2025, "Studio 4", 35000, "17:30"));
        daftarFilm.add(new FilmBioskop(5, "Merah Putih One For All", "Action", 120, "Unknown", 2025, "Studio 5", 40000, "18:45"));

        // Bagian ini menampilkan seluruh data awal sebelum menerima input baru.
        System.out.println("=== Data Awal ===");
        tampilkanData(daftarFilm);

        Scanner scanner = new Scanner(System.in);

        // Program dihentikan apabila tidak ada data input yang dapat dibaca.
        if (!scanner.hasNextLine()) {
            return;
        }

        int id = Integer.parseInt(scanner.nextLine().trim());
        String judul = scanner.nextLine().trim();
        String genre = scanner.nextLine().trim();
        int durasi = Integer.parseInt(scanner.nextLine().trim());
        String sutradara = scanner.nextLine().trim();
        int tahun = Integer.parseInt(scanner.nextLine().trim());
        String studio = scanner.nextLine().trim();
        double harga = Double.parseDouble(scanner.nextLine().trim());
        String jadwal = scanner.nextLine().trim();

        // Data baru hanya diproses apabila semua teks terisi dan angka memiliki nilai yang valid.
        if (judul.isEmpty() || genre.isEmpty() || sutradara.isEmpty() || studio.isEmpty() || jadwal.isEmpty() || durasi <= 0 || harga < 0) {
            System.out.println("Input tidak valid!");
            return;
        }

        // Pemeriksaan ini memastikan ID film baru belum digunakan oleh data sebelumnya.
        for (FilmBioskop film : daftarFilm) {
            if (film.getId() == id) {
                System.out.println("ID sudah digunakan!");
                return;
            }
        }

        // Data film baru ditambahkan setelah lolos validasi dan pemeriksaan ID.
        daftarFilm.add(new FilmBioskop(id, judul, genre, durasi, sutradara, tahun, studio, harga, jadwal));
        System.out.println("\n=== Data Setelah Penambahan ===");
        tampilkanData(daftarFilm);
    }
}
