<?php
require_once __DIR__ . '/Konten.php';

class Film extends Konten {
    protected $durasi;
    protected $sutradara;
    protected $tahunRilis;

    // Konstruktor ini membuat objek Film dengan data tambahan khusus film.
    public function __construct($id = 0, $judul = "", $genre = "", $durasi = 0, $sutradara = "", $tahunRilis = 0) {
        parent::__construct($id, $judul, $genre);
        $this->durasi = (int)$durasi;
        $this->sutradara = $sutradara;
        $this->tahunRilis = (int)$tahunRilis;
    }

    // Method ini mengembalikan durasi film dalam menit.
    public function getDurasi(){
        return $this->durasi; 
    }

    // Method ini mengubah durasi film.
    public function setDurasi($durasi){
        $this->durasi = (int)$durasi; 
    }

    // Method ini mengembalikan nama sutradara film.
    public function getSutradara(){
        return $this->sutradara; 
    }

    // Method ini mengubah nama sutradara film.
    public function setSutradara($sutradara){
        $this->sutradara = $sutradara; 
    }

    // Method ini mengembalikan tahun rilis film.
    public function getTahunRilis(){
        return $this->tahunRilis; 
    }

    // Method ini mengubah tahun rilis film.
    public function setTahunRilis($tahunRilis){
        $this->tahunRilis = (int)$tahunRilis; 
    }

    // Method ini menampilkan data Konten dan data khusus film.
    public function tampilkanData(){
        parent::tampilkanData();
        echo "Durasi : " . $this->durasi . " menit<br>";
        echo "Sutradara : " . $this->sutradara . "<br>";
        echo "Tahun Rilis : " . $this->tahunRilis . "<br>";
    }
}
?>
