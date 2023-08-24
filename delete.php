<?php
session_start();
if (empty($_SESSION['id'])){
	header('location:home.php');	
} else {
	include "koneksi.php";
        
            //input po transit dan tampil ke tabel
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $sql = mysqli_query($koneksi, "SELECT * FROM dbtransaksi WHERE id='$id'");
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
		
                        

        mysqli_query($koneksi,"delete from dbtransaksi where id='$_GET[id]'");
        echo "Data Berhasil Terhapus";
        echo "<meta http-equiv=refresh content=2;URL='customer.php'>";
                    
			} 
   		
} 
            ?>