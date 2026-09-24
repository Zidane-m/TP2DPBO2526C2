class Konten{
    protected int id;
    protected String judul;
    protected String genre;

    // Konstruktor ini membuat objek Konten dengan nilai awal kosong.
    public Konten(){
        this.id = 0;
        this.judul = "";
        this.genre = "";
    }

    // Konstruktor ini mengisi data dasar Konten dari nilai yang diberikan.
    public Konten(int id, String judul, String genre){
        this.id = id;
        this.judul = judul;
        this.genre = genre;
    }

    // Method ini mengembalikan identitas konten.
    public int getId(){
        return id;
    }

    // Method ini mengembalikan judul konten.
    public String getJudul(){
        return judul;
    }

    // Method ini mengembalikan genre konten.
    public String getGenre(){
        return genre;
    }

    // Method ini mengubah identitas konten.
    public void setId(int id){
        this.id = id;
    }

    // Method ini mengubah judul konten.
    public void setJudul(String judul){
        this.judul = judul;
    }

    // Method ini mengubah genre konten.
    public void setGenre(String genre){
        this.genre = genre;
    }

    // Method ini menampilkan data dasar yang dimiliki semua konten.
    public void tampilkanData(){
        System.out.println("ID     : " + id);
        System.out.println("Judul  : " + judul);
        System.out.println("Genre  : " + genre);
    }
}
