
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RegisterAdm - Warung Goeboex</title>
    <script src="https://cdn.tailwindcss.com"></script>
    </head>
<body>
    <div class="w-full h-screen bg-cover" style="background-image: url(asset/bg.jpg);">
        <!-- Navbar -->
        <nav class="max-w-full h-16 bg-purple-900 flex items-center justify-center"><a href=""><img src="asset/logo.png" alt="" class="w-56"></a>
        </nav>
        <!-- End-navbar -->

        <!-- Content -->
         <div class="max-w-lg rounded-xl mx-auto shadow-xl p-5 mt-3 backdrop-blur-md">
        <h3 class="text-xl font-bold mx-auto text-center mb-5 text-purple-900">Daftar Admin</h3>
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
        <label for="password">
        <span class="block font-semibold mb-1 -mt-3">Password</span>
        <input type="password" name="password" placeholder="Masukkan Password" class="px-3 py-2 border shadow rounded-lg w-full text-sm block focus:ring focus:outline-none focus:ring-purple-900 hover:bg-slate-200">
        </label>
        <p class="py-2 font-semibold">Sudah punya akun? <a href="login.php" class="font-bold text-purple-900">Masuk</a></p>
        <!-- <button class="my-5 px-5 py-2 rounded-xl bg-purple-900 text-white shadow-lg hover:bg-purple-600 block mx-auto hover:transition -mb-0.5 -mt-0.5" value="Register" name="register" id="register">Daftar</button> -->
        <input type="submit" value="Daftar" name="register1" id="register1" class="my-5 px-5 py-2 rounded-xl bg-purple-900 text-white shadow-lg hover:bg-purple-600 block mx-auto hover:transition -mb-0.5 -mt-0.5">
        </form>
    </div>
    </div>
<?php
include 'koneksi.php';
if(isset($_POST['register1'])){
    // kalo btn register diklik
    $nama=$_POST['nama'];
    $no_hp=$_POST['no_hp'];
    $alamat=$_POST['alamat'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    $passenkrip=password_hash($password, PASSWORD_DEFAULT);

    // insert database
    $insert = mysqli_query($koneksi,"INSERT INTO dbadmin (nama,no_hp,alamat,email,password) values ('$nama','$no_hp','$alamat','$email','$passenkrip')");


    if($insert){
        // kalo berhasil langsung masuk ke page login
        header('location:loginadmin.php');
    }
    else{
        // kalo gagal muncul peringatan dan tetap di page register
        echo'<script>alert("Registration Failed!");
        window.location.href="registeradmin.php";</script>';
    }
}
?>
</body>
</html>