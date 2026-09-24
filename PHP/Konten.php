<?php
class Konten
{
    protected $id;
    protected $judul;
    protected $genre;

    // Konstruktor ini membuat objek Konten dengan data dasar.
    public function __construct($id = 0, $judul = "", $genre = "")
    {
        $this->id = (int) $id;
        $this->judul = $judul;
        $this->genre = $genre;
    }

    // Method ini mengembalikan identitas konten.
    public function getId()
    {
        return $this->id;
    }

    // Method ini mengubah identitas konten.
    public function setId($id)
    {
        $this->id = (int) $id;
    }

    // Method ini mengembalikan judul konten.
    public function getJudul()
    {
        return $this->judul;
    }

    // Method ini mengubah judul konten.
    public function setJudul($judul)
    {
        $this->judul = $judul;
    }

    // Method ini mengembalikan genre konten.
    public function getGenre()
    {
        return $this->genre;
    }

    // Method ini mengubah genre konten.
    public function setGenre($genre)
    {
        $this->genre = $genre;
    }

    // Method ini menampilkan data dasar yang dimiliki semua konten.
    public function tampilkanData()
    {
        echo "ID     : " . $this->id . "<br>";
        echo "Judul  : " . $this->judul . "<br>";
        echo "Genre  : " . $this->genre . "<br>";
    }
}
?>
