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
<?php
include "header.php";?>
    <!-- Navbar -->
    <!-- Navbar code here -->
    <!-- End-navbar -->
    <form action="" method="post">
        <h1 class="font-bold text-xl text-center mt-20">Keranjang Belanja</h1>
    <table class="table-auto border-collapse border border-slate-500 mx-auto mt-5 bg-purple-400">
        <thead>
            <tr class="bg-purple-900 text-white">
                <th class="border border-slate-600 p-2">Nama Menu</th>
                <th class="border border-slate-600 p-2">Harga</th>
                <th class="border border-slate-600 p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "koneksi.php";
            $sql = mysqli_query($koneksi, "SELECT * FROM dbtransaksi");
            $total = 0;

            while ($data = mysqli_fetch_array($sql)) {
                $total += $data["harga_menu"];
                ?>
                <tr>
                    <td class="border border-slate-700 p-2"><?php echo $data['nama_menu']; ?></td>
                    <td class="border border-slate-700 p-2 text-center"><?php echo $data['harga_menu']; ?></td>
                    <td class="border border-slate-700 p-2 text-center"><button class="px-3 py-2 bg-red-500 hover:bg-red-700 text-white rounded-lg" name="proses" id="proses"><a name="proses" id="proses" href="delete.php?id=<?php echo $data['id'];?>"><i data-feather="trash-2"></i></a></button></td>
                </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <td class="border border-slate-700 p-2 font-bold" colspan="2">Total</td>
                <td class="border border-slate-700 p-2 text-center" id="total-quantity"><?php echo $total; ?></td>
            </tr>
        </tfoot>
    </table>
    
    <script>
        feather.replace();
    </script>
</body>
</html>