#include <iostream>
#include <string>
#include <vector>
using namespace std;

class Konten
{
protected:
    int id;
    string judul;
    string genre;

public:
    // Konstruktor ini membuat objek Konten dengan nilai awal kosong.
    Konten()
        : id(0), judul(""), genre("")
    {
    }

    // Konstruktor ini mengisi data dasar Konten dari nilai yang diberikan.
    Konten(int id, string judul, string genre)
        : id(id), judul(judul), genre(genre)
    {
    }

    // Method ini mengembalikan identitas konten.
    int getId() const
    {
        return id;
    }

    // Method ini mengembalikan judul konten.
    string getJudul() const
    {
        return judul;
    }

    // Method ini mengembalikan genre konten.
    string getGenre() const
    {
        return genre;
    }

    // Method ini mengubah identitas konten.
    void setId(int id)
    {
        this->id = id;
    }

    // Method ini mengubah judul konten.
    void setJudul(string judul)
    {
        this->judul = judul;
    }

    // Method ini mengubah genre konten.
    void setGenre(string genre)
    {
        this->genre = genre;
    }

    // Method ini menampilkan data dasar yang dimiliki semua konten.
    virtual void tampilkanData() const
    {
        cout << "ID     : " << id << endl;
        cout << "Judul  : " << judul << endl;
        cout << "Genre  : " << genre << endl;
    }
};
