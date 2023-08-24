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

<nav class="navbar">
        <div class="max-w-full h-16 bg-purple-900 flex items-center justify-between px-14">
            <div class=""><a href=""><img src="asset/logo.png" alt="" class="w-56"></a></div>
            <div class="flex justify-between w-20">
                <a href="customer/profilecust.php" class="text-white"><i data-feather="user"></i></a>
                <a href="logout.php" class="text-white"><i data-feather="log-out"></i></a>
            </div>
        </div>
    </nav>
    <div class="container max-w-2xl bg-red-500 mx-auto mt-3 text-center border rounded-lg flex">
    </div>
    <form action="" method="post">
    <table class="table-auto border-collapse border border-slate-500 mx-auto mt-5 bg-purple-400">
        <thead>
            <tr class="bg-purple-900 text-white">
                <th class="border border-slate-600 p-2">Nama Menu</th>
                <th class="border border-slate-600 p-2">Harga</th>
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
                </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
            <td class="border border-slate-700 p-2 font-bold" colspan="1">Total</td>
                <td class="border border-slate-700 p-2 text-center" id="total-quantity"><?php echo $total; ?></td>
            </tr>
        </tfoot>
    </table>
    
    <script>
        feather.replace();
    </script>
</body>
</html>
