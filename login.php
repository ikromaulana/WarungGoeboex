<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Warung Goeboex</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="w-full h-screen bg-cover" style="background-image: url(asset/bg.jpg);">
        <!-- Navbar -->
        <nav class="max-w-full h-16 bg-purple-900 flex items-center justify-center"><a href=""><img src="asset/logo.png" alt="" class="w-56"></a>
        </nav>
        <!-- End-navbar -->

        <!-- Content -->
         <div class="max-w-lg rounded-xl mx-auto shadow-xl p-5 mt-28 backdrop-blur-md">
        <h3 class="text-xl font-bold mx-auto text-center mb-5 text-purple-900">Selamat datang</h3>
        <form action="" method="post">
        <label for="nama">
            <span class="block font-semibold mb-1 -mt-3">Nama Lengkap</span>
            <input type="text" name="nama" placeholder="Masukkan Nama Lengkap" class="px-3 py-2 border shadow rounded-lg w-full text-sm block focus:ring focus:outline-none focus:ring-purple-900 hover:bg-slate-200 mb-5">
            </label>

        <label for="password">
        <span class="block font-semibold mb-1 -mt-3">Password</span>
        <input type="password" name="password" placeholder="Masukkan Password" class="px-3 py-2 border shadow rounded-lg w-full text-sm block focus:ring focus:outline-none focus:ring-purple-900 hover:bg-slate-200">
        </label>
        <p class="py-2 font-semibold">Belum punya akun? <a href="register.php" class="font-bold text-purple-900">daftar</a></p>
        <button class="my-5 px-5 py-2 rounded-xl bg-purple-900 text-white shadow-lg hover:bg-purple-600 block mx-auto hover:transition" id="login" name="login">Masuk</button>
        </form>
</div>
    </div>
    <?php
include 'koneksi.php';
session_start();
if(isset($_POST['login'])){
    // kalo btn login diklik
    $nama=$_POST['nama'];
    $password=$_POST['password'];


    // check database
    $cekdb = mysqli_query($koneksi,"SELECT * FROM dbcustomer where nama='$nama'");
    $hitung = mysqli_num_rows($cekdb);
    $pw = mysqli_fetch_array($cekdb);
    $pwnow = $pw['password'];

    if($hitung>0){
        $_SESSION['nama'] = $nama;
        $_SESSION['status'] = "login";
        // kalo berhasil
        // Verifikasi password
        if(password_verify($password,$pwnow)){
        // Kalo password benar = direct page home
        header('location:home.php');
        }else{
        // kalo pass salah : muncul alert
        echo'<script>alert("Password Salah!");
        window.location.href="login.php";</script>';
        }

    }
    else{
        // kalo gagal muncul peringatan dan tetap di page register
        echo'<script>alert("Login Failed!");
        window.location.href="register.php";</script>';
    }
}
?>
</body>
</html>