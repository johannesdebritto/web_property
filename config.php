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
    $data = mysqli_query($this->koneksi, "SELECT a.*, b.* FROM data_pekerja a 
                                           INNER JOIN jenis_kelamin b ON b.kode_jk = a.jenis_kelamin
                                          ");
    
    while ($row = mysqli_fetch_array($data)) {
        $hasil[] = $row;
    }
    return $hasil;
}
function tampil_material() {
    $data = mysqli_query($this->koneksi, "SELECT  a. *, b.* from data_material a INNER JOIN satuan_material b ON b.kode_m = a.satuan_material");
    
    while ($row = mysqli_fetch_array($data)) {
        $hasil[] = $row;
    }
    return $hasil;
}
function tampil_property() {
    $hasil = array(); // Inisialisasi array kosong untuk menangani database kosong
    $data = mysqli_query($this->koneksi, "SELECT * FROM tipe_rumah");

    if ($data) {
        while ($row = mysqli_fetch_array($data)) {
            $hasil[] = $row;
        }
    }

    return $hasil;
}

function tampil_admin() {
    $hasil = array(); // Inisialisasi array kosong untuk menangani database kosong
    $data = mysqli_query($this->koneksi, "SELECT * FROM user");

    if ($data) {
        while ($row = mysqli_fetch_array($data)) {
            $hasil[] = $row;
        }
    }

    return $hasil;
}

function tampil_bank() {
    $hasil = array(); // Inisialisasi array kosong untuk menangani database kosong
    $data = mysqli_query($this->koneksi, "SELECT * FROM pembayaran");

    if ($data) {
        while ($row = mysqli_fetch_array($data)) {
            $hasil[] = $row;
        }
    }

    return $hasil;
}
function tampil_data_jenis_kelamin()
{
    $data_jenis_kelamin = mysqli_query($this->koneksi, "select * from jenis_kelamin");
    $hasil_jenis_kelamin = array();
    while ($row_jenis_kelamin = mysqli_fetch_array($data_jenis_kelamin)) {
        $hasil_jenis_kelamin[] = $row_jenis_kelamin;
    }
    return $hasil_jenis_kelamin;
}
function tampil_data_client() {
    $data = mysqli_query($this->koneksi, "SELECT a.*, b.* FROM data_client a INNER JOIN jenis_kelamin b ON b.kode_jk = a.jenis_kelamin");

    $hasil = [];

    while ($row = mysqli_fetch_array($data)) {
        $hasil[] = $row;
    }

    return $hasil;
}

function tampil_data_ulasan() {
    $data = mysqli_query($this->koneksi, "SELECT a.*, b.* FROM data_ulasan a INNER JOIN jenis_kelamin b ON b.kode_jk = a.jenis_kelamin");

    $hasil = [];

    while ($row = mysqli_fetch_array($data)) {
        $hasil[] = $row;
    }

    return $hasil;
}

 function simpan_edit_data_tipe_rumah($kode_rumah, $nama_tipe, $harga_rumah, $deskripsi, $foto_tipe_rumah) {
    // Lakukan validasi atau pemeriksaan lain jika diperlukan
    // ...

    // Perbarui data di tabel tipe_rumah
    $query = "UPDATE tipe_rumah SET nama_tipe = '$nama_tipe', harga_rumah = '$harga_rumah', deskripsi = '$deskripsi', foto = '$foto_tipe_rumah' WHERE kode_rumah = '$kode_rumah'";

    $result = mysqli_query($this->koneksi, $query);

    if ($result) {
        // Data berhasil diupdate
        return true;
    } else {
        // Gagal mengupdate data
        return false;
    }
}

