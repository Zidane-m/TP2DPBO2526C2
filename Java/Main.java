import java.util.ArrayList;
import java.util.Scanner;

public class Main{
    // Method ini menampilkan seluruh film yang tersimpan di dalam daftar dalam format tabel dinamis.
    private static void tampilkanData(ArrayList<FilmBioskop> daftarFilm){
        String[] header = {"ID", "Judul", "Genre", "Durasi", "Sutradara", "Tahun Rilis", "Studio", "Harga Tiket", "Jadwal Tayang"};
        int[] lebar = new int[header.length];

        for (int i = 0; i < header.length; i++) {
            lebar[i] = header[i].length();
        }

        for (FilmBioskop film : daftarFilm) {
            lebar[0] = Math.max(lebar[0], String.valueOf(film.getId()).length());
            lebar[1] = Math.max(lebar[1], film.getJudul().length());
            lebar[2] = Math.max(lebar[2], film.getGenre().length());
            lebar[3] = Math.max(lebar[3], String.valueOf(film.getDurasi()).length());
            lebar[4] = Math.max(lebar[4], film.getSutradara().length());
            lebar[5] = Math.max(lebar[5], String.valueOf(film.getTahunRilis()).length());
            lebar[6] = Math.max(lebar[6], film.getStudio().length());
            lebar[7] = Math.max(lebar[7], String.valueOf((long) film.getHargaTiket()).length());
            lebar[8] = Math.max(lebar[8], film.getJadwalTayang().length());
        }

        StringBuilder garis = new StringBuilder();
        for (int width : lebar) {
            garis.append("+").append("-".repeat(width + 2));
        }
        garis.append("+");

        System.out.println(garis);
        for (int i = 0; i < header.length; i++) {
            System.out.printf("| %-" + lebar[i] + "s ", header[i]);
        }
        System.out.println("|");
        System.out.println(garis);

        for (FilmBioskop film : daftarFilm) {
            System.out.printf("| %-" + lebar[0] + "d ", film.getId());
            System.out.printf("| %-" + lebar[1] + "s ", film.getJudul());
            System.out.printf("| %-" + lebar[2] + "s ", film.getGenre());
            System.out.printf("| %-" + lebar[3] + "d ", film.getDurasi());
            System.out.printf("| %-" + lebar[4] + "s ", film.getSutradara());
            System.out.printf("| %-" + lebar[5] + "d ", film.getTahunRilis());
            System.out.printf("| %-" + lebar[6] + "s ", film.getStudio());
            System.out.printf("| %-" + lebar[7] + "s ", String.valueOf((long) film.getHargaTiket()));
            System.out.printf("| %-" + lebar[8] + "s ", film.getJadwalTayang());
            System.out.println("|");
        }

        System.out.println(garis);
    }

    // Method utama ini membuat data awal, membaca data baru, dan menampilkan hasilnya.
    public static void main(String[] args){
        // Lima objek berikut digunakan sebagai data awal film bioskop.
        ArrayList<FilmBioskop> daftarFilm = new ArrayList<>();
        daftarFilm.add(new FilmBioskop(1, "Interstellar", "Sci-Fi", 169, "Christopher Nolan", 2014, "Studio 1", 50000, "19:30"));
        daftarFilm.add(new FilmBioskop(2, "Inception", "Sci-Fi", 148, "Christopher Nolan", 2010, "Studio 2", 45000, "20:00"));
        daftarFilm.add(new FilmBioskop(3, "Avengers: Doomsday", "Action", 180, "Russo Bros", 2026, "Studio 3", 60000, "21:00"));
        daftarFilm.add(new FilmBioskop(4, "Agak Laen 2", "Comedy", 96, "Aco Tenri", 2025, "Studio 4", 35000, "17:30"));
        daftarFilm.add(new FilmBioskop(5, "Merah Putih One For All", "Action", 120, "Bowo", 2025, "Studio 5", 40000, "18:45"));

        // Bagian ini menampilkan seluruh data awal sebelum menerima input baru.
        System.out.println("=== Data Film ===");
        tampilkanData(daftarFilm);
        System.out.println("\n=== Masukkan Data Film Baru ===");

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

        scanner.close();
    }
}
