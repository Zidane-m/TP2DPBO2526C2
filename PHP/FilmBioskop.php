<?php
require_once __DIR__ . '/Film.php';

class FilmBioskop extends Film {
    protected $studio;
    protected $hargaTiket;
    protected $jadwalTayang;
    protected $gambar;

    // Konstruktor ini membuat objek FilmBioskop dengan informasi penayangan di bioskop.
    public function __construct($id = 0, $judul = "", $genre = "", $durasi = 0, $sutradara = "", $tahunRilis = 0, $studio = "", $hargaTiket = 0, $jadwalTayang = "", $gambar = "") {
        parent::__construct($id, $judul, $genre, $durasi, $sutradara, $tahunRilis);
        $this->studio = $studio;
        $this->hargaTiket = (double)$hargaTiket;
        $this->jadwalTayang = $jadwalTayang;
        $this->gambar = $gambar;
    }

    // Method ini mengembalikan nama studio pemutaran.
    public function getStudio(){
        return $this->studio; 
    }

    // Method ini mengubah nama studio pemutaran.
    public function setStudio($studio){
        $this->studio = $studio; 
    }

    // Method ini mengembalikan harga tiket film.
    public function getHargaTiket(){
        return $this->hargaTiket; 
    }

    // Method ini mengubah harga tiket film.
    public function setHargaTiket($hargaTiket){
        $this->hargaTiket = (double)$hargaTiket; 
    }

    // Method ini mengembalikan jadwal tayang film.
    public function getJadwalTayang(){
        return $this->jadwalTayang; 
    }

    // Method ini mengubah jadwal tayang film.
    public function setJadwalTayang($jadwalTayang){
        $this->jadwalTayang = $jadwalTayang; 
    }

    // Method ini mengembalikan lokasi poster film.
    public function getGambar(){
        return $this->gambar; 
    }

    // Method ini mengubah lokasi poster film.
    public function setGambar($gambar){
        $this->gambar = $gambar; 
    }

    // Method ini menampilkan seluruh data film beserta informasi bioskopnya.
    public function tampilkanData(){
        parent::tampilkanData();
        echo "Studio : " . $this->studio . "<br>";
        echo "Harga Tiket : Rp " . $this->hargaTiket . "<br>";
        echo "Jadwal Tayang : " . $this->jadwalTayang . "<br>";
        echo "Gambar : " . $this->gambar . "<br>";
    }
}
?>
