<?php
session_start();
if (empty($_SESSION['nama'])){
	header('location:home.php');	
} else {
	include "koneksi.php";
        
            //input po transit dan tampil ke tabel
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $sql = mysqli_query($koneksi, "SELECT * FROM dbmenu WHERE id='$id'");
             if(mysqli_num_rows($sql) == 0){
				echo "<script>window.location = 'javascript:history.back()'</script>";
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
                $id        = $row['id'];
                $nama_menu   = $row['nama_menu'];
                $harga_menu       = $row['harga_menu'];

                 
        
        // masukkan dalam tabel penjualan
        
        $nomor = date("YmdHis");
						$insert = mysqli_query($koneksi, "INSERT INTO dbtransaksi (id, nama_menu, harga_menu) VALUES ('$id', '$nama_menu', '$harga_menu');") or die(mysqli_error());
                        
                        echo "<script>alert('Produk ditambahkan ke keranjang!'); window.location = 'javascript:history.back()'</script>";
                    
			} 
   		
} 
            ?>