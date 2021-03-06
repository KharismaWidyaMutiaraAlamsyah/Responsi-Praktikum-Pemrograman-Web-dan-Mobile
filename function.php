<?php

$db = mysqli_connect("localhost", "root", "", "pengumuman");


function query($query)
{
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $db;
    // ambil data dari tiap elemen dalam form
    $judul = htmlspecialchars($data["judul"]);
    $isi = htmlspecialchars($data["isi"]);
    $query = "INSERT INTO umumkan
				VALUES
				(' ','$judul', '$isi')
				";
    // query insert data
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}


function hapus($id)
{
    global $db;
    mysqli_query($db, "DELETE FROM umumkan WHERE id = $id");
    return mysqli_affected_rows($db);
}

function ubah($data)
{
    global $db;
    $id = $data["id"];
    // ambil data dari tiap elemen dalam form
    $judul = htmlspecialchars($data["judul"]);
    $isi = htmlspecialchars($data["isi"]);
    $query = "UPDATE umumkan SET 
				judul = '$judul', 
				isi ='$isi'
				WHERE id = $id
			";
    // query insert data
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}