function kode_rumah($kode_rumah)
    {
        $tipe_rumah = mysqli_query($this->koneksi, "SELECT * FROM tipe_rumah WHERE kode_rumah='$kode_rumah'");


        while ($row_peminjam = mysqli_fetch_assoc($tipe_rumah)) {
            $hasil_peminjam[] = $row_peminjam;
        }
        return $hasil_peminjam;
    }
   function tambah_data_tipe_rumah($kode_rumah, $nama_tipe, $harga_rumah,$deskripsi, $foto_tipe_rumah) {
        // Lakukan validasi atau pemeriksaan lain jika diperlukan
        // ...
        
        $query = "INSERT INTO tipe_rumah (kode_rumah, nama_tipe, harga_rumah,deskripsi, foto) VALUES ('$kode_rumah', '$nama_tipe', '$harga_rumah','$deskripsi', '$foto_tipe_rumah')";

        $result = mysqli_query($this->koneksi, $query);

        if ($result) {
            // Data berhasil ditambahkan
            return true;
        } else {
            // Data gagal ditambahkan
            return false;
        }
    }

    function tambah_data_bank($kode_bank, $nama_bank, $foto_bank) {
        // Lakukan validasi atau pemeriksaan lain jika diperlukan
        // ...
    
        // Tambahkan tanda kutip pada variabel yang di-bind ke query
        $query = "INSERT INTO pembayaran (kode_bank, nama_bank, foto) VALUES ('$kode_bank', '$nama_bank', '$foto_bank')";
    
        $result = mysqli_query($this->koneksi, $query);
    
        if ($result) {
            // Data berhasil ditambahkan
            return true;
        } else {
            // Data gagal ditambahkan
            return false;
        }
    }
    
    function tambah_data_ulasan($username, $nama_client, $jenis_kelamin, $ulasan) {
        // Lakukan validasi atau pemeriksaan lain jika diperlukan
        // ...
        
        $query = "INSERT INTO data_ulasan (username, nama_client, jenis_kelamin, ulasan) VALUES ('$username', '$nama_client', '$jenis_kelamin', '$ulasan')";

        $result = mysqli_query($this->koneksi, $query);

        if ($result) {
            // Data berhasil ditambahkan
            return true;
        } else {
            // Data gagal ditambahkan
            return false;
        }
    }
    function edit_data_admin($id) {
        $query = "SELECT * FROM user WHERE id = '$id'";
        $result = mysqli_query($this->koneksi, $query);

        if ($result) {
            return mysqli_fetch_assoc($result);
        } else {
            return false;
        }
    }
    function simpan_edit_data_admin($id, $foto_admin) {
        // Lakukan validasi atau pemeriksaan lain jika diperlukan
        // ...

        // Perbarui data di tabel admin
        $query = "UPDATE user SET 
                    foto = '$foto_admin' 
                    WHERE id = '$id'";

        $result = mysqli_query($this->koneksi, $query);

        if ($result) {
            // Data berhasil diupdate
            return true;
        } else {
            // Gagal mengupdate data
            return false;
        }
    }
    function tambah_data_client($kode_client, $nama_client, $jenis_kelamin, $tanggal_lahir, $alamat, $pekerjaan, $foto_client)
    {
        mysqli_query($this->koneksi, "INSERT INTO data_client (kode_client, nama_client, jenis_kelamin, tanggal_lahir, alamat, pekerjaan, foto) VALUES ('$kode_client', '$nama_client', '$jenis_kelamin', '$tanggal_lahir', '$alamat', '$pekerjaan', '$foto_client')");
        
        $ambil_id = mysqli_query($this->koneksi, "SELECT id FROM data_client ORDER BY id DESC LIMIT 1");
        $row_id = mysqli_fetch_array($ambil_id);
        $hasil_id = $row_id['id'];
        
        mysqli_query($this->koneksi, "INSERT INTO user (id, username, password, akses_id, data_client_id) VALUES ('', '$kode_client', '$kode_client', '2', '$hasil_id')");
    }
    
    function tambah_pembelian($kode_rumah, $kode_client, $kode_bank, $harga_rumah, $kode_pekerja) {
        $tanggal_buat = date('Y-m-d');
        $tanggal_selesai = date('Y-m-d', time() + (60 * 60 * 24 * 7));
        $result = mysqli_query($this->koneksi, "INSERT INTO pembelian VALUES ('', '$kode_rumah', '$kode_client', '$kode_bank','$harga_rumah', '$kode_pekerja','$tanggal_buat', '$tanggal_selesai', '1')");

        if ($result) {
            echo "Data berhasil disimpan.";
        } else {
            echo "Error: " . mysqli_error($this->koneksi);
        }
    }
        
    
    function kode_client($kode_client)
    {
        $data_client = mysqli_query($this->koneksi, "SELECT a.*, b.* FROM data_client a INNER JOIN jenis_kelamin b ON b.kode_jk = a.jenis_kelamin WHERE a.kode_client='$kode_client'");

        while ($row_peminjam = mysqli_fetch_assoc($data_client)) {
            $hasil_peminjam[] = $row_peminjam;
        }
        return $hasil_peminjam;
    }
    function edit_data_user($kode_client, $nama_client, $jenis_client, $tanggal_client, $alamat, $pekerjaan, $foto)
    {
        mysqli_query(
            $this->koneksi,
            "UPDATE data_peminjam SET 
        nama_client = '$nama_client', 
        jenis_client = '$jenis_client', 
        tanggal_client = '$tanggal_client',
        alamat = '$alamat', 
        pekerjaan = '$pekerjaan', 
        foto = '$foto' 
        WHERE kode_client = '$kode_client'"
        );
    }
    function simpan_edit_data_client($kode_client, $nama_client, $jenis_kelamin, $tanggal_lahir, $alamat, $pekerjaan, $foto_client)
    {
        

        // Perbarui data di tabel data_client
        $query = "UPDATE data_client SET 
                    nama_client = '$nama_client', 
                    jenis_kelamin = '$jenis_kelamin', 
                    tanggal_lahir = '$tanggal_lahir', 
                    alamat = '$alamat', 
                    pekerjaan = '$pekerjaan', 
                    foto = '$foto_client' 
                    WHERE kode_client = '$kode_client'";

        $result = mysqli_query($this->koneksi, $query);

        if ($result) {
            // Data berhasil diupdate
            return true;
        } else {
            // Gagal mengupdate data
            return false;
        }
    }
    function hapus_data_client($kode_client) {
        mysqli_query($this->koneksi, "DELETE FROM data_client WHERE kode_client = '$kode_client'");
    }
    function hapus_data_admin($id) {
        mysqli_query($this->koneksi, "DELETE FROM user WHERE id = '$id'");

    }

    function hapus_data_bank($kode_bank) {
        mysqli_query($this->koneksi, "DELETE FROM pembayaran WHERE kode_bank = '$kode_bank'");
    }

    function hapus_data_ulasan($username) {
        mysqli_query($this->koneksi, "DELETE FROM data_ulasan WHERE username = '$username'");
    }
    function hapus_data_property($kode_rumah) {
        mysqli_query($this->koneksi, "DELETE FROM tipe_rumah WHERE kode_rumah = '$kode_rumah'");
    }
    
    function hapus_data_proyek($kode_rumah) {
        mysqli_query($this->koneksi, "DELETE FROM pembelian WHERE kode_rumah = '$kode_rumah'");
    }
   
    function tampil_pembelian(){
        $hasil = array();
        $data = mysqli_query($this->koneksi, "SELECT a.*, b.*, c.*, d.*, e.* from pembelian a
        INNER JOIN tipe_rumah b ON b.kode_rumah= a.kode_rumah
        INNER JOIN pembayaran c ON c.kode_bank  = a.kode_bank 
        INNER JOIN data_pekerja d ON d.kode_pekerja = a.kode_pekerja
        INNER JOIN data_client e ON e.kode_client = a.kode_client
        ");
        
        while($row = mysqli_fetch_array($data)){
            $hasil[] = $row;
        }
        return $hasil;
    }
    
    function tampil_pembeli_pembeli($username)
    {
        $data = mysqli_query($this->koneksi, "SELECT a.*, b.*, c.*, d.*, e.* FROM pembelian a
             INNER JOIN tipe_rumah b ON b.kode_rumah= a.kode_rumah
        INNER JOIN pembayaran c ON c.kode_bank  = a.kode_bank 
        INNER JOIN data_pekerja d ON d.kode_pekerja = a.kode_pekerja
        INNER JOIN data_client e ON e.kode_client = a.kode_client
            WHERE a.kode_client = '$username'");
    
        $hasil = [];
    
        while ($row = mysqli_fetch_array($data)) {
            $hasil[] = $row;
        }
    
        return $hasil;
    }
    
    function ambil_data_rumah(){
        $tipe_rumah = mysqli_query($this->koneksi, "SELECT * from tipe_rumah");
        while($row_tipe_rumah = mysqli_fetch_array($tipe_rumah)){
            $hasil_tipe_rumah[] = $row_tipe_rumah;
        }
        return $hasil_tipe_rumah;
    }
    function ambil_data_pembayaran(){
        $pembayaran = mysqli_query($this->koneksi, "SELECT * from pembayaran");
        while($row_pembayaran = mysqli_fetch_array($pembayaran)){
            $hasil_pembayaran[] = $row_pembayaran;
        }
        return $hasil_pembayaran;
    }
    function ambil_data_mandor(){
        $data_pekerja = mysqli_query($this->koneksi, "SELECT * from data_pekerja");
        while($row_data_pekerja = mysqli_fetch_array($data_pekerja)){
            $hasil_data_pekerja[] = $row_data_pekerja;
        }
        return $hasil_data_pekerja;
    }
    function ambil_data_client(){
        $data_client = mysqli_query($this->koneksi, "SELECT * from data_client");
        while($row_data_client = mysqli_fetch_array($data_client)){
            $hasil_data_client[] = $row_data_client;
        }
        return $hasil_data_client;
    }

    function hitung_jumlah_data_client() {
        $result = mysqli_query($this->koneksi, "SELECT COUNT(*) as total FROM data_client");
        $row = mysqli_fetch_assoc($result);

        return $row['total'];
    }

    function hitung_jumlah_proyek() {
        $result = mysqli_query($this->koneksi, "SELECT COUNT(*) as total FROM pembelian");
        $row = mysqli_fetch_assoc($result);

        return $row['total'];
    }

    function hitung_jumlah_ulasan() {
        $result = mysqli_query($this->koneksi, "SELECT COUNT(*) as total FROM data_ulasan");
        $row = mysqli_fetch_assoc($result);

        return $row['total'];
    }
    function hitung_jumlah_data_property() {
        $result = mysqli_query($this->koneksi, "SELECT COUNT(*) as total FROM tipe_rumah");
        $row = mysqli_fetch_assoc($result);

        return $row['total'];
    }
}    
?>