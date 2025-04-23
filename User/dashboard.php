<!DOCTYPE html>


<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Digital</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f4;
        }
        header {
            background: #004d99;
            color: white;
            padding: 20px;
            text-align: center;
        }
        nav {
            background: #0073e6;
            padding: 10px;
            text-align: center;
        }
        nav a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
        }
        .container {
            padding: 20px;
        }
        .search-box {
            margin-bottom: 20px;
        }
        .book-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }
        .book {
            background: white;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .book h3 {
            margin: 0 0 10px;
        }
        footer {
            background: #004d99;
            color: white;
            text-align: center;
            padding: 15px;
            margin-top: 30px;
        }
    </style>
</head>
<body>

    <header>
        <h1>Perpustakaan Digital</h1>
        <p>Selamat datang di perpustakaan online kami</p>
    </header>

    <nav>
        <a href="#">Beranda</a>
        <a href="#">Kategori</a>
        <a href="#">Tentang</a>
        <a href="#">Kontak</a>
    </nav>

    <div class="container">
        <div class="search-box">
            <input type="text" placeholder="Cari judul buku..." style="width: 100%; padding: 10px;">
        </div>

        <div class="book-list">
            <div class="book">
                <h3>Buku dongeng si kancil</h3>
                <p>Penulis: </p>
                <img src="gambar buku/buku dongeng si kancil.jpg" alt="" width="200">
                <a href="#">Baca Sekarang</a>
            </div>
            <div class="book">
                <h3>buku belajar B.inggris </h3>
                <p>Penulis:</p>
                <img src="gambar buku/buku belajar bahasa inggris.jpg" alt="" width="200">
                <a href="#">Baca Sekarang</a>
            </div>
            <div class="book">
                <h3>Buku komik detektif conan</h3>
                <p>Penulis:</p>
                <img src="gambar buku/buku detektif conan.jpg" alt="" width="200">
                <a href="#">Baca Sekarang</a>
            </div>
            <div class="book">
                <h3>Buku masak</h3>
                <p>Penulis: </p>
                <img src="gambar buku/buku masak.jpg" alt="" width="200">
                <a href="#">Baca Sekarang </a>
            </div>
            <div class="book">
                <h3>Buku kamus B.inggris</h3>
                <p>Penulis: </p>
                <img src="gambar buku/gambar buku bahasa inggris.jpg" alt="" width="200">
                <a href="#">Baca sekarang</a>
            </div>
        </div>
    </div>

    <footer>
        &copy; 2025 Perpustakaan Digital. All rights reserved.
    </footer>

</body>
</html>
