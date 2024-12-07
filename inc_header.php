<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "sd inpres puar";
$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("gagal tersambung");
}
?>
<?php 
$katakunci = (isset($_GET['katakunci'])) ? $_GET['katakunci'] : "";
if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin SD INPRES PUAR</title>
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https.//kit.fontawesome.com/4592f70558.js" crossorigin="anonimous"></script>
    <style>
        .search-box{
            padding: 5px 10px;
            border-radius: 50px;
            background-color: white;
            height: 70%;
        }
        .search-box input{
            border: none;
        }
        body{
            width: 100vh;
            height: auto;
            display: grid;
            margin: ;
        }
    </style>
</head>

<body class="container">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="profile.php">HOME</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="halaman.php">Guru</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="halaman_siswa.php">Siswa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="galeri.php">Galeri</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="login.php">Sign</a>
                        </li>
                    </ul>
                </div>
                <form action="" class="row g-1" method="get">
                <div class="search-box">
                    <input type="text" class="form-control" placeholder="Search..." name="katakunci"
                        value="<?php echo $katakunci ?>"  ?>    
                </div>
                </form> 
            </div>
        </nav>
    </header>
    <main>