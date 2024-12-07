<?php include("inc_header.php")

?>
<?php
$KODE = "";
$NIP = "";
$NAMA = "";
$GENDER = "";
$AGAMA = "";
$EMAIL = "";
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
    $KODE = $_GET['KODE'];
    $sql1 = "delete from guru where KODE = '$KODE'";
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
    header("refresh:3;url=halaman.php");
}
?>
<?php
if ($sukses) {
    ?>
    <div class="alert alert-success" role="alert">
        <?php echo $sukses ?>
    </div>
    <?php
    header("refresh:3;url=halaman.php");
}
?>
<div class="card" c>
    <div class="card-header bg-secondary " >
        Data Guru
    </div>
    <div class="card-body" >
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">NIP</th>
                    <th scope="col">NAMA GURU</th>
                    <th scope="col">GENDER</th>
                    <th scope="col">AGAMA</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col"></th>
                </tr>
            <tbody>
                <?php
                $sqltambahan = "";
                $per_halaman = 2;
                if ($katakunci != '') {
                    $array_katakunci = explode(" ", $katakunci);
                    for ($x = 0; $x < count($array_katakunci); $x++) {
                        $sqlsearch[] = "( NIP like '%" . $array_katakunci[$x] . "%' or NAMA like '%" . $array_katakunci[$x] . "%' or EMAIL like '%" . $array_katakunci[$x] . "%')";
                    }
                    $sqltambahan = "where" . implode("or", $sqlsearch);
                }
                $sql1 = "select*from guru $sqltambahan order by KODE desc";
                $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
                $mulai = ($page > 1) ? ($page * $per_halaman) - $per_halaman : 0;
                $q1 = mysqli_query($koneksi, $sql1);
                $total = mysqli_num_rows($q1);
                $pages = ceil($total / $per_halaman);
                $nomor = $mulai + 1;
                $sql1 = $sql1 . " order by KODE desc limit $mulai,$per_halaman";
                $urut = 1;
                while ($r1 = mysqli_fetch_array($q1)) {
                    $KODE = $r1['KODE'];
                    $NIP = $r1['NIP'];
                    $NAMA = $r1['NAMA'];
                    $GENDER = $r1['GENDER'];
                    $AGAMA = $r1['AGAMA'];
                    $EMAIL = $r1['EMAIL'];
                    ?>
                    <tr>
                        <th scope="row"><?php echo $urut++ ?></th>
                        <th scope="row"><?php echo $NIP ?></th>
                        <th scope="row"><?php echo $NAMA ?></th>
                        <th scope="row"><?php echo $GENDER ?></th>
                        <th scope="row"><?php echo $AGAMA ?></th>
                        <th scope="row"><?php echo $EMAIL ?></th>
                        
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