
<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect ke login jika belum login
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https.//kit.fontawesome.com/4592f70558.js" crossorigin="anonimous"></script>
</head>
<body>
<body class="container">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="editguru.php">Guru</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="editsiswa.php">Siswa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="logout.php">Logout</a>
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
    <h1>Selamat datang, <?= htmlspecialchars($_SESSION['username']) ?>!</h1>
    
</body>
</html>
