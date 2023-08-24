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
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 50vh;
        }
        .navbar {
            width: 100%;
            background-color: #6B46C1;
            padding: 10px 0;
        }
        .container {
            text-align: center;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .menu-links {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }
        .menu-links a {
            background-color: #3B82F6;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>

    <nav class="navbar">
        <div class="max-w-full h-16 bg-purple-900 flex items-center justify-between px-14">
            <div class=""><a href=""><img src="asset/logo.png" alt="" class="w-56"></a></div>
            <div class="flex justify-between w-36">
                <a href="" class="text-white"><i data-feather="shopping-cart"></i></a>
                <a href="customer/profilecust.php" class="text-white"><i data-feather="user"></i></a>
                <a href="logout.php" class="text-white"><i data-feather="log-out"></i></a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto mt-8 px-8">
        <h1 class="text-3xl font-semibold mb-4">Admin Dashboard</h1>
        <h2>Halo, <span class="font-semibold"><?php echo $_SESSION['nama']; ?></span></h2>
        <div class="menu-links">
            <a href="edit_customer.php">Edit Customer Data</a>
            <a href="edit_admin.php">Edit Admin Data</a>
            <a href="input_menu.php">Input Menu</a>
            <a href="view_transactions.php">View Transactions</a>
        </div>
    </div>

</body>
</html>

