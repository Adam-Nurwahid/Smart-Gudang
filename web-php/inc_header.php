<?php 
include("inc_koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Company Profile</title>
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

        #isi{
            padding: 50px;
        }
        main {
            padding: 20px; 
            background-color: #ffffff; 
            border: 1px solid #ced4da; 
            border-radius: 10px; 
            margin-top: 20px; 
            min-height: calc(100vh - 130px); 
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
                            <a class="nav-link" href="#">Admin Contact</a>
                        </li>
                        <li class="nav-item ml-auto"> <!-- ml-auto untuk memindahkan ke pojok kanan -->
                            <a class="nav-link logout-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</body>
</html>
