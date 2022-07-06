<?php 

session_start();

include 'config/app.php';


// mengambil id Akun dari url
$userID = (int)$_GET['userID'];

if (delete_akun($userID) > 0) {
        echo "<script>
                alert('Data Akun Berhasil Dihapus');
                document.location.href = 'akun_admin.php';
              </script>";
    }  else {        
        echo "<script>
                alert('Data Akun Gagal Dihapus');
                document.location.href = 'akun_admin.php';
             </script>";
    }

?>
