    <!-- Session Name -->
    <?php
include "koneksi.php"; 
	session_start();
	$nama=$_SESSION['nama'];
    $query="SELECT * FROM dbcustomer WHERE nama='$nama'";
    $result=mysqli_query($koneksi,$query);
	?>
    <!-- End Session Name -->
    
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
        <div class=""><a href=""><img src="asset/logo.png" alt="" class="w-56"></a></div>
        <div class="flex justify-between w-36">
        <a href="cart.php" class="text-white"><i data-feather="shopping-cart"></i></a>
        <a href="customer/profilecust.php" class="text-white"><i data-feather="user"></i></a>
        <a href="logout.php" class="text-white"><i data-feather="log-out"></i></a>
        </div>
    
    </nav>
    <!-- End-navbar -->

    <!-- Hello Card -->
    <div class="container shadow-lg border rounded-lg max-w-lg h-20 mx-auto mt-10 flex items-center justify-center">
    <p class="">Halo, <span class="font-semibold"><?php echo $_SESSION['nama']; ?></span>. Mau makan apa hari ini?</p>
    </div>
    <!-- End Hello Card -->

    <!-- Menu -->
    <form action="checkbox_process.php" method="get">
    
    <div class="max-w-5xl mx-auto border rounded-lg shadow-lg p-5 mt-10 columns-3 mb-10">
        <div class="w-52 h-52 bg-cover mx-auto">
            <center>
            <?php
                    $sql = mysqli_query($koneksi, "SELECT * FROM dbmenu ORDER BY id DESC limit 6");
                    while($data = mysqli_fetch_array($sql)){
                    ?>
                    <div class=""><img src="<?php echo $data['gambar']; ?>" alt=""></div>
                    <div class="">
                <h3 class=""><?php echo $data['nama_menu']; ?></h3>
                <p><?php echo $data['harga_menu']; ?></p>
                <!-- <input type="checkbox" name="jumlah" value="option"> Pilih -->
                
                <a href="addtocart.php?id=<?php echo $data['id'];?>" class="my-5 px-5 py-2 rounded-xl bg-purple-900 text-white shadow-lg hover:bg-purple-600 block mx-auto hover:transition transition -mt-0.5">Beli &raquo;</a>
                <?php   
              }?>
                    </div>
                    
            </center>
            

            
            
        </div>
        
    </div>

    <!--  -->

    
    </form>
        
    <!-- end menu -->

    <script>
      feather.replace();
    </script>

<?php
    if(mysqli_num_rows($result)>0){
        $datauser=mysqli_fetch_array($result);
        $_SESSION["nama"]=$datauser["nama"];
    }
    ?>
    <?php
include "koneksi.php";
if(isset($_POST['proses'])){
    mysqli_query($koneksi,"insert into dbtransaksi set
    nama_menu = '$_POST[nama_menu]',
    jumlah_item = '$_POST[jumlah_item]',
    harga_menu = '$_POST[harga_menu]',");
    echo'<script>alert("Data Transaksi Berhasil Tersimpan");
        window.location.href="datatransaksi.php";</script>';
}
?>

</body>
</html>