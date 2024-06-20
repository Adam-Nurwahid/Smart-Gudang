<?php 
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include("inc_koneksi.php");

$sukses = "";
$katakunci = isset($_GET['katakunci']) ? $_GET['katakunci'] : "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'delete') {
    $id = $_GET['id'];
    $sql1 = "DELETE FROM halaman WHERE id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    if ($q1) {
        $sukses = "Berhasil hapus data";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Gudang</title>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <link rel="stylesheet" href="css/summernote-image-list.min.css">
    <script src="summernote-image-list.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <style>
        body {
            background-color: #e9ecef; /* Warna latar belakang body */
            padding-top: 20px; /* Jarak atas dari header */
        }
        .navbar {
            background-color: #007bff; /* Warna latar belakang navbar */
        }
        .navbar-nav .nav-item {
            margin-right: 10px; /* Jarak antar item navbar */
        }
        .navbar-nav .nav-item:last-child {
            margin-right: 0; /* Menghilangkan margin kanan pada item terakhir */
        }
        .navbar-nav .nav-link {
            color: white !important; /* Warna teks putih */
        }
        .navbar-nav .nav-link:hover {
            color: #dc3545 !important; /* Warna teks merah saat hover */
        }
        .navbar .logout-link {
            color: #dc3545 !important; /* Warna teks merah */
        }
        .navbar .logout-link:hover {
            color: #dc3545 !important; /* Warna teks merah saat hover */
        }
        .image-list-content .col-lg-3 { 
            width: 100%; 
        }
        .image-list-content img { 
            float: left; 
            width: 20%; 
        }
        .image-list-content p { 
            float: left; 
            padding-left: 20px; 
        }
        .image-list-item { 
            padding: 10px 0px; 
        }
        main {
            padding: 20px; /* Padding untuk konten utama */
            background-color: #ffffff; /* Warna latar belakang konten */
            border: 1px solid #ced4da; /* Border */
            border-radius: 10px; /* Border radius */
            margin-top: 20px; /* Jarak atas dari header */
            min-height: calc(100vh - 130px); /* Tinggi minimum untuk mengisi layar */
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Admin Halaman</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://api.whatsapp.com/send/?phone=6285175323896&text&type=phone_number&app_absent=0">Admin Contact</a>
                        </li>
                        <li class="nav-item ml-auto"> <!-- ml-auto untuk memindahkan ke pojok kanan -->
                            <a class="nav-link logout-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="container">
        <h1>Halaman Admin</h1>
        <p>
            <a href="halaman_input.php">
                <input type="button" class="btn btn-primary" value="Buat Halaman Baru" />
            </a>
        </p>
        <?php if ($sukses) : ?>
            <div class="alert alert-primary" role="alert">
                <?php echo $sukses ?>
            </div>
        <?php endif; ?>
        <form class="row g-3" method="get">
            <div class="col-auto">
                <input type="text" class="form-control" placeholder="Masukkan Kata Kunci" name="katakunci" value="<?php echo htmlspecialchars($katakunci) ?>" />
            </div>
            <div class="col-auto">
                <input type="submit" name="cari" value="Cari Barang" class="btn btn-secondary" />
            </div>
        </form>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-1">#</th>
                    <th>Nama Barang</th>
                    <th>Keterangan</th>
                    <th class="col-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sqltambahan = "";
                $per_halaman = 2;
                if ($katakunci != '') {
                    $array_katakunci = explode(" ", $katakunci);
                    for ($x = 0; $x < count($array_katakunci); $x++) {
                        $sqlcari[] = "(judul like '%" . $array_katakunci[$x] . "%' or kutipan like '%" . $array_katakunci[$x] . "%' or isi like '%" . $array_katakunci[$x] . "%')";
                    }
                    $sqltambahan = " WHERE " . implode(" OR ", $sqlcari);
                }

                $sql1 = "SELECT * FROM halaman $sqltambahan";
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $mulai = ($page > 1) ? ($page * $per_halaman) - $per_halaman : 0;
                $q1 = mysqli_query($koneksi, $sql1);
                $total = mysqli_num_rows($q1);
                $pages = ceil($total / $per_halaman);
                $nomor = $mulai + 1;
                $sql1 = $sql1 . " ORDER BY id DESC LIMIT $mulai, $per_halaman";

                $q1 = mysqli_query($koneksi, $sql1);

                while ($r1 = mysqli_fetch_array($q1)) {
                ?>
                    <tr>
                        <td><?php echo $nomor++ ?></td>
                        <td><?php echo $r1['judul'] ?></td>
                        <td><?php echo $r1['kutipan'] ?></td>
                        <td>
                            <a href="halaman_input.php?id=<?php echo $r1['id'] ?>">
                                <span class="badge bg-warning text-dark">Edit</span>
                            </a>

                            <a href="halaman.php?op=delete&id=<?php echo $r1['id'] ?>" onclick="return confirm('Yakin Mau Dihapus?')">
                                <span class="badge bg-danger">Delete</span>
                            </a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php
                $cari = isset($_GET['cari']) ? $_GET['cari'] : "";

                for ($i = 1; $i <= $pages; $i++) {
                ?>
                    <li class="page-item">
                        <a class="page-link" href="halaman.php?katakunci=<?php echo urlencode($katakunci) ?>&cari=<?php echo $cari ?>&page=<?php echo $i ?>"><?php echo $i ?></a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </nav>
    </main>

    <?php include("inc_footer.php") ?>
</body>
</html>
