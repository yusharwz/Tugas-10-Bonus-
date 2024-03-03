<?php
require_once 'koneksi.php';

$id = $_GET["id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nama_produk = $_POST["nama_produk"];
    $keterangan = $_POST["keterangan"];
    $harga = $_POST["harga"];
    $jumlah = $_POST["jumlah"];

    mysqli_query($conn, "UPDATE produk SET nama_produk='$nama_produk', keterangan='$keterangan', harga='$harga', jumlah='$jumlah' WHERE id='$id'");
    header("Location: index.php");
    exit;
} else {
    $sql = mysqli_query ($conn,"SELECT * FROM produk WHERE id='$id'");
    $data = $sql->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Produk</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <img class="pijar" src="PijarCamp.png" />
        <h1 class="my-5">Ubah Produk</h1>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            <div class="form-group">
                <label for="nama_produk">Nama Produk:</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?php echo $data['nama_produk']; ?>" required>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan:</label>
                <textarea class="form-control" id="keterangan" name="keterangan" required><?php echo $data['keterangan']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="number" class="form-control" id="harga" name="harga" value="<?php echo $data['harga']; ?>" required>
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah:</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?php echo $data['jumlah']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Ubah</button>
        </form>
    </div>
</body>
</html>
