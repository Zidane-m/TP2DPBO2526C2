public class FilmBioskop extends Film{
    private String studio;
    private double hargaTiket;
    private String jadwalTayang;

    // Konstruktor ini membuat objek FilmBioskop dengan nilai awal kosong.
    public FilmBioskop(){
        super();
        this.studio = "";
        this.hargaTiket = 0;
        this.jadwalTayang = "";
    }

    // Konstruktor ini mengisi data film beserta informasi penayangannya di bioskop.
    public FilmBioskop(int id, String judul, String genre, int durasi, String sutradara, int tahunRilis, String studio, double hargaTiket, String jadwalTayang){
        super(id, judul, genre, durasi, sutradara, tahunRilis);
        this.studio = studio;
        this.hargaTiket = hargaTiket;
        this.jadwalTayang = jadwalTayang;
    }

    // Method ini mengembalikan nama studio pemutaran.
    public String getStudio(){
        return studio;
    }

    // Method ini mengembalikan harga tiket film.
    public double getHargaTiket(){
        return hargaTiket;
    }

    // Method ini mengembalikan jadwal tayang film.
    public String getJadwalTayang(){
        return jadwalTayang;
    }

    // Method ini mengubah nama studio pemutaran.
    public void setStudio(String studio){
        this.studio = studio;
    }

    // Method ini mengubah harga tiket film.
    public void setHargaTiket(double hargaTiket){
        this.hargaTiket = hargaTiket;
    }

    // Method ini mengubah jadwal tayang film.
    public void setJadwalTayang(String jadwalTayang){
        this.jadwalTayang = jadwalTayang;
    }

    @Override
    // Method ini menampilkan seluruh data film beserta informasi bioskopnya.
    public void tampilkanData(){
        super.tampilkanData();
        System.out.println("Studio : " + studio);
        System.out.println("Harga Tiket : Rp " + hargaTiket);
        System.out.println("Jadwal Tayang : " + jadwalTayang);
    }
}
