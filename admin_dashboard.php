<!-- Session Name -->
<?php
include "koneksi.php"; 
	session_start();
	$nama=$_SESSION['nama'];
    $query="SELECT * FROM dbadmin WHERE nama='$nama'";
    $result=mysqli_query($koneksi,$query);
	?>
    <!-- End Session Name -->

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Transaksi</title>
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
    <div class="text-center mt-8 mx-auto">
    <h1 class="text-3xl font-semibold mb-4">Admin Dashboard</h1>
    <h2>Halo, <span class="font-semibold"><?php echo $_SESSION['nama']; ?></span></h2>
    </div>
    <div class="container text-center mx-auto mt-8 px-8">
        <div class="menu-links">
            <button class="px-4 py-3 bg-purple-900 rounded-xl text-white shadow-lg hover:bg-purple-700"><a href="edit_customer.php">Edit Customer Data</a></button>
            <button class="px-4 py-3 bg-purple-900 rounded-xl text-white shadow-lg hover:bg-purple-700"><a href="edit_admin.php">Edit Admin Data</a></button>
            <button class="px-4 py-3 bg-purple-900 rounded-xl text-white shadow-lg hover:bg-purple-700"><a href="input_menu.php">Input Menu</a></button>
            <button class="px-4 py-3 bg-purple-900 rounded-xl text-white shadow-lg hover:bg-purple-700"><a href="view_transactions.php">View Transactions</a></button>
        </div>
    </div>

</body>
</html>