<?php include("inc_header.php") ?>
<?php
$NO = "";
$NAMA = "";
$NISN = "";
$GENDER = "";
$AGAMA = "";
$KELAS="";
$AYAH = "";
$IBU ="";

$sukses = "";
$error = "";

?>
<?php
$katakunci = (isset($_GET['katakunci'])) ? $_GET['katakunci'] : "";
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
?>

<?php
if ($error) {
    ?>
    <div class="alert alert-danger" role="alert"><?php echo $error ?></div>
    <?php
    header("refresh:3;url=halaman_siswa.php");
}
?>
<?php
if ($sukses) {
    ?>
    <div class="alert alert-success" role="alert">
        <?php echo $sukses ?>
    </div>
    <?php
    header("refresh:3;url=halaman_siswa.php");
}
?>

<div class="card">
    <div class="card-header bg-secondary">
        Data Siswa
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">NAMA SISWA</th>
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
                $sqltambahan = "";
                $per_halaman = 2;
                if ($katakunci != '') {
                    $array_katakunci = explode(" ", $katakunci);
                    for ($x = 0; $x < count($array_katakunci); $x++) {
                        $sqlsearch[] = "( NISN like '%" . $array_katakunci[$x] . "%' or NAMA like '%" . $array_katakunci[$x] . "%' or AYAH like '%" . $array_katakunci[$x] . "%' or IBU like '%" . $array_katakunci[$x] . "%')";
                    }
                    $sqltambahan = "where" . implode("or", $sqlsearch);
                }
                $sql1 = "select*from siswa $sqltambahan order by NO desc";
                $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
                $mulai = ($page > 1) ? ($page * $per_halaman) - $per_halaman : 0;
                $q1 = mysqli_query($koneksi, $sql1);
                $total = mysqli_num_rows($q1);
                $pages = ceil($total / $per_halaman);
                $nomor = $mulai + 1;
                $sql1 = $sql1 . " order by NO desc limit $mulai,$per_halaman";
                $urut = 1;
                while ($r1 = mysqli_fetch_array($q1)) {
                    $NO = $r1['NO'];
                    $NAMA = $r1['NAMA'];
                    $NISN = $r1['NISN'];
                    $GENDER = $r1['GENDER'];
                    $AGAMA = $r1['AGAMA'];
                    $KELAS = $r1['KELAS'];
                    $AYAH = $r1['AYAH'];
                    $IBU = $r1['IBU'];
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
                        
                    </tr>
                    <?php
                }
                ?>
            </tbody>
            </thead>

        </table>
        
    </div>
</div>
<?php include("inc_footer.php") ?>