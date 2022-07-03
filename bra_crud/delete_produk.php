<?php 

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

<center> <div> 
<form action="" method="POST">
<table align="center" height=95% width=95%>
 <tr>
    <th colspan="2">Konfirmasi Pengahapusan </th>
 </tr>
 <tr>  <td>ID Artikel</td> <td><?php echo $data['id_produk']; ?></td>
 </tr>
 <tr><td>Nama Game</td><td><?php echo $data['nama']; ?></td>
 </tr>
 <tr> <td>Judul Artikel</td> <td> <?php echo $data['tipe']; ?></td>
 </tr>
 <tr>
   <td>Isi Artikel</td>  <td> <?php echo $data['lokasi']; ?> </td>
 </tr>
  <tr>
   <td>Kategori</td>  <td> <?php echo $data['gambar']; ?> </td>
 </tr>
 <tr>
   <td>Image</td>  <td> <?php echo $data['deskripsi']; ?> </td>
 </tr>
   <tr> <th colspan="2"> <input type="submit" value="Hapus" name="konfirmHapus"> 
 </form>
   <a href='tabel.php'>  <button type='button'> Batal </button> </a> </th>
   </tr>
</table>
</div> </center>

<?php include 'layout/footer.php'; ?>