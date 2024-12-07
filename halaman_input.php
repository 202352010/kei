<?php include("inc_header.php") ?>
<?php
$KODE = "";
$NIP = "";
$NAMA = "";
$GENDER = "";
$AGAMA = "";
$EMAIL = "";
$sukses = "";
$error = "";

if(isset($_GET['KODE'])){
    $KODE = $_GET['KODE'];
}else{
    $KODE = "";
}
if ($KODE !=""){
    $sql1 = "select * from guru where KODE= '$KODE'";
    $q1 = mysqli_query($koneksi,$sql1);
    $r1 = mysqli_fetch_array($q1);
    $NIP = $r1['NIP'];
    $NAMA = $r1['NAMA'];
    $GENDER = $r1['GENDER'];
    $AGAMA = $r1['AGAMA'];
    $EMAIL = $r1['EMAIL'];
    if($NAMA ==''){
        $error = "Data Tidak Ditemukan";
    }
}
if (isset($_POST['simpan'])) {
    $NIP = $_POST['NIP'];
    $NAMA = $_POST['NAMA'];
    $GENDER = $_POST['GENDER'];
    $AGAMA = $_POST['AGAMA'];
    $EMAIL = $_POST['EMAIL'];

    if ($NIP == '' or $NAMA == '') {
        $error = "SILAHKAN INPUT DATA TERLEBIH DAHULU";
    }
    if (empty($error)) {
        if($KODE != ""){
            $sql1 = "update guru set NIP = '$NIP', NAMA= '$NAMA', GENDER='$GENDER', AGAMA='$AGAMA', EMAIL='$EMAIL' where KODE ='$KODE'";
        }else{
            $sql1 = "insert into guru(NIP,NAMA,GENDER,AGAMA,EMAIL) values('$NIP','$NAMA','$GENDER','$AGAMA','$EMAIL')";
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
    <a class="btn btn-primary" href="halaman.php" role="button">BACK</a>
</div>
<?php
if ($error) {
    ?>
    <div class="alert alert-danger" role="alert"><?php echo $error ?></div>
    <?php
    header("refresh:3;url=halaman_input.php");
}
?>
<?php
if ($sukses) {
    ?>
    <div class="alert alert-primary" role="alert">
        <?php echo $sukses ?>
    </div>
    <?php
    header("refresh:3;url=halaman_input.php");
}
?>
<form action="" method="post">
    <div class="mx-auto">
        <div class="card">
            <div class="card-header bg-secondary">
                Input Data
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="NIP" class="col-sm-2 col-form-label">NIP</label>
                        <div class="col-sm-10">
                            <input type="bigint" class="form-control" id="NIP" name="NIP" value="<?php echo $NIP ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="NAMA" class="col-sm-2 col-form-label">NAMA GURU</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="NAMA" name="NAMA" value="<?php echo $NAMA ?>">
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
                        <div class="row">
                            <label for="EMAIL" class="col-sm-2 col-form-label">EMAIL</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="EMAIL" name="EMAIL"
                                    value="<?php echo $EMAIL ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="SIMPAN" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</form>
<?php include("inc_footer.php") ?>