<?php
class Database {
    var $host = "localhost";
    var $username = "root";
    var $password = "";
    var $database = "property";
    var $koneksi = "";

    function __construct() {
        $this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if (mysqli_connect_errno()) {
            echo "Koneksi database gagal: " . mysqli_connect_error();
        }
    }
    function login($username)
{
    $data = mysqli_query($this->koneksi, "SELECT * FROM user WHERE username = '$username'");
    
    if (mysqli_num_rows($data) == 0) {
        echo "<b>Data user tidak ada</b>";
        $hasil = [];
        header("location: login.php");
    } else {
        $hasil = [];
        while ($row = mysqli_fetch_array($data)) {
            $hasil[] = $row;
        }
    }

    return $hasil;
}

function tampil_data() {
    $data = mysqli_query($this->koneksi, "SELECT a.*, b.*, c.* FROM data_pekerja a 
                                           INNER JOIN jenis_kelamin b ON b.kode_jk = a.jenis_kelamin
                                           INNER JOIN status_pekerja c ON c.kode_kerja = a.status_pekerja");
    
    while ($row = mysqli_fetch_array($data)) {
        $hasil[] = $row;
    }
    return $hasil;
}
function tampil_material() {
    $data = mysqli_query($this->koneksi, "select a. *, b.* from data_material a INNER JOIN satuan_material b ON b.kode_m = a.satuan_material");
    
    while ($row = mysqli_fetch_array($data)) {
        $hasil[] = $row;
    }
    return $hasil;
}
}