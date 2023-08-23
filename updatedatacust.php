<title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <?php include "header.php"; ?>
    
    <?php
include "koneksi.php"; 
	session_start();
	$id_customer=$_SESSION['id_customer'];
    $query="SELECT * FROM dbcustomer WHERE id_customer='$id_customer'";
    $result=mysqli_query($koneksi,$query);
	?>

    <div class="max-w-lg rounded-xl mx-auto shadow-xl p-5 mt-8 backdrop-blur-md">
        <h3 class="text-xl font-bold mx-auto text-center mb-5 text-purple-900">Daftar dulu yuk!</h3>
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

        <input type="submit" value="Simpan" name="proses" id="proses" class="my-5 px-5 py-2 rounded-xl bg-purple-900 text-white shadow-lg hover:bg-purple-600 block mx-auto hover:transition -mb-0.5 -mt-0.5">
        </form>

        <?php
include "koneksi.php";
if(isset($_POST['proses'])){
    $nama=mysqli_real_escape_string($koneksi, $_POST['nama']);
    $no_hp=mysqli_real_escape_string($koneksi, $_POST['no_hp']);
    $alamat=mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $email=mysqli_real_escape_string($koneksi, $_POST['email']);
    $sql1="UPDATE dbcustomer SET nama='$nama', no_hp='$no_hp', alamat='$alamat', email='$email' WHERE id_customer='$id_customer';";
    if(mysqli_query($koneksi,$sql1)){
        echo'<script>alert("Data Profile Berhasil di Update");
        window.location.href="customer/profilecust.php";</script>';
    }else{
        echo "Error";
    }

}
?>
    <script>
      feather.replace();
    </script>