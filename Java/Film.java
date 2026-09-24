class Film extends Konten
{
    private int durasi;
    private String sutradara;
    private int tahunRilis;

    // Konstruktor ini membuat objek Film dengan nilai awal kosong.
    public Film(){
        super();
        this.durasi = 0;
        this.sutradara = "";
        this.tahunRilis = 0;
    }

    // Konstruktor ini mengisi data film dan data dasar dari kelas Konten.
    public Film(int id, String judul, String genre, int durasi, String sutradara, int tahunRilis){
        super(id, judul, genre);
        this.durasi = durasi;
        this.sutradara = sutradara;
        this.tahunRilis = tahunRilis;
    }

    // Method ini mengembalikan durasi film dalam menit.
    public int getDurasi(){
        return durasi;
    }

    // Method ini mengembalikan nama sutradara film.
    public String getSutradara(){
        return sutradara;
    }

    // Method ini mengembalikan tahun rilis film.
    public int getTahunRilis(){
        return tahunRilis;
    }

    // Method ini mengubah durasi film.
    public void setDurasi(int durasi){
        this.durasi = durasi;
    }

    // Method ini mengubah nama sutradara film.
    public void setSutradara(String sutradara){
        this.sutradara = sutradara;
    }

    // Method ini mengubah tahun rilis film.
    public void setTahunRilis(int tahunRilis){
        this.tahunRilis = tahunRilis;
    }

    @Override
    // Method ini menampilkan data Konten dan data khusus film.
    public void tampilkanData(){
        super.tampilkanData();
        System.out.println("Durasi : " + durasi + " menit");
        System.out.println("Sutradara : " + sutradara);
        System.out.println("Tahun Rilis : " + tahunRilis);
    }
}
