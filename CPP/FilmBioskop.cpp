#include "Film.cpp"

class FilmBioskop : public Film{
private:
    string studio;
    double hargaTiket;
    string jadwalTayang;

public:
    // Konstruktor ini membuat objek FilmBioskop dengan nilai awal kosong.
    FilmBioskop(): 
        Film(), studio(""), hargaTiket(0), jadwalTayang(""){
    }

    // Konstruktor ini mengisi data film beserta informasi penayangannya di bioskop.
    FilmBioskop(int id, string judul, string genre, int durasi, string sutradara, int tahunRilis, string studio, double hargaTiket, string jadwalTayang):
        Film(id, judul, genre, durasi, sutradara, tahunRilis), studio(studio), hargaTiket(hargaTiket), jadwalTayang(jadwalTayang){
    }

    // Method ini mengembalikan nama studio pemutaran.
    string getStudio() const{
        return studio;
    }

    // Method ini mengembalikan harga tiket film.
    double getHargaTiket() const{
        return hargaTiket;
    }

    // Method ini mengembalikan jadwal tayang film.
    string getJadwalTayang() const{
        return jadwalTayang;
    }

    // Method ini mengubah nama studio pemutaran.
    void setStudio(string studio){
        this->studio = studio;
    }

    // Method ini mengubah harga tiket film.
    void setHargaTiket(double hargaTiket){
        this->hargaTiket = hargaTiket;
    }

    // Method ini mengubah jadwal tayang film.
    void setJadwalTayang(string jadwalTayang){
        this->jadwalTayang = jadwalTayang;
    }

    // Method ini menampilkan seluruh data film beserta informasi bioskopnya.
    void tampilkanData() const override{
        Film::tampilkanData();
        cout << "Studio : " << studio << endl;
        cout << "Harga Tiket : Rp " << hargaTiket << endl;
        cout << "Jadwal Tayang : " << jadwalTayang << endl;
    }
};
