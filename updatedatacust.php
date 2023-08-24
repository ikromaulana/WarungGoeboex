<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<?php include "header.php"; ?>

<?php
include "koneksi.php";
session_start();

// Check if user is logged in
if (!isset($_SESSION['nama'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

$nama = $_SESSION['nama'];
$query = "SELECT * FROM dbcustomer WHERE nama='$nama'";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) > 0) {
    $datauser = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission and update user data in the database
    $newNama = $_POST['nama']; // Capture new name
    $newNoHp = $_POST['no_hp'];
    $newAlamat = $_POST['alamat'];
    $newEmail = $_POST['email'];

    // Update query with new name
    $updateQuery = "UPDATE dbcustomer SET nama='$newNama', no_hp='$newNoHp', alamat='$newAlamat', email='$newEmail' WHERE nama='$nama'";
    mysqli_query($koneksi, $updateQuery);

    // Update the session variable with the new name
    $_SESSION['nama'] = $newNama;

    // Redirect to profile page with updated data
    header("Location: customer/profilecust.php");
    exit();
}
?>

<div class="container max-w-xs bg-purple-900 px-3 py-4 text-center rounded-lg mx-auto mt-5 font-bold text-white text-lg shadow-lg"><h1>Edit Profile Customer</h1></div>
    <div class="max-w-lg rounded-xl mx-auto shadow-xl p-5 mt-8 bg-purple-200 mb-10">
        <form action="" method="post">
        <label for="nama">
            <span class="block font-semibold mb-1 -mt-3">Nama Lengkap</span>
            <input type="text" name="nama" placeholder="Masukkan Nama Lengkap" class="px-3 py-2 border shadow rounded-lg w-full text-sm block focus:ring focus:outline-none focus:ring-purple-900 hover:bg-slate-200 mb-10">
            </label>

            <label for="no_hp">
                <span class="block font-semibold mb-1 -mt-3">No. Handphone</span>
                <input type="text" name="no_hp" placeholder="Masukkan No. HP Aktif" class="px-3 py-2 border shadow rounded-lg w-full text-sm block focus:ring focus:outline-none focus:ring-purple-900 hover:bg-slate-200 mb-6">
                </label>

                <label for="alamat">
                <span class="block font-semibold mb-1 -mt-3">Alamat</span>
                <input type="text" name="alamat" placeholder="Masukkan Alamat" class="px-3 py-2 border shadow rounded-lg w-full text-sm block focus:ring focus:outline-none focus:ring-purple-900 hover:bg-slate-200 mb-6">
                </label>

        <label for="email">
        <span class="block font-semibold mb-1 after:content-['*'] after:text-red-500 after:ml-1 ">Email</span>

        <input type="email" name="email" placeholder="Masukkan Email" class="px-3 py-2 border shadow rounded-lg w-full block text-sm focus:ring focus:outline-none focus:ring-purple-900 hover:bg-slate-200 invalid:focus:ring-pink-500 invalid:text-pink-500 peer">
        <p class="text-sm px-3 py-2 text-pink-500 invisible peer-invalid:visible">Email tidak valid</p>
        </label>

        <button class="px-5 py-2 bg-purple-900 hover:bg-purple-600 transition rounded-xl shadow-lg text-white block mx-auto" name="proses" id="proses">Simpan</button>
        </form>
        
</div>

</body>
</html>

    