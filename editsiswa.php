<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "sd inpres puar";


$koneksi = mysqli_connect($host, $user, $password, $db, );
if (!$koneksi) {
    die("Tidak Bisa Conect");
}

$NO = "";
$NAMA = "";
$NISN = "";
$GENDER = "";
$AGAMA = "";
$KELAS = "";
$AYAH = "";
$IBU = "";

$sukses = "";
$error = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'HAPUS') {
    $NO = $_GET['NO'];
    $sql1 = "delete from siswa where NO = '$NO'";
    $q1 = mysqli_query($koneksi, $sql1);
    if ($q1) {
        $sukses = "BERHASIL HAPUS";
    } else {
        $error = "GAGAL MENGHAPUS";
    }
}

if ($op == 'EDIT') {
    $NO = $_GET['NO'];
    $sql1 = "select*from siswa where NO = '$NO'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $NAMA = $r1['NAMA'];
    $NISN = $r1['NISN'];
    $GENDER = $r1['GENDER'];
    $AGAMA = $r1['AGAMA'];
    $KELAS = $r1['KELAS'];
    $AYAH = $r1['AYAH'];
    $IBU = $r1['IBU'];

    if ($NISN == '') {
        $error = "DATA TIDAK DITEMUKAN";

    }
}


if (isset($_POST['submit'])) {
    $NAMA = $_POST['NAMA'];
    $NISN = $_POST['NISN'];
    $GENDER = $_POST['GENDER'];
    $AGAMA = $_POST['AGAMA'];
    $KELAS = $_POST['KELAS'];
    $AYAH = $_POST['AYAH'];
    $IBU = $_POST['IBU'];

    if ($NAMA && $NISN && $GENDER && $AGAMA && $KELAS && $AYAH && $IBU) {
        if ($op == 'EDIT') { //untuk update
            $sql1 = "update siswa set NISN = '$NISN',NAMA='$NAMA',GENDER='$GENDER',AGAMA='$AGAMA',KELAS='$KELAS',AYAH='$AYAH',IBU='$IBU' where NO = '$NO'";
            $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "DATA BERHASIL DIUPDATE";
            } else {
                $error = "DATA GAGAL DIUPDATE";
            }
        } else { //untuk insert
            $sql1 = "insert into siswa(NAMA,NISN,GENDER,AGAMA,KELAS,AYAH,IBU) values('$NAMA','$NISN','$GENDER','$AGAMA','$KELAS','$AYAH','$IBU')";
            $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "BERHASIL INPUT DATA";
            } else {
                $error = "GAGAL INPUT DATA";
            }
        }

    } else {
        $error = " SILAHKAN INPUT KEMBALI";
    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA SISWA SD INPRES PUAR 2024</title>
    <link rel="stylesheet" type="text/css" href="sty.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>

    </style>
</head>

<body>
    <div class="mx-auto">
        <div class="card">
            <div class="card-header bg-secondary">
                Input Data
            </div>
            <div class="card-body">
                <?php
                if ($error) {
                    ?>
                    <div class="alert alert-danger" role="alert"><?php echo $error ?></div>
                    <?php
                    header("refresh:5;url=editsiswa.php");
                }
                ?>
                <?php
                if ($sukses) {
                    ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                    <?php
                    header("refresh:5;url=editsiswa.php");
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="NAMA" class="col-sm-2 col-form-label">NAMA LENGKAP</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="NAMA" name="NAMA" value="<?php echo $NAMA ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="NISN" class="col-sm-2 col-form-label">NISN</label>
                        <div class="col-sm-10">
                            <input type="bigint" class="form-control" id="NISN" name="NISN" value="<?php echo $NISN ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="GENDER" class="col-sm-2 col-form-label">GENDER</label>
                        <div class="col-sm-10"><select class="form-control" name="GENDER" id="GENDER">
                                <option value="">-Pilih Jenis Gender-</option>
                                <option value="LAKI-LAKI" <?php if ($GENDER == "LAKI-LAKI")
                                    echo "selected" ?>>LAKI-LAKI
                                    </option>
                                    <option value="PEREMPUAN" <?php if ($GENDER == "PEREMPUAN")
                                    echo "selected" ?>>PEREMPUAN
                                    </option>
                                </select></div>

                        </div>
                        <div class="mb-3 row">
                            <label for="AGAMA" class="col-sm-2 col-form-label">AGAMA</label>
                            <div class="col-sm-10"><select class="form-control" name="AGAMA" id="AGAMA">
                                    <option value="">-Pilih Agama-</option>
                                    <option value="ISLAM" <?php if ($AGAMA == "ISLAM")
                                    echo "selected" ?>>ISLAM</option>
                                    <option value="KATHOLIK" <?php if ($AGAMA == "KATHOLIK")
                                    echo "selected" ?>>KATHOLIK
                                    </option>
                                    <option value="PROTESTAN" <?php if ($AGAMA == "PROTESTAN")
                                    echo "selected" ?>>PROTESTAN
                                    </option>
                                    <option value="HINDU" <?php if ($AGAMA == "HINDU")
                                    echo "selected" ?>>HINDU</option>
                                    <option value="BUDDHA" <?php if ($AGAMA == "BUDDHA")
                                    echo "selected" ?>>BUDDHA</option>
                                    <option value="KONGHUCU" <?php if ($AGAMA == "KONGHUCU")
                                    echo "selected" ?>>KONGHUCU
                                    </option>
                                </select></div>
                        </div>
                        <div class="mb-3 row">
                            <label for="KELAS" class="col-sm-2 col-form-label">KELAS</label>
                            <div class="col-sm-10"><select class="form-control" name="KELAS" id="KELAS">
                                    <option value="">-Pilih Kelas-</option>
                                    <option value="1" <?php if ($KELAS == "1")
                                    echo "selected" ?>>Kelas 1</option>
                                    <option value="2" <?php if ($KELAS == "2")
                                    echo "selected" ?>>Kelas 2</option>
                                    <option value="3" <?php if ($KELAS == "3")
                                    echo "selected" ?>>Kelas 3</option>
                                    <option value="4" <?php if ($KELAS == "4")
                                    echo "selected" ?>>Kelas 4</option>
                                    <option value="5" <?php if ($KELAS == "5")
                                    echo "selected" ?>>Kelas 5</option>
                                    <option value="6" <?php if ($KELAS == "6")
                                    echo "selected" ?>>Kelas 6</option>
                                </select></div>
                        </div>
                        <div class="mb-3 row">
                            <label for="AYAH" class="col-sm-2 col-form-label">NAMA AYAH</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="AYAH" name="AYAH" value="<?php echo $AYAH ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="IBU" class="col-sm-2 col-form-label">NAMA IBU</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="IBU" name="IBU" value="<?php echo $IBU ?>">
                        </div>
                    </div>
                    <br>
                    <div class="col-12">
                        <input type="submit" name="submit" value="SIMPAN" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="card">
        <div class="card-header bg-secondary">
            Data Siswa
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">NAMA</th>
                        <th scope="col">NISN</th>
                        <th scope="col">GENDER</th>
                        <th scope="col">AGAMA</th>
                        <th scope="col">KELAS</th>
                        <th scope="col">NAMA AYAH</th>
                        <th scope="col">NAMA IBU</th>
                        <th scope="col"></th>
                    </tr>
                <tbody>
                    <?php
                    $sql2 = "select*from siswa order by NO desc";
                    $q2 = mysqli_query($koneksi, $sql2);
                    $urut = 1;
                    while ($r2 = mysqli_fetch_array($q2)) {
                        $NO = $r2['NO'];
                        $NAMA = $r2['NAMA'];
                        $NISN = $r2['NISN'];
                        $GENDER = $r2['GENDER'];
                        $AGAMA = $r2['AGAMA'];
                        $KELAS = $r2['KELAS'];
                        $AYAH = $r2['AYAH'];
                        $IBU = $r2['IBU'];
                        ?>
                        <tr>
                            <th scope="row"><?php echo $urut++ ?></th>
                            <th scope="row"><?php echo $NAMA ?></th>
                            <th scope="row"><?php echo $NISN ?></th>
                            <th scope="row"><?php echo $GENDER ?></th>
                            <th scope="row"><?php echo $AGAMA ?></th>
                            <th scope="row"><?php echo $KELAS ?></th>
                            <th scope="row"><?php echo $AYAH ?></th>
                            <th scope="row"><?php echo $IBU ?></th>
                            <th scope="row">
                                <a href="editsiswa.php?op=EDIT&NO=<?php echo $NO ?>"><button type="button"
                                        class="btn btn-warning">EDIT</button></a>
                                <a href="editsiswa.php?op=HAPUS&NO=<?php echo $NO ?>"
                                    onclick="return confirm('YAKIN INGIN MENGHAPUS DATA?')"><button type="button"
                                        class="btn btn-danger">HAPUS</button></a>
                            </th>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
                </thead>
            </table>
            <a href="dashboard.php"><button class="btn btn-primary">KEMBALI</button></a>
        </div>
    </div>
    </div>
</body>

</html>