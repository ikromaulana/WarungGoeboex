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
<?php include "header.php"; ?>

<?php
include "koneksi.php"; 
	session_start();
	$id_customer=$_SESSION['id_customer'];
    $query="SELECT * FROM dbcustomer WHERE id_customer='$id_customer'";
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

<table class="table-auto border-collapse border border-slate-500 mx-auto mt-10 bg-purple-400">
  <thead>
    <tr class="bg-purple-900 text-white">
      <th class="border border-slate-600 p-2">Id</th>
      <th class="border border-slate-600 p-2">Nama</th>
      <th class="border border-slate-600 p-2">No. Handphone</th>
      <th class="border border-slate-600">Alamat</th>
      <th class="border border-slate-600">Email</th>
    </tr>
  </thead>
  <tbody>
  <tr>
  <td class="border border-slate-700 p-2"><?php echo $_SESSION['id_customer']; ?></td>
    <td class="border border-slate-700 p-2"><?php echo $_SESSION['nama']; ?></td>
    <td class="border border-slate-700 p-2 text-center"><?php echo $_SESSION['no_hp']; ?></td>
    <td class="border border-slate-700 p-2"><?php echo $_SESSION['alamat']; ?></td>
    <td class="border border-slate-700 p-2"><?php echo $_SESSION['email']; ?></td>
  </tr>
  </tbody>
</table>
<div class="flex justify-center mt-3"><button class="px-5 py-2 bg-purple-900 hover:bg-purple-600 transition rounded-xl shadow-lg text-white"><a href="../updatedatacust.php">Edit</a></button></div>



<script>
      feather.replace();
    </script>
</body>
</html>