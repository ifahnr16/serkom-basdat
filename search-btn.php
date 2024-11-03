<?php
// Informasi koneksi database
$servername = "localhost";
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "sakit"; // Ganti dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mendapatkan nama kolom dan data dari tabel
$sql = "SELECT * FROM gejala"; // Ganti dengan nama tabel Anda
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Mendapatkan nama kolom
    $fields = $result->fetch_fields();

    // Menampilkan tabel HTML
    echo "<table border='1'>";
    echo "<thead>";
    echo "<tr>";
    
    // Menampilkan nama kolom
    foreach ($fields as $field) {
        echo "<th>" . $field->name . "</th>";
    }
    
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    
    // Menggunakan while loop untuk menampilkan data
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($fields as $field) {
            echo "<td>" . $row[$field->name] . "</td>";
        }
        echo "</tr>";
    }
    
    echo "</tbody>";
    echo "</table>";
} else {
    echo "0 results";
}

// Menutup koneksi
$conn->close();
?>
