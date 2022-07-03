<?php 

$title = 'Data Produk';

include 'layout/header.php';


$data_produk = select("SELECT * FROM produk ORDER BY id_produk DESC");

?>

<div class="container">
	<h1 class="tabel1"><strong>Data Produk</strong></h1>
	<div class="box">

<a href="tambah_produk.php" class="btn btn-primary mb-1"><i class="fas fa-plus"></i> Tambah</a>

<table class="table table-bordered table-striped mt-3" id="table" >
<thead> 
		<tr>
			<th>No</th>
			<th>Nama Produk</th>
			<th>Type</th>
      		<th>Tanggal</th>
			<th>Action</th>
		</tr>
</thead>  
		
<tbody>
<?php $no = 1; ?>
<?php foreach ($data_produk as $produk) : ?>
<tr> 

	<td><?php echo $no++;?></td>
	<td><?php echo $produk['nama_produk']; ?></td>
	<td><?php echo $produk['tipe']; ?></td>
	<td><?php echo date('d-m-y | H:i:s', strtotime($produk['tanggal'])); ?></td>
	<td width=25% class="text-center">
	  <a href="detail_produk.php?id_produk=<?php echo $produk['id_produk']?>"><button class="btn btn-secondary"><i class="fas fa-eye"></i> Detail</button></a>
	  <a href="update_produk.php?id_produk=<?php echo $produk['id_produk']?>"><button class="btn btn-warning"><i class="fas fa-edit"></i> Edit</button></a>
      <a href="delete_produk.php?id_produk=<?php echo $produk['id_produk']?>" onclick="return confirm('Yakin ingin menghapus data ini?');"><button class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button></a>
    </td>
</tr>
<?php endforeach; ?>
</tbody>
	</table>

</div>
</div> <!-- container -->

<?php include 'layout/footer.php';?>



