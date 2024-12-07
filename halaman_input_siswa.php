<?php include("inc_header.php") ?>
<?php
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

if (isset($_GET['NO'])) {
    $NO = $_GET['NO'];
} else {
    $NO = "";
}
if ($NO != "") {
    $sql1 = "select * from siswa where NO= '$NO'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $NAMA = $r1['NAMA'];
    $NISN = $r1['NISN'];
    $GENDER = $r1['GENDER'];
    $AGAMA = $r1['AGAMA'];
    $KELAS = $r1['KELAS'];
    $AYAH = $r1['AYAH'];
    $IBU = $r1['IBU'];
    if ($NAMA == '') {
        $error = "Data Tidak Ditemukan";
    }
}
if (isset($_POST['simpan'])) {
    $NAMA = $_POST['NAMA'];
    $NISN = $_POST['NISN'];
    $GENDER = $_POST['GENDER'];
    $AGAMA = $_POST['AGAMA'];
    $KELAS = $_POST['KELAS'];
    $AYAH = $_POST['AYAH'];
    $IBU = $_POST['IBU'];

    if ($NISN == '' or $NAMA == '') {
        $error = "SILAHKAN INPUT DATA TERLEBIH DAHULU";
    }
    if (empty($error)) {
        if ($NO != "") {
            $sql1 = "update siswa set  NAMA= '$NAMA', NISN = '$NISN', GENDER='$GENDER', AGAMA='$AGAMA', KELAS=$KELAS, AYAH = '$AYAH', IBU = '$IBU' where NO ='$NO'";
        } else {
            $sql1 = "insert into siswa(NAMA,NISN,GENDER,AGAMA,KELAS,AYAH,IBU) values('$NAMA','$NISN','$GENDER','$AGAMA','$KELAS','$AYAH','$IBU')";
        }
        $q1 = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $sukses = "BERHASIL INPUT DATA";
        } else {
            $error = "GAGAL INPUT DATA";
        }
    }
}
?>
<h1>Halaman Input Data</h1>
<div>
    <a class="btn btn-primary" href="halaman_siswa.php" role="button">BACK</a>
</div>
<?php
if ($error) {
    ?>
    <div class="alert alert-danger" role="alert"><?php echo $error ?></div>
    <?php
    header("refresh:3;url=halaman_input_siswa.php");
}
?>
<?php
if ($sukses) {
    ?>
    <div class="alert alert-primary" role="alert">
        <?php echo $sukses ?>
    </div>
    <?php
    header("refresh:3;url=halaman_input_siswa.php");
}
?>
<form action="" method="post">
    <div class="mx-auto">
        <div class="card" >
            <div class="card-header bg-secondary">
                Input Data
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="NAMA" class="col-sm-2 col-form-label">NAMA SISWA</label>
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
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="AGAMA" class="col-sm-2 col-form-label">AGAMA</label>
                            <div class="col-sm-10"><select class="form-control" name="AGAMA" id="AGAMA">
                                    <option value="">-Pilih Agama-</option>
                                    <option value="ISLAM" <?php if ($AGAMA == "ISLAM")
                                    echo "selected" ?>>ISLAM</option>
                                    <option value="KATHOLIK" <?php if ($AGAMA == "KATHOLIK")
                                    echo "selected" ?>>KATHOLIK</option>
                                    <option value="PROTESTAN" <?php if ($AGAMA == "PROTESTAN")
                                    echo "selected" ?>>PROTESTAN
                                    </option>
                                    <option value="HINDU" <?php if ($AGAMA == "HINDU")
                                    echo "selected" ?>>HINDU</option>
                                    <option value="BUDDHA" <?php if ($AGAMA == "BUDDHA")
                                    echo "selected" ?>>BUDDHA</option>
                                    <option value="KONGHUCU" <?php if ($AGAMA == "KONGHUCU")
                                    echo "selected" ?>>KONGHUCU</option>
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
                                    echo "selected" ?>>Kelas 3
                                    </option>
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
                        <input type="submit" name="simpan" value="SIMPAN" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</form>
<?php include("inc_footer.php") ?>