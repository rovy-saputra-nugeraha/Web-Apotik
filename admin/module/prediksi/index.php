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
                                            <a href="index.php?page=prediksi/detail&barang=<?= $isi['id_barang'] ?>"><button class="btn btn-primary btn-xs">Prediksi</button></a>
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
					<!-- end view barang -->
					<!-- tambah barang MODALS-->
						<!-- Modal -->
					
						<div id="myModal" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<!-- Modal content-->
								<div class="modal-content" style=" border-radius:0px;">
								<div class="modal-header" style="background:#285c64;color:#fff;">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title"><i class="fa fa-plus"></i> Tambah Barang</h4>
								</div>										
								<form action="fungsi/tambah/tambah.php?barang=tambah" method="POST">
									<div class="modal-body">
								
										<table class="table table-striped bordered">
											
											<?php
												$format = $lihat -> barang_id();
											?>
											<tr>
												<td>ID Obat</td>
												<td><input type="text" readonly="readonly" required value="<?php echo $format;?>" class="form-control"  name="id"></td>
											</tr>
											<tr>
												<td>Kategori</td>
												<td>
												<select name="kategori" class="form-control" required>
													<option value="#">Pilih Kategori</option>
													<?php  $kat = $lihat -> kategori(); foreach($kat as $isi){ 	?>
													<option value="<?php echo $isi['id_kategori'];?>"><?php echo $isi['nama_kategori'];?></option>
													<?php }?>
												</select>
												</td>
											</tr>
											<tr>
												<td>Nama Obat</td>
												<td><input type="text" placeholder="Nama Obat" required class="form-control" name="nama"></td>
											</tr>
											<tr>
												<td>Merk Barang</td>
												<td><input type="text" placeholder="Merk Barang" required class="form-control"  name="merk"></td>
											</tr>
											<tr>
												<td>Harga Beli</td>
												<td><input type="number" placeholder="Harga beli" required class="form-control" name="beli"></td>
											</tr>
											<tr>
												<td>Harga Jual</td>
												<td><input type="number" placeholder="Harga Jual" required class="form-control"  name="jual"></td>
											</tr>
											<tr>
												<td>Satuan Barang</td>
												<td>
													<select name="satuan" class="form-control" required>
														<option value="#">Pilih Satuan</option>
														<option value="PCS">PCS</option>
													</select>
												</td>
											</tr>
											<tr>
												<td>Stok</td>
												<td><input type="number" required Placeholder="Stok" class="form-control"  name="stok"></td>
											</tr>
											<tr>
												<td>Tanggal Input</td>
												<td><input type="text" required readonly="readonly" class="form-control" value="<?php echo  date("j F Y, G:i");?>" name="tgl"></td>
											</tr>
										</table>
									</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Insert Data</button>
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</form>
							</div>
						</div>
						
					</div>
              	</div>
          	</section>
      	</section>
	
