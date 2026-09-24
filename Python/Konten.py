class Konten:
    # Konstruktor ini membuat objek Konten dengan data dasar.
    def __init__(self, id=0, judul="", genre=""):
        self.__id = id
        self.__judul = judul
        self.__genre = genre

    # Method ini mengembalikan identitas konten.
    def getId(self):
        return self.__id

    # Method ini mengubah identitas konten.
    def setId(self, id):
        self.__id = id

    # Method ini mengembalikan judul konten.
    def getJudul(self):
        return self.__judul

    # Method ini mengubah judul konten.
    def setJudul(self, judul):
        self.__judul = judul

    # Method ini mengembalikan genre konten.
    def getGenre(self):
        return self.__genre

    # Method ini mengubah genre konten.
    def setGenre(self, genre):
        self.__genre = genre

    # Method ini menampilkan data dasar yang dimiliki semua konten.
    def tampilkanData(self):
        print(f"ID     : {self.__id}")
        print(f"Judul  : {self.__judul}")
        print(f"Genre  : {self.__genre}")
