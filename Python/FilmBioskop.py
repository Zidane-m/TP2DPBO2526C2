from Film import Film

class FilmBioskop(Film):
    # Konstruktor ini membuat objek FilmBioskop dengan informasi penayangan di bioskop.
    def __init__(self, id=0, judul="", genre="", durasi=0, sutradara="", tahun_rilis=0, studio="", harga_tiket=0, jadwal_tayang=""):
        super().__init__(id, judul, genre, durasi, sutradara, tahun_rilis)
        self.__studio = studio
        self.__harga_tiket = harga_tiket
        self.__jadwal_tayang = jadwal_tayang

    # Method ini mengembalikan nama studio pemutaran.
    def getStudio(self):
        return self.__studio

    # Method ini mengubah nama studio pemutaran.
    def setStudio(self, studio):
        self.__studio = studio

    # Method ini mengembalikan harga tiket film.
    def getHargaTiket(self):
        return self.__harga_tiket

    # Method ini mengubah harga tiket film.
    def setHargaTiket(self, harga_tiket):
        self.__harga_tiket = harga_tiket

    # Method ini mengembalikan jadwal tayang film.
    def getJadwalTayang(self):
        return self.__jadwal_tayang

    # Method ini mengubah jadwal tayang film.
    def setJadwalTayang(self, jadwal_tayang):
        self.__jadwal_tayang = jadwal_tayang

    # Method ini menampilkan seluruh data film beserta informasi bioskopnya.
    def tampilkanData(self):
        super().tampilkanData()
        print(f"Studio : {self.__studio}")
        print(f"Harga Tiket : Rp {self.__harga_tiket}")
        print(f"Jadwal Tayang : {self.__jadwal_tayang}")
