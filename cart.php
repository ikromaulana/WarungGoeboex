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
    <div class="container max-w-2xl bg-red-500 mx-auto mt-3 text-center border rounded-lg flex">
        <div class="container h-full w-14 px-3 py-4 bg-red-700 flex justify-center rounded-l-lg text-white"><i data-feather="alert-circle"></i></div>
        <p class="font-semibold text-white ml-9 mt-4">Pastikan alamat dan kontak sesuai untuk memudahkan proses delivery!</p>
    </div>
    <div class="container max-w-xs bg-purple-900 px-3 py-4 text-center rounded-lg mx-auto mt-5 font-bold text-white text-lg"><h1>Keranjang Belanja</h1></div>
    <form action="" method="post">
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
            <td class="border border-slate-700 p-2 font-bold" colspan="2">Metode Pembayaran</td>
            <td colspan="2"><select name="mp" id="mp">
                <option value="volvo">Tunai</option>
                <option value="saab">M-Banking</option>
                <option value="mercedes">Ovo</option></td>
</select>
            </tr>
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