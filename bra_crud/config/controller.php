<?php

// function fungsi menampilkan data
function select($query)
{
    // panggil koneksi database 
    global $db;

    $result = mysqli_query($db, $query); 
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

        return $rows;
}

// fungsi menambahkan data barang
function create_produk($post)
{
    global $db;

	$nama_produk = strip_tags($post['nama_produk']);
	$tipe = strip_tags($post['tipe']);
	$lokasi = strip_tags($post['lokasi']);
    $gambar = strip_tags($post['gambar']);
    $deskripsi = strip_tags($post['deskripsi']);

    // query tambah data
    $query = "INSERT INTO produk VALUES(null,'$nama_produk','$tipe','$lokasi','$gambar','$deskripsi', CURRENT_TIMESTAMP())";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi mengubah data barang
function update_produk($post)
{
    global $db;

	$id_produk = $post['id_produk'];
    $nama_produk = $post['nama_produk'];
	$tipe = $post['tipe'];
	$lokasi = $post['lokasi'];
    $gambar = $post['gambar'];
    $deskripsi = $post['deskripsi'];
    
    // query ubah data
    $query = "UPDATE produk SET nama_produk = '$nama_produk', tipe = '$tipe', lokasi = '$lokasi', gambar = '$gambar', deskripsi = '$deskripsi' WHERE id_produk = $id_produk";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi menghapus data barang
function delete_produk($id_produk)
{
    global $db;
    
    // query hapus data
    $query = "DELETE FROM produk WHERE id_produk = $id_produk";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}
