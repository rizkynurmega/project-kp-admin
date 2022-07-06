<?php 

session_start();

// Membatasi halaman sebelum login

// if(!isset($_SESSION["login"])) {
// 	echo "<script>
// 			alert('Harap Login Terlebih Dahulu');
// 			document.location.href = 'login_admin.php';
// 			</script>";
// 	exit;		
// }

$title = 'Data Akun';

include 'layout/header.php';

$data_akun = select("SELECT * FROM akun_admin");

// button create
if (isset($_POST['create'])) {
    if (create_akun($_POST) > 0) {
        echo "<script>
        alert('Data Akun Berhasil Ditambahkan');
        document.location.href = 'akun_admin.php';
      </script>";
    }  else {        
echo "<script>
        alert('Data Akun Gagal Ditambahkan');
        document.location.href = 'akun_admin.php';
     </script>";
    }
}

// button edit
if (isset($_POST['edit'])) {
    if (update_akun($_POST) > 0) {
        echo "<script>
        alert('Data Akun Berhasil Diubah');
        document.location.href = 'akun_admin.php';
      </script>";
    }  else {        
echo "<script>
        alert('Data Akun Gagal Diubah');
        document.location.href = 'akun_admin.php';
     </script>";
    }
}


?>

<div class="container mt-3">
	<h1 class="tabel1"><strong>Data Akun</strong></h1>
    <hr>

    <button type="button" class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#modalCreate"><i class="fas fa-plus"></i>Tambah</button>

<table class="table table-bordered table-striped mt-3" id="table" >
<thead> 
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Username</th>
      		<th>Password</th>
			<th>Role</th>
            <th>Action</th>
		</tr>
</thead>  
		
<tbody>
<?php $no = 1;?>
<?php foreach ($data_akun as $akun_admin) : ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $akun_admin['namaLengkap']; ?></td>
        <td><?= $akun_admin['username']; ?></td>
        <td>Enkripsi Password</td>
        <td><?= $akun_admin['role']; ?></td>
        <td width=15% class="text-center">
            <button type="button" class="btn btn-warning mb-1"  data-bs-toggle="modal" data-bs-target="#modalEdit<?= $akun_admin['userID']; ?>"><i class="fas fa-edit"></i>Edit</button>

            <button type="button" class="btn btn-danger mb-1" data-bs-toggle="modal" data-bs-target="#modalDelete<?= $akun_admin['userID']; ?>"><i class="fas fa-trash-alt"></i>Delete</button>
        </td>    
    </tr>    
<?php endforeach; ?>    
</tbody>
	</table>




<!-- Modal Create Account -->
<div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="exampleModalLabel">Create Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
            <div class="mb-3">
                <label for="namaLengkap">Nama</label>
                <input type="text" name="namaLengkap" id="namaLengkap" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required minlength="6">
            </div>

            <div class="mb-3">
                <label for="role">Role</label>
                <select name="role" id="role" class="form-control" required>
                    <option value="">-- Pilih Role --</option>
                    <option value="1">Admin</option>
                    <option value="2">Operator</option>
                </select>
            </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
        <button type="submit" name="create" class="btn btn-success">Create</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Edit Account -->
<?php foreach ($data_akun as $akun_admin) : ?>

<div class="modal fade" id="modalEdit<?= $akun_admin['userID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-warning text-white">
        <h5 class="modal-title" id="exampleModalLabel">Edit Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
            <input type="hidden" name="userID" value="<?= $akun_admin['userID']; ?>">

            <div class="mb-3">
                <label for="namaLengkap">Nama</label>
                <input type="text" name="namaLengkap" id="namaLengkap" class="form-control" value="<?= $akun_admin['namaLengkap']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" value="<?= $akun_admin['username']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="password">Password <small>(Masukkan Password)</small></label>
                <input type="password" name="password" id="password" class="form-control"  required minlength="6">
            </div>

            <div class="mb-3">
                <label for="role">Role</label>
                <select name="role" id="role" class="form-control" required>
                    <?php $role = $akun_admin['role']; ?>
                    <option value="1" <?= $role == '1' ? 'selected' : null ?>>Admin</option>
                    <option value="2" <?= $role == '2' ? 'selected' : null ?>>Operator</option>
                </select>
            </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
        <button type="submit" name="edit" class="btn btn-warning">Edit</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php endforeach; ?>

<!-- Modal Delete Account -->
<?php foreach ($data_akun as $akun_admin) : ?>
<div class="modal fade" id="modalDelete<?= $akun_admin['userID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="exampleModalLabel">Delete Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <p>Yakin Ingin Menghapus Akun <?= $akun_admin['namaLengkap'];?>  </P>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
        <a href="delete_akun.php?userID=<?= $akun_admin['userID']; ?>" class="btn btn-danger">Delete</a>
      </div>
    </div>
  </div>
</div>

<?php endforeach; ?>    

</div> <!-- container -->

<?php include 'layout/footer.php';?>



