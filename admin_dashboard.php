<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Transaksi</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>

    <!-- Navbar -->
    <!-- Navbar code here -->
    <!-- End-navbar -->

    <h1 class="text-3xl font-semibold mb-4">Data Transaksi</h1>

    <table class="table-auto border-collapse border border-slate-500 mx-auto bg-purple-400">
        <thead>
            <tr class="bg-purple-900 text-white">
                <th class="border border-slate-600 p-2">Nama Customer</th>
                <th class="border border-slate-600 p-2">Nama Menu</th>
                <th class="border border-slate-600 p-2">Harga</th>
                <th class="border border-slate-600 p-2">Qty</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "koneksi.php";
            $query = "SELECT t.*, c.nama AS nama_customer FROM dbtransaksi t
                      INNER JOIN dbcustomer c ON t.id_customer = c.id";
            $result = mysqli_query($koneksi, $query);

            while ($data = mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <td class="border border-slate-700 p-2"><?php echo $data['nama_customer']; ?></td>
                    <td class="border border-slate-700 p-2"><?php echo $data['nama_menu']; ?></td>
                    <td class="border border-slate-700 p-2 text-center"><?php echo $data['harga_menu']; ?></td>
                    <td class="border border-slate-700 p-2 text-center"><?php echo $data['qty']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>
</html>
