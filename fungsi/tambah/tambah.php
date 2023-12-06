<?php 
session_start();
if(!empty($_SESSION['admin'])){
	require '../../config.php';
	if(!empty($_GET['kategori'])){
		$nama= $_POST['kategori'];
		$tgl= date("j F Y, G:i");
		$data[] = $nama;
		$data[] = $tgl;
		$sql = 'INSERT INTO kategori (nama_kategori,tgl_input) VALUES(?,?)';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=kategori&&success=tambah-data"</script>';
	}
	if(!empty($_GET['barang'])){
		$id = $_POST['id'];
		$kategori = $_POST['kategori'];
		$nama = $_POST['nama'];
		$merk = $_POST['merk'];
		$beli = $_POST['beli'];
		$jual = $_POST['jual'];
		$satuan = $_POST['satuan'];
		$stok = $_POST['stok'];
		$tgl = $_POST['tgl'];
		
		$data[] = $id;
		$data[] = $kategori;
		$data[] = $nama;
		$data[] = $merk;
		$data[] = $beli;
		$data[] = $jual;
		$data[] = $satuan;
		$data[] = $stok;
		$data[] = $tgl;
		$sql = 'INSERT INTO barang (id_barang,id_kategori,nama_barang,merk,harga_beli,harga_jual,satuan_barang,stok,tgl_input) 
			    VALUES (?,?,?,?,?,?,?,?,?) ';
		$row = $config -> prepare($sql);
		$row -> execute($data);


		// masukin ke arsip barang
		$sql2 = 'SELECT * FROM barang WHERE id_barang = ?';
		$row = $config->prepare($sql2);
		$row->execute([$id]);
		$value = $row->fetch();

		require_once __DIR__ . '/../../admin/module/prediksi/helper/Helper.php';
		$namaBulan = explode(" ", $value['tgl_input']);

		$bulan = Helper::getAngkaBulan($namaBulan[1]);

		$sql = 'INSERT INTO arsip_barang(nama_barang, nama_bulan, stok, id_barang) VALUES (?, ?, ?, ?)';
		$row = $config->prepare($sql);
		$row->execute([$value['nama_barang'], $bulan, $value['stok'], $value['id_barang']]);
		echo '<script>window.location="../../index.php?page=barang&success=tambah-data"</script>';
	}
	if(!empty($_GET['jual'])){
		$id = $_GET['id'];
		
		// get tabel barang id_barang 
		$sql = 'SELECT * FROM barang WHERE id_barang = ?';
		$row = $config->prepare($sql);
		$row->execute(array($id));
		$hsl = $row->fetch();

		if($hsl['stok'] > 0)
		{
			$kasir =  $_GET['id_kasir'];
			$jumlah = 1;
			$total = $hsl['harga_jual'];
			$tgl = date("j F Y, G:i");
			
			$data1[] = $id;
			$data1[] = $kasir;
			$data1[] = $jumlah;
			$data1[] = $total;
			$data1[] = $tgl;
			
			$sql1 = 'INSERT INTO penjualan (id_barang,id_member,jumlah,total,tanggal_input) VALUES (?,?,?,?,?)';
			$row1 = $config -> prepare($sql1);
			$row1 -> execute($data1);

			echo '<script>window.location="../../index.php?page=jual&success=tambah-data"</script>';

		}else{
			echo '<script>alert("Stok Barang Anda Telah Habis !");
					window.location="../../index.php?page=jual#keranjang"</script>';
		}
	}
}