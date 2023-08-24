<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
<nav class="navbar">
    <div class="max-w-full h-16 bg-purple-900 flex items-center justify-between px-14">
        <div class=""><a href="admin_dashboard.php"><img src="asset/logo.png" alt="" class="w-56"></a></div>
        <div class="flex justify-evenly w-36">
            <a href="edit_admin.php" class="text-white"><i data-feather="user"></i></a>
            <a href="logoutadmin.php" class="text-white"><i data-feather="log-out"></i></a>
        </div>
    </div>
</nav>
<?php
include "koneksi.php";
if(isset($_POST['input'])){
$namafolder="asset/"; //tempat menyimpan file

if (!empty($_FILES["nama_file"]["tmp_name"]))
{
	$jenis_gambar=$_FILES['nama_file']['type'];
        $id       = $_POST['id'];
		$nama_menu  = $_POST['nama_menu'];
        $harga      = $_POST['harga'];
        
		
	if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
	{			
		$gambar = $namafolder . basename($_FILES['nama_file']['name']);		
		if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
			$sql="INSERT INTO dbmenu(id,nama_menu,harga,gambar) VALUES
            ('$id','$nama_menu','$harga','$gambar')";
			$res=mysqli_query($koneksi, $sql) or die (mysqli_error());
			//echo "Gambar berhasil dikirim ke direktori".$gambar;
            echo "<script>alert('Data Produk berhasil dimasukan!'); window.location = 'input_menu.php'</script>";	   
		} else {
		   echo "<p>Gambar gagal dikirim</p>";
		}
   } else {
		echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
   }
} else {
	echo "Anda belum memilih gambar";
}
}


			?>
            <div class="max-w-lg rounded-xl mx-auto shadow-xl p-5 mt-8 bg-purple-200">
            <form action="input_menu.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
            <label for="id">
            <span class="block font-semibold mb-1 -mt-3">Id Produk</span>
            <input type="text" name="id" placeholder="Otomatis Terisi" autocomplete="off" readonly="readonly" class="px-3 py-2 border shadow rounded-lg w-full text-sm block focus:ring focus:outline-none focus:ring-purple-900 hover:bg-slate-200 mb-10"/>
            </label>

            <label for="nama_menu">
            <span class="block font-semibold mb-1 -mt-3">Nama Menu</span>
            <input type="text" name="nama_menu" id="nama_menu" placeholder="Masukkan Nama Menu" autocomplete="off" class="px-3 py-2 border shadow rounded-lg w-full text-sm block focus:ring focus:outline-none focus:ring-purple-900 hover:bg-slate-200 mb-10"/>
            </label>

            <label for="harga">
            <span class="block font-semibold mb-1 -mt-3">Harga</span>
            <input type="text" name="harga" id="harga" placeholder="Masukkan Harga Menu" autocomplete="off" class="px-3 py-2 border shadow rounded-lg w-full text-sm block focus:ring focus:outline-none focus:ring-purple-900 hover:bg-slate-200 mb-10"/>

            <label for="foto">
            <span class="block font-semibold mb-1 -mt-3">Foto Produk</span>
            <input type="file" name="nama_file" id="nama_file" class="px-3 py-2 border shadow rounded-lg w-full text-sm block focus:ring focus:outline-none focus:ring-purple-900 hover:bg-slate-200 mb-10"/>

            
            </label>
       
            <button class="px-5 py-2 bg-purple-900 hover:bg-purple-600 transition rounded-xl shadow-lg text-white block mx-auto" name="input" id="proses">Simpan</button>
            </form>
            </div>

            <script>
      feather.replace();
    </script>
</body>
</html>