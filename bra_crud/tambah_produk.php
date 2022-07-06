<?php 

session_start();

$title = 'Tambah Produk';

include 'layout/header.php';



if (isset($_POST['submit'])) {
    if (create_produk($_POST) > 0) {
        echo "<script>
                alert('Data Produk Berhasil Ditambahkan');
                document.location.href = 'index.php';
              </script>";
    }  else {        
        echo "<script>
                alert('Data Produk Gagal Ditambahkan');
                document.location.href = 'index.php';
             </script>";
    }
}

?>

<div class="container mt-5">
    <h1>Tambah Produk</h1>
    <hr>

<form action="" method="POST" name="input">

 <div class="mb-3">
    <label for="nama_produk" class="form-label">Nama Produk</label>
    <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Tuliskan nama Produk" required>
 </div>

 <div class="mb-3">
    <label for="tipe" class="form-label">Tipe</label>
    <input type="text" class="form-control" id="tipe" name="tipe" placeholder="Tuliskan nama Produk" required>
 </div>

 <div class="mb-3">
    <label for="lokasi" class="form-label">Lokasi</label>
    <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Tuliskan nama Produk" required>
 </div>

 <div class="mb-3">
    <label for="gambar" class="form-label">Gambar</label>
    <input type="file" class="form-control" id="gambar" name="gambar" placeholder="Tuliskan nama Produk" >
 </div>

 <div class="mb-3">
    <label for="deskripsi" class="form-label">deskripsi</label>
    <textarea class="form-control" rows="4" id="deskripsi" name="deskripsi" placeholder="Tuliskan nama Produk" required></textarea>
 </div>

 <button type="submit" name="submit" class="btn btn-primary" style="float: right;">Tambahkan</button>
</form>	

</div> <!-- container -->
 
<?php include 'layout/footer.php';?>



