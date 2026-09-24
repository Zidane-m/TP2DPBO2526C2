from Konten import Konten

class Film(Konten):
    # Konstruktor ini membuat objek Film dengan data tambahan khusus film.
    def __init__(self, id=0, judul="", genre="", durasi=0, sutradara="", tahun_rilis=0):
        super().__init__(id, judul, genre)
        self.__durasi = durasi
        self.__sutradara = sutradara
        self.__tahun_rilis = tahun_rilis

    # Method ini mengembalikan durasi film dalam menit.
    def getDurasi(self):
        return self.__durasi

    # Method ini mengubah durasi film.
    def setDurasi(self, durasi):
        self.__durasi = durasi

    # Method ini mengembalikan nama sutradara film.
    def getSutradara(self):
        return self.__sutradara

    # Method ini mengubah nama sutradara film.
    def setSutradara(self, sutradara):
        self.__sutradara = sutradara

    # Method ini mengembalikan tahun rilis film.
    def getTahunRilis(self):
        return self.__tahun_rilis

    # Method ini mengubah tahun rilis film.
    def setTahunRilis(self, tahun_rilis):
        self.__tahun_rilis = tahun_rilis

    # Method ini menampilkan data Konten dan data khusus film.
    def tampilkanData(self):
        super().tampilkanData()
        print(f"Durasi : {self.__durasi} menit")
        print(f"Sutradara : {self.__sutradara}")
        print(f"Tahun Rilis : {self.__tahun_rilis}")
