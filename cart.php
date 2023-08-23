   <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>

    <!-- Navbar -->
    <nav class="max-w-full h-16 bg-purple-900 flex items-center justify-between px-14">
        <div class=""><a href="home.php"><img src="asset/logo.png" alt="" class="w-56"></a></div>
        <div class="flex justify-between w-36">
        <a href="" class="text-white"><i data-feather="shopping-cart"></i></a>
        <a href="customer/profilecust.php" class="text-white"><i data-feather="user"></i></a>
        <a href="logout.php" class="text-white"><i data-feather="log-out"></i></a>
        </div>
    </nav>
    <!-- End-navbar -->

    <table class="table-auto border-collapse border border-slate-500 mx-auto mt-10 bg-purple-400">
  <thead>
    <tr class="bg-purple-900 text-white">
      <th class="border border-slate-600 p-2">Nama Menu</th>
      <th class="border border-slate-600 p-2">Harga</th>
    </tr>
  </thead>
  <tbody>
  <tr>
  <?php
  include "koneksi.php"; 
  $no=1;
                    $sql = mysqli_query($koneksi, "SELECT * FROM dbtransaksi");
                    
                    while($data = mysqli_fetch_array($sql)){
                    ?>
    <td class="border border-slate-700 p-2"><?php echo $data['nama_menu']; ?></td>
    <td class="border border-slate-700 p-2 text-center"><?php echo $data['harga_menu']; ?></td>
    <?php   
              $no++;}?>
  </tr>
  </tbody>
</table>


    <script>
      feather.replace();
    </script>
</body>
</html>