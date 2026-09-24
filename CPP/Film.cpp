#include "Konten.cpp"

class Film : public Konten{
private:
    int durasi;
    string sutradara;
    int tahunRilis;

public:
    // Konstruktor ini membuat objek Film dengan nilai awal kosong.
    Film()
        : Konten(), durasi(0), sutradara(""), tahunRilis(0){
    }

    // Konstruktor ini mengisi data film dan data dasar dari kelas Konten.
    Film(int id, string judul, string genre, int durasi, string sutradara, int tahunRilis)
        : Konten(id, judul, genre), durasi(durasi), sutradara(sutradara), tahunRilis(tahunRilis){
    }

    // Method ini mengembalikan durasi film dalam menit.
    int getDurasi() const{
        return durasi;
    }

    // Method ini mengembalikan nama sutradara film.
    string getSutradara() const{
        return sutradara;
    }

    // Method ini mengembalikan tahun rilis film.
    int getTahunRilis() const{
        return tahunRilis;
    }

    // Method ini mengubah durasi film.
    void setDurasi(int durasi){
        this->durasi = durasi;
    }

    // Method ini mengubah nama sutradara film.
    void setSutradara(string sutradara){
        this->sutradara = sutradara;
    }

    // Method ini mengubah tahun rilis film.
    void setTahunRilis(int tahunRilis){
        this->tahunRilis = tahunRilis;
    }

    // Method ini menampilkan data Konten dan data khusus film.
    void tampilkanData() const override{
        Konten::tampilkanData();
        cout << "Durasi : " << durasi << " menit" << endl;
        cout << "Sutradara : " << sutradara << endl;
        cout << "Tahun Rilis : " << tahunRilis << endl;
    }
};
