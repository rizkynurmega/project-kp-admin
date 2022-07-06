<?php

session_start();

$title = 'Update Produk';

include 'layout/header.php';

// mengambil id barang dari url
$id_produk = (int)$_GET['id_produk'];

// [0] = hanya 1 data yang di ambil 
$produk = select("SELECT * FROM produk WHERE id_produk = $id_produk")[0];

if (isset($_POST['update'])) {
    if (update_produk($_POST) > 0) {
        echo "<script>
                alert('Data Produk Berhasil Diubah');
                document.location.href = 'index.php';
              </script>";
    } else {
        echo "<script>
                alert('Data Produk Gagal Diubah');
                document.location.href = 'index.php';
             </script>";
    }
}

?>

<div class="container mt-5">
    <h1>Update Produk</h1>


    <form action="" method="post">

        <input type="hidden" id="id_produk" name="id_produk" value="<?= $produk['id_produk']; ?>">

        <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?= $produk['nama_produk']; ?>" placeholder="Tuliskan nama Produk" required>
        </div>

        <div class="mb-3">
            <label for="tipe" class="form-label">Tipe</label>
            <input type="text" class="form-control" id="tipe" name="tipe" value="<?= $produk['tipe']; ?>" placeholder="Tuliskan nama Produk" required>
        </div>

        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi</label>
            <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?= $produk['lokasi']; ?>" placeholder="Tuliskan nama Produk" required>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <img src="produk_id=<?php echo $row["produk_id"]; ?>" /><br />
            <input type="file" class="form-control" id="gambar" name="gambar" value="<?= $produk['gambar']; ?>" placeholder="Tuliskan nama Produk">
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">deskripsi</label>
            <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Tuliskan nama Produk" required><?= $produk['deskripsi'] ?></textarea>
        </div>

        <button type="submit" name="update" class="btn btn-primary" style="float: right;">Update</button>
        <br />
        <br />
        <a href='index.php'> <button type="button" class="btn btn-danger btn-block">Cancle</button> </a>
    </form>

</div> <!-- container -->

<?php include 'layout/footer.php'; ?>