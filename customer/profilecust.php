<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Customer</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
<?php include "header.php"; ?>

<?php
include "koneksi.php"; 
	session_start();
	$nama=$_SESSION['nama'];
    $query="SELECT * FROM dbcustomer WHERE nama='$nama'";
    $result=mysqli_query($koneksi,$query);
	?>
    <?php
    if(mysqli_num_rows($result)>0){
        $datauser=mysqli_fetch_array($result);
        $_SESSION["id_customer"]=$datauser["id_customer"];
        $_SESSION["nama"]=$datauser["nama"];
        $_SESSION["no_hp"]=$datauser["no_hp"];
        $_SESSION["alamat"]=$datauser["alamat"];
        $_SESSION["email"]=$datauser["email"];
    }
    ?>
<div class="container max-w-xs bg-purple-900 px-3 py-4 text-center rounded-lg mx-auto mt-5 font-bold text-white text-lg shadow-lg"><h1>Profile Customer</h1></div>
<table class="mx-auto mt-5 bg-purple-400">
  <thead>
    <tr class="">
      <th class="bg-purple-900 text-white border border-slate-600 p-2">Id</th>
      <td class="border border-slate-700 p-2"><?php echo $_SESSION['id_customer']; ?></td>
    </tr>
    <tr class="">
      <th class="bg-purple-900 text-white border border-slate-600 p-2">Nama</th>
      <td class="border border-slate-700 p-2"><?php echo $_SESSION['nama']; ?></td>
    </tr>
    <tr>
    <th class="bg-purple-900 text-white border border-slate-600 p-2">No. Handphone</th>
    <td class="border border-slate-700 p-2"><?php echo $_SESSION['no_hp']; ?></td>
    </tr>
    <tr>
    <th class="bg-purple-900 text-white border border-slate-600">Alamat</th>
    <td class="border border-slate-700 p-2"><?php echo $_SESSION['alamat']; ?></td>
    </tr>
    <tr>
    <th class="bg-purple-900 text-white border border-slate-600">Email</th>
    <td class="border border-slate-700 p-2"><?php echo $_SESSION['email']; ?></td>
    </tr>
  </thead>
</table>
<div class="flex justify-center mt-3"> <a href="../updatedatacust.php" class="px-5 py-2 bg-purple-900 hover:bg-purple-600 transition rounded-xl shadow-lg text-white">Edit</a>
</div>



<script>
      feather.replace();
    </script>
</body>