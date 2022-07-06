<?php 

session_start();

include 'layout/header.php';


// mengambil id barang dari url
$id_produk = (int)$_GET['id_produk'];

if (delete_produk($id_produk) > 0) {
        echo "<script>
                alert('Data Produk Berhasil Dihapus');
                document.location.href = 'index.php';
              </script>";
    }  else {        
        echo "<script>
                alert('Data Produk Gagal Dihapus');
                document.location.href = 'index.php';
             </script>";
    }

?>

<?php include 'layout/footer.php'; ?>