 <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->  
	  <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">
						<h3>Data Barang</h3>
						

						<!-- Trigger the modal with a button -->	
						
						<!-- view barang -->	
						<div class="modal-view">
							<table class="table table-bordered table-striped" id="example1">
								<thead>
									<tr style="background:#DFF0D8;color:#333;">
										<th>No.</th>
										<th>ID Obat</th>
										<th>Kategori</th>
										<th>Nama Obat</th>
										<th>Merk</th>
										<th>Stok</th>
										<th>Harga Beli</th>
										<th>Harga Jual</th>
										<th>Satuan</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>

								<?php 
									$totalBeli = 0;
									$totalJual = 0;
									$totalStok = 0;
									if($_GET['stok'] == 'yes')
									{
										$hasil = $lihat -> barang_stok();

									}else{
										$hasil = $lihat -> barang();
									}
									$no=1;
									foreach($hasil as $isi) {
								?>
									<tr>
										<td><?php echo $no;?></td>
										<td><?php echo $isi['id_barang'];?></td>
										<td><?php echo $isi['nama_kategori'];?></td>
										<td><?php echo $isi['nama_barang'];?></td>
										<td><?php echo $isi['merk'];?></td>
										<td>
											<?php if($isi['stok'] == '0'){?>
												<button class="btn btn-danger"> Habis</button>
											<?php }else{?>
												<?php echo $isi['stok'];?>
											<?php }?>
										</td>
										<td>Rp.<?php echo number_format($isi['harga_beli']);?>,-</td>
										<td>Rp.<?php echo number_format($isi['harga_jual']);?>,-</td>
										<td> <?php echo $isi['satuan_barang'];?></td>
										<td>
											<a href="index.php?page=prediksi/detailprediksi&barang=<?= $isi['id_barang'] ?>"><button class="btn btn-success btn-xs">Prediksi</button></a>
											<a href="index.php?page=prediksi/ujiprediksi&barang=<?= $isi['id_barang'] ?>"><button class="btn btn-primary btn-xs">Uji Prediksi</button></a>
											<a href="/Web-Apotik/admin/module/grafik/linechart.php?id_barang=<?= $isi['id_barang'] ?>"><button class="btn btn-danger btn-xs">Grafik</button></a>
                                        </td>
                                    </tr>
								<?php 
										$no++; 
										$totalBeli += $isi['harga_beli'] * $isi['stok']; 
										$totalJual += $isi['harga_jual'] * $isi['stok'];
										$totalStok += $isi['stok'];
									}
								?>
								</tbody>
								<tfoot>
									<tr>
										<th colspan="5">Total </td>
										<th><?php echo $totalStok;?></td>
										<th>Rp.<?php echo number_format($totalBeli);?>,-</td>
										<th>Rp.<?php echo number_format($totalJual);?>,-</td>
										<th colspan="2" style="background:#ddd"></th>
									</tr>
								</tfoot>
							</table>
						</div>
						<div class="clearfix" style="margin-top:7pc;"></div>
						
					</div>
              	</div>
          	</section>
      	</section>
	
