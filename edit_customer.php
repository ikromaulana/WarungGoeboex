<?php
include "koneksi.php"; // Include your database connection

// Initialize variables
$errors = [];

// Handle POST request for updating customer data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_customer = $_POST['id_customer'];
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];

    // Validation
    if (empty($nama)) {
        $errors[] = "Nama is required";
    }
    // Add more validation rules here

    // If there are no errors, update data
    if (empty($errors)) {
        $query = "UPDATE dbcustomer SET nama=?, no_hp=?, alamat=?, email=? WHERE id_customer=?";
        $stmt = mysqli_prepare($koneksi, $query);
        mysqli_stmt_bind_param($stmt, "ssssi", $nama, $no_hp, $alamat, $email, $id_customer);
        
        if (mysqli_stmt_execute($stmt)) {
            // Redirect or display a success message
            header("Location: edit_customer.php?id=$id_customer&success=1");
            exit();
        } else {
            // Handle database update error
            $errors[] = "Error updating data: " . mysqli_error($koneksi);
        }
    }
}

// Fetch the list of customers
$query = "SELECT * FROM dbcustomer";
$result = mysqli_query($koneksi, $query);

// Check for success or error
if (!$result) {
    echo "Error fetching customer data: " . mysqli_error($koneksi);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer Data</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body class="bg-gray-100">

<nav class="navbar">
    <div class="max-w-full h-16 bg-purple-900 flex items-center justify-between px-14">
        <div class=""><a href="admin_dashboard.php"><img src="asset/logo.png" alt="" class="w-56"></a></div>
        <div class="flex justify-evenly w-36">
            <a href="edit_admin.php" class="text-white"><i data-feather="user"></i></a>
            <a href="logoutadmin.php" class="text-white"><i data-feather="log-out"></i></a>
        </div>
    </div>
</nav>


    <!-- Display the list of customers in a table with no lines -->
    <div class="container max-w-xs bg-purple-900 px-3 py-4 text-center rounded-lg mx-auto mt-5 font-bold text-white text-lg"><h1>Edit Data Customer</h1></div>
    <?php if (!empty($errors)): ?>
        <div class="error">
            <?php foreach ($errors as $error): ?>
                <p><?php echo $error; ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <table class="mx-auto mt-5 bg-purple-400">
                <thead>
                <tr>
                <th class="bg-purple-900 text-white border border-slate-600 p-2">ID</th>
                <th class="bg-purple-900 text-white border border-slate-600 p-2">Nama</th>
                <th class="bg-purple-900 text-white border border-slate-600 p-2">No. Handphone</th>
                <th class="bg-purple-900 text-white border border-slate-600 p-2">Alamat</th>
                <th class="bg-purple-900 text-white border border-slate-600 p-2">Email</th>
                <th class="bg-purple-900 text-white border border-slate-600 p-2">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td class="border border-slate-700 p-2"><?php echo $row['id_customer']; ?></td>
                    <td class="border border-slate-700 p-2 text-center"><?php echo $row['nama']; ?></td>
                    <td class="border border-slate-700 p-2 text-center"><?php echo $row['no_hp']; ?></td>
                    <td class="border border-slate-700 p-2 text-center"><?php echo $row['alamat']; ?></td>
                    <td class="border border-slate-700 p-2 text-center"><?php echo $row['email']; ?></td>
                    <td class="border border-slate-700 p-2 text-center"><button class="px-3 py-2 bg-purple-900 hover:bg-purple-700 text-white rounded-lg" name="proses" id="proses">
                    <a href="customer/profilecust.php?id=<?php echo $row['id_customer']; ?>">Edit</a>
                </tr>
                <?php endwhile; ?>
                </tbody>
            
        
        </table>
            
</div>

<script>
    feather.replace();
</script>

</body>
</html>



