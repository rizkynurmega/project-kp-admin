<?php 

session_start();

$title = 'Detail Produk';

include 'layout/header.php';

// mengambil id produk dari url
$id_produk = (int)$_GET['id_produk'];

$produk = select("SELECT * FROM produk WHERE id_produk = $id_produk")[0];

?>

<div class="container mt-5">
    <h1 class="tabel1"><strong>Data <?= $produk['nama_produk']; ?> </strong></h1>
    <hr>

    <table class="table table-bordered table-striped mt-3"  >
        <tr>
            <td>Nama</td>
            <td>: <?= $produk['nama_produk']; ?></td>
        </tr>    
        <tr>
            <td>Tipe</td>
            <td>: <?= $produk['tipe']; ?></td>
        </tr>  
        <tr>
            <td>Lokasi</td>
            <td>: <?= $produk['lokasi']; ?></td>
        </tr>  
        <tr>
            <td>Gambar</td>
            <td>: <?= $produk['gambar']; ?></td>
        </tr>  
        <tr>
            <td>Deskripsi</td>
            <td>: <?= $produk['deskripsi']; ?></td>
        </tr>  
        <tr>
            <td>Tanggal </td>
            <td>: <?= $produk['tanggal']; ?></td>
        </tr>  
    </table>

    <a href="index.php" class="btn btn-secondary btn-sm" style="float: right ;">Back</a>

</div> <!-- container -->

<?php include 'layout/footer.php';?>

