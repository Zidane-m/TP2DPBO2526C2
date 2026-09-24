<?php
require_once __DIR__ . '/FilmBioskop.php';

// Lima objek berikut digunakan sebagai data awal film bioskop.
$films = [
    new FilmBioskop(1, 'Interstellar', 'Sci-Fi', 169, 'Christopher Nolan', 2014, 'Studio 1', 50000, '19:30', 'images/interstellar.webp'),
    new FilmBioskop(2, 'Inception', 'Sci-Fi', 148, 'Christopher Nolan', 2010, 'Studio 2', 45000, '20:00', 'images/inception.webp'),
    new FilmBioskop(3, 'Avengers: Doomsday', 'Action', 180, 'Russo Bros', 2026, 'Studio 3', 60000, '21:00', 'images/Avengers_Doomsday.webp'),
    new FilmBioskop(4, 'Agak Laen 2', 'Comedy', 96, 'Aco Tenri', 2025, 'Studio 4', 35000, '17:30', 'images/AgakLaen.webp'),
    new FilmBioskop(5, 'Merah Putih One For All', 'Action', 120, 'bowo', 2025, 'Studio 5', 40000, '18:45', 'images/merah_putih_ofa.webp')
];

$pesan = '';
$tipePesan = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Bagian ini mengambil semua data film baru dari formulir.
    $id = trim($_POST['id'] ?? '');
    $judul = trim($_POST['judul'] ?? '');
    $genre = trim($_POST['genre'] ?? '');
    $durasi = trim($_POST['durasi'] ?? '');
    $sutradara = trim($_POST['sutradara'] ?? '');
    $tahunRilis = trim($_POST['tahun_rilis'] ?? '');
    $studio = trim($_POST['studio'] ?? '');
    $hargaTiket = trim($_POST['harga_tiket'] ?? '');
    $jadwalTayang = trim($_POST['jadwal_tayang'] ?? '');
    $gambar = $_FILES['gambar'] ?? null;

    // Data teks dan angka harus terisi sebelum validasi poster dilakukan.
    $dataLengkap = $id !== '' && $judul !== '' && $genre !== '' && $durasi !== ''
        && $sutradara !== '' && $tahunRilis !== '' && $studio !== ''
        && $hargaTiket !== '' && $jadwalTayang !== '' && $gambar !== null;

    if (!$dataLengkap) {
        $pesan = 'Semua data film dan poster wajib diisi.';
        $tipePesan = 'warning';
    } else {
        // Pemeriksaan ini memastikan ID film baru belum digunakan.
        $duplicate = false;
        foreach ($films as $film) {
            $duplicate = $duplicate || $film->getId() == $id;
        }

        // File poster hanya menerima format gambar yang didukung.
        $tipeGambarValid = ['image/jpeg', 'image/png', 'image/webp'];
        $gambarValid = $gambar['error'] === UPLOAD_ERR_OK
            && in_array(mime_content_type($gambar['tmp_name']), $tipeGambarValid, true);

        if ($duplicate) {
            $pesan = 'ID film sudah digunakan.';
            $tipePesan = 'danger';
        } elseif ((int)$durasi <= 0 || (int)$tahunRilis <= 0 || (double)$hargaTiket < 0) {
            $pesan = 'Durasi dan tahun rilis harus lebih dari nol, sedangkan harga tiket tidak boleh negatif.';
            $tipePesan = 'danger';
        } elseif (!$gambarValid) {
            $pesan = 'Poster harus berupa file JPG, PNG, atau WebP yang valid.';
            $tipePesan = 'danger';
        } else {
            // Poster yang valid disimpan di folder images milik TP2.
            $namaGambar = uniqid('poster_', true) . '_' . basename($gambar['name']);
            $lokasiGambar = __DIR__ . '/images/' . $namaGambar;

            if (move_uploaded_file($gambar['tmp_name'], $lokasiGambar)) {
                $films[] = new FilmBioskop(
                    $id,
                    $judul,
                    $genre,
                    $durasi,
                    $sutradara,
                    $tahunRilis,
                    $studio,
                    $hargaTiket,
                    $jadwalTayang,
                    'images/' . $namaGambar
                );
                $pesan = 'Data film berhasil ditambahkan.';
                $tipePesan = 'success';
            } else {
                $pesan = 'Poster gagal disimpan.';
                $tipePesan = 'danger';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Data Bioskop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Outfit', sans-serif; background-color: #ffffff; color: #1e293b; }
        .page-title { color: #0078c8; font-weight: 700; }
        .custom-card { border: 1px solid #e2e8f0; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05); overflow: hidden; }
        .custom-card-header { background-color: #009eff; color: #ffffff; font-size: 1.1rem; font-weight: 600; padding: 0.9rem 1.25rem; }
        .btn-custom-primary { background-color: #009eff; border: none; color: #ffffff; font-weight: 600; }
        .btn-custom-primary:hover { background-color: #0082d7; color: #ffffff; }
        .table-custom { margin-bottom: 0; }
        .table-custom th { background-color: #e0f2fe; border-bottom: 2px solid #bae6fd; color: #0369a1; font-size: 0.76rem; padding: 0.75rem 1rem; text-transform: uppercase; }
        .table-custom td { border-bottom: 1px solid #e2e8f0; font-size: 0.86rem; padding: 0.85rem 1rem; vertical-align: middle; }
        .table-custom tbody tr:nth-child(even) { background-color: #f0f9ff; }
        .table-custom tbody tr:hover { background-color: #e0f2fe; }
        .badge-genre { background-color: #e0f2fe; border-radius: 4px; color: #0369a1; font-size: 0.75rem; font-weight: 600; padding: 0.3em 0.6em; }
        .img-thumb { border: 1px solid #e2e8f0; border-radius: 4px; height: 68px; object-fit: cover; width: 50px; }
    </style>
</head>
<body>
<main class="container-fluid px-3 px-lg-4 py-4">
    <header class="text-center mb-4">
        <h1 class="page-title">Manajemen Data Bioskop</h1>
        <p class="text-muted mb-0">Pengelolaan data film bioskop berbasis PHP dan multilevel inheritance</p>
    </header>

    <?php if ($pesan): ?>
        <div class="alert alert-<?= htmlspecialchars($tipePesan) ?> alert-dismissible fade show" role="alert">
            <?= htmlspecialchars($pesan) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
    <?php endif; ?>

    <div class="row g-4 align-items-start">
        <section class="col-xl-4 col-lg-5">
            <div class="card custom-card">
                <div class="custom-card-header">Tambah Data Film Bioskop</div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="mb-3"><label class="form-label fw-semibold small" for="id">ID Film</label><input class="form-control" id="id" name="id" type="number" min="1" required></div>
                        <div class="mb-3"><label class="form-label fw-semibold small" for="judul">Judul Film</label><input class="form-control" id="judul" name="judul" type="text" required></div>
                        <div class="mb-3"><label class="form-label fw-semibold small" for="genre">Genre</label><input class="form-control" id="genre" name="genre" type="text" required></div>
                        <div class="row g-3">
                            <div class="col-md-6"><label class="form-label fw-semibold small" for="durasi">Durasi (menit)</label><input class="form-control" id="durasi" name="durasi" type="number" min="1" required></div>
                            <div class="col-md-6"><label class="form-label fw-semibold small" for="tahun_rilis">Tahun Rilis</label><input class="form-control" id="tahun_rilis" name="tahun_rilis" type="number" min="1" required></div>
                        </div>
                        <div class="mb-3 mt-3"><label class="form-label fw-semibold small" for="sutradara">Sutradara</label><input class="form-control" id="sutradara" name="sutradara" type="text" required></div>
                        <div class="mb-3"><label class="form-label fw-semibold small" for="studio">Studio</label><input class="form-control" id="studio" name="studio" type="text" required></div>
                        <div class="row g-3">
                            <div class="col-md-6"><label class="form-label fw-semibold small" for="harga_tiket">Harga Tiket</label><input class="form-control" id="harga_tiket" name="harga_tiket" type="number" min="0" required></div>
                            <div class="col-md-6"><label class="form-label fw-semibold small" for="jadwal_tayang">Jadwal Tayang</label><input class="form-control" id="jadwal_tayang" name="jadwal_tayang" type="time" required></div>
                        </div>
                        <div class="mb-3 mt-3"><label class="form-label fw-semibold small" for="gambar">Poster Film</label><input class="form-control" id="gambar" name="gambar" type="file" accept="image/jpeg,image/png,image/webp" required><div class="form-text">Format yang diterima: JPG, PNG, atau WebP.</div></div>
                        <button class="btn btn-custom-primary w-100" type="submit">Tambah Film</button>
                    </form>
                </div>
            </div>
        </section>

        <section class="col-xl-8 col-lg-7">
            <div class="card custom-card">
                <div class="custom-card-header">Daftar Film Bioskop</div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-custom">
                            <thead><tr><th>Poster</th><th>ID</th><th>Judul</th><th>Genre</th><th>Durasi</th><th>Sutradara</th><th>Tahun</th><th>Studio</th><th>Harga</th><th>Jadwal</th></tr></thead>
                            <tbody>
                            <?php foreach ($films as $film): ?>
                                <tr>
                                    <td><img class="img-thumb" src="<?= htmlspecialchars($film->getGambar()) ?>" alt="Poster <?= htmlspecialchars($film->getJudul()) ?>"></td>
                                    <td><strong>#<?= htmlspecialchars($film->getId()) ?></strong></td>
                                    <td><strong><?= htmlspecialchars($film->getJudul()) ?></strong></td>
                                    <td><span class="badge-genre"><?= htmlspecialchars($film->getGenre()) ?></span></td>
                                    <td><?= htmlspecialchars($film->getDurasi()) ?> menit</td>
                                    <td><?= htmlspecialchars($film->getSutradara()) ?></td>
                                    <td><?= htmlspecialchars($film->getTahunRilis()) ?></td>
                                    <td><?= htmlspecialchars($film->getStudio()) ?></td>
                                    <td>Rp <?= htmlspecialchars(number_format($film->getHargaTiket(), 0, ',', '.')) ?></td>
                                    <td><?= htmlspecialchars($film->getJadwalTayang()) ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>