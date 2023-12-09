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

// Ambil data stok dari uji_arsip_barang berdasarkan id_barang
$stok = mysqli_query($koneksi, "SELECT nama_bulan, stok FROM uji_arsip_barang WHERE id_barang = '$id_barang'");
$stokArray = [];

// Inisialisasi array stok untuk setiap bulan
for ($i = 1; $i <= 9; $i++) {
  $stokArray[$i] = 0;
}

// Ambil data stok dan isi array stok sesuai dengan bulan
while ($row = mysqli_fetch_assoc($stok)) {
  $bulan = (int)$row['nama_bulan'];
  $stokArray[$bulan] = (int)$row['stok'];
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
  <style type="text/css">
    .container {
      width: 40%;
      margin: 15px auto;
    }
  </style>
</head>

<body>

  <div class="container">
    <a href="/Web-Apotik/index.php?page=prediksi"><button class="btn btn-primary"><i class="fa fa-angle-left"></i> Balik </button></a>
    <canvas id="linechart" width="400" height="400"></canvas>
  </div>

  <script type="text/javascript">
    var ctx = document.getElementById("linechart").getContext("2d");

    // Tentukan array untuk nama bulan
    var namaBulan = ["", "Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep"];

    // Debugging statement
    console.log("Data from PHP:", <?php echo json_encode($stokArray); ?>);
    <?php
    // Tambahkan pernyataan echo untuk mencetak data ke dalam console log JavaScript
    echo 'console.log("Data from PHP:", ' . json_encode($stokArray) . ');';
    ?>

    var data = {
      labels: [<?php
                // Generate labels untuk bulan 1 sampai 9
                for ($i = 1; $i <= 9; $i++) {
                  echo '"' . $namaBulan[$i] . '",';
                }
                ?>],
      datasets: [{
        label: "stok",
        fill: false,
        lineTension: 0.1,
        backgroundColor: "#29B0D0",
        borderColor: "#29B0D0",
        pointHoverBackgroundColor: "#29B0D0",
        pointHoverBorderColor: "#29B0D0",
        data: <?php echo json_encode(array_values($stokArray)); ?>
      }]
    };

    var myLineChart = new Chart(ctx, {
      type: 'line',
      data: data,
      options: {
        legend: {
          display: true
        },
        scales: {
          yAxes: [{
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