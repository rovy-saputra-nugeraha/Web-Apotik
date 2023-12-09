<?php
// Ambil id_barang dari URL
$id_barang = isset($_GET['id_barang']) ? $_GET['id_barang'] : die('ID Barang tidak ditemukan.');

// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "db_toko");

// Query untuk mendapatkan data dari uji_arsip_barang berdasarkan id_barang
$query = "SELECT * FROM uji_arsip_barang WHERE id_barang = '$id_barang'";
$result = mysqli_query($koneksi, $query);

// Cek apakah data ditemukan
if (!$result) {
  die('Query Error: ' . mysqli_error($koneksi));
}

// Inisialisasi array stok untuk setiap bulan
$stokArray = [];

// Inisialisasi array nama bulan
$namaBulan = [];

// Inisialisasi variable nama_barang
$nama_barang = '';

// Isi array nama bulan dan stok
while ($row = mysqli_fetch_assoc($result)) {
  $nama_barang = $row['nama_barang']; // Ambil nama_barang dari hasil query
  $namaBulan[] = $row['nama_bulan'];
  $stokArray[] = (int)$row['stok'];
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Grafik Stok Obat</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <!-- Bootstrap core CSS -->
  <link href="/Web-Apotik/assets/css/bootstrap.css" rel="stylesheet">
  <link href="/Web-Apotik/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="shortcut icon" href="/Web-Apotik/assets/img/pic/logo.jpg" />
  <style type="text/css">
    .container {
      width: 60%;
      /* Menyesuaikan ukuran container */
      margin: 15px auto;
    }

    .chart-container {
      position: relative;
      margin-top: 20px;
      display: flex;
      /* Menjadikan container flexbox */
      align-items: center;
      /* Posisikan item di tengah container */
    }

    #linechart {
      max-height: 500px;
      /* Menyesuaikan tinggi chart */
    }

    .legend-container {
      display: flex;
      justify-content: center;
      /* Mengatur agar konten berada di tengah */
      margin-top: 20px;
      margin-left: 100px;
      width: 100%;
      /* Menyesuaikan lebar container dengan lebar parent */
    }

    .legend-text {
      margin-right: 20px;
      /* Menambah margin antara teks dan grafik */
    }
  </style>
</head>

<body>

  <div class="container">
    <a href="/Web-Apotik/index.php?page=prediksi"><button class="btn btn-primary"><i class="fa fa-angle-left"></i> Balik </button></a>
    <div class="chart-container">
      <div class="legend-text"><strong>Grafik Y : </strong> Stok Obat <?php echo $nama_barang; ?></div>
      <canvas id="linechart" width="400" height="400"></canvas>
    </div>
    <div class="legend-container">
      <br>
      <div><strong>Grafik X : </strong> Bulan Januari-September</div>
    </div>
  </div>

  <script type="text/javascript">
    var ctx = document.getElementById("linechart").getContext("2d");

    // Debugging statement
    console.log("Data from PHP:", <?php echo json_encode($stokArray); ?>);

    var data = {
      labels: <?php echo json_encode($namaBulan); ?>,
      datasets: [{
        label: "Grafik Y: Stok Obat <?php echo $nama_barang; ?>",
        fill: false,
        lineTension: 0.1,
        backgroundColor: "#29B0D0",
        borderColor: "#29B0D0",
        pointHoverBackgroundColor: "#29B0D0",
        pointHoverBorderColor: "#29B0D0",
        data: <?php echo json_encode($stokArray); ?>
      }]
    };

    var myLineChart = new Chart(ctx, {
      type: 'line',
      data: data,
      options: {
        legend: {
          display: false, // Menyembunyikan legend bawaan Chart.js
        },
        scales: {
          xAxes: [{
            scaleLabel: {
              display: true,
              labelString: 'Grafik X: Nama Bulan'
            }
          }],
          yAxes: [{
            scaleLabel: {
              display: true,
              labelString: 'Grafik Y: Stok Obat'
            },
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  </script>

</body>

</html>