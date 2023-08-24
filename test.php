<?php
include "koneksi.php";
$no=1;
$ambildata=mysqli_query($koneksi,"select * from dbmenu");
while($tampil=mysqli_fetch_array($ambildata)){
    echo"
    <tr>
    <td>$no</td>
    <td>$tampil[nama_menu]</td>
    <td>$tampil[harga_menu]</td>
    </tr>";
    $no++;
}
?>
  <?php
  include "koneksi.php"; 
                    $sql = mysqli_query($koneksi, "SELECT * FROM dbtransaksi");
                    while($data = mysqli_fetch_array($sql)){
                    ?>
    <td class="border border-slate-700 p-2"><?php echo $data['nama_menu']; ?></td>
    <td class="border border-slate-700 p-2 text-center"><?php echo $data['harga_menu']; ?></td>
    <?php   
              }?>