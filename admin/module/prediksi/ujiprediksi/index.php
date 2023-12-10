<!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
<?php 
	$id = $_GET['barang'];
	$hasil = $lihat -> barang_edit($id);
    $hasil_arsip = $lihat->uji_arsip_barang($id);
    ?>

<?php

    // hapus arsip jika bulan depan adalah bulan yang data stok obatnya akan diprediksi (karna semua datanya belum ada jadi dikomen dulu)
	// $bulanHapus = (int)date("m");
    
	// $bulanHapus = $bulanHapus + 1;
    // if ($bulanHapus == 13){
    //     $bulanHapus = 1;
    // }

    // require_once __DIR__ . '/../../../../config.php';
    
    // $statement = $config->prepare("DELETE FROM arsip_barang WHERE nama_bulan = ?");
    // $statement->execute([$bulanHapus]);
    
    // inisialisasi variabel
    $X = [];
    $Y = [];
    $Xbar = 0;
    $Ybar = 0;

    $sigmaX = 0;
    $sigmaY = 0;
    
    $X_Xbar = [];
    $Y_Ybar = [];
    
    $X_XbarY_Ybar = [];
    $sigmaX_XbarY_Ybar = 0;

    $X_Xbar2 = [];
    $sigmaX_Xbar2 = 0;

    // bulan prediksi (buka komen dibawah ini jika data stok obat di bulan 1 - 12 sudah ada)
    // $bulanPrediksi = $bulanHapus;

    // bulan prediksi
    $bulanPrediksi = 10;    

    try {

        // prediksi
        $i = 0;
        foreach ($hasil_arsip as $key => $value) {
            
            $X[$i] = (int)$value['nama_bulan'];
            $Y[$i] = (int)$value['stok'];
    
            $Xbar = $Xbar + $X[$i];
            $Ybar = $Ybar + $Y[$i];
    
            $i++;
        }
        // dapatin nilai sigma/jumlah
        $sigmaX = $Xbar;
        $sigmaY = $Ybar;
    
        // dapatin nilai rata-rata
        $Xbar = $Xbar/count($X);
        $Ybar = $Ybar/count($Y);   
    
        // looping lagi buat dapatin X-Xbar dan Y-Ybar
        $i = 0;
        foreach ($hasil_arsip as $key => $value) {
            // cari x-xbar dan y-ybar
            $X_Xbar[$i] = $X[$i] - $Xbar;
            $Y_Ybar[$i] = $Y[$i] - $Ybar;
    
            // cari (x-xbar)(y-ybar)
            $X_XbarY_Ybar[$i] = $X_Xbar[$i] * $Y_Ybar[$i];
    
            // cari (x-xbar)^2
            $X_Xbar2[$i] = pow($X_Xbar[$i], 2);
            $sigmaX_Xbar2 = $sigmaX_Xbar2 + $X_Xbar2[$i];
    
            // cari nilai sigma (X-Xbar)(Y-Ybar)
            $sigmaX_XbarY_Ybar = $sigmaX_XbarY_Ybar + $X_XbarY_Ybar[$i];
            $i++;
        }
    
        // regresi linier = a + bX;
        $b = $sigmaX_XbarY_Ybar/$sigmaX_Xbar2;
    
        // a = y - bX
        $a = $Ybar - $b*$Xbar;
    
        // hasil prediksi
        $Y = $a + $b*$bulanPrediksi;

    }catch(\DivisionByZeroError $e){
        $e->getMessage();
    }

?>
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">
					  	<a href="index.php?page=prediksi"><button class="btn btn-primary"><i class="fa fa-angle-left"></i> Balik </button></a>
						<h3>Uji Prediksi Stok Obat <?= $hasil['nama_barang'] ?>  (Data ini diambil dari bulan 1-9)</h3>
                        <?php if (isset($e)){ ?>
                            <div class="alert alert-danger" role="alert">
                                Data Stok Obat di tiap bulan kurang banyak, silahkan menunggu sampai data stok obat di tiap bulan tersedia!
                            </div>
                        <?php  }?>
                        <table class="table table-striped">
							<thead>
                                <tr>
                                    <th>Bulan</th>
                                    <th>Stok</th>
                                    <th>Prediksi Bulan <?= $bulanPrediksi ?></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($hasil_arsip as $key => $value) {?>
                                <tr>
                                    <td><?= $value['nama_bulan'] ?></td>
                                    <td><?= $value['stok'] ?></td>
                                    <td><?= (int)$Y ?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
						</table>
                        <div class="alert alert-warning" role="alert">
                            Catatan: <br>Data prediksi stok obat dipengaruhi oleh jumlah data, semakin sedikit datanya akurasinya akan semakin rendah, sebaliknya semakin banyak datanya akurasinya akan semakin bagus. Dan prediksi ini tidak menjamin bahwa data yang diprediksi itu 100% benar.
                        </div>
						<div class="clearfix" style="padding-top:16%;"></div>
				  </div>
              </div>
          </section>
      </section>