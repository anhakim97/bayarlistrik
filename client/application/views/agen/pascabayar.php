        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Prabayar</h1>
					<div class="panel-group" id="accordion">
					  <div class="panel panel-default">
					    <div class="panel-heading">
					      <h4 class="panel-title">
					        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
					        Bayar Listrik</a>
					      </h4>
					    </div>
					    <div id="collapse1" class="panel-collapse collapse in">
					      <div class="panel-body">
				<form action="<?php echo base_url(); ?>agen/cektagihan" method="post">
            
                    <div class="form-group">
                    <label for="idpelanggan">  </label>
                        <input type="number" id="idpelanggan" class="form-control" name="idpelanggan"  value="<?php if(!empty($result)){ echo $id_pelanggan;} ?>">
                    </div>
                    <div class="login-button">
                        <input type="submit" class="btn btn-default" name="submit" >
                    </div>
            
                </form><br><br>

                
				<?php 
				if(!empty($bayarlistrik)){ 
					echo "<script>alert('Berhasil Dibayar')</script>";
				}
				if(!empty($result)){ 
					foreach ($result as $row) {
					?>
					<h2 align="center">Informasi Tagihan</h2><br>
					<div align="center">
						<table style="font-size: 17px;">
							<tr>
								<td><strong>Id Tagihan    </strong></td>
								<td> : <?=$id_tagihan = $row['id_tagihan'];?></td>
							</tr>
							<tr>
								<td><strong>Id Pelanggan  </strong></td>
								<td> : <?=$row['id_pelanggan'];?></td>
							</tr>
							<tr>
								<td><strong>Nama Pelanggan  </strong></td>
								<td> : <?=$row['nama_pelanggan'];?></td>
							</tr>
							<tr>
								<td><strong>Daya Listrik  </strong></td>
								<td> : <?=$row['daya_listrik'];?></td>
							</tr>
							<tr>
								<td><strong>Bulan  </strong></td>
								<td> : <?=$row['bulan'];?></td>
							</tr>
							<tr>
								<td><strong>Jumlah Tagihan  </strong></td>
								<td> : <?= $tagihan = $row['jumlah_tagihan'];?></td>
							</tr>
							<tr>
								<td><strong>Status  </strong></td>
								<td> : <?=$status = $row['status'];?></td>
							</tr>
						</table><br>
						
						<form action="<?php echo base_url(); ?>agen/bayarlistrik" method="post">
							<input type="number" name="id_pelanggan" value="<?=$row['id_pelanggan'];?>" hidden>
							<?php if(!empty($result)){ 
								?>
							<input type="number" id="tagihan" name="tagihan"  value="<?=$tagihan;?>" hidden>
							<input type="number" id="id_tagihan" name="id_tagihan"  value="<?=$id_tagihan;?>" hidden> 
								<?php
							} ?>
							
							<?php
								foreach ($jumlah_deposit->result_array() as $row) {
                                    $saldo = $row['saldo'];
                                    $cek = $saldo - $tagihan;
                                    if ($cek <=0) {
											echo "Saldo Tidak Cukup silahkan isi deposit";
											?>
											<?php
										}else{
											if ($status=="sudah dibayar") {
												echo "Tagihan ini sudah dibayar";
											}else{
											echo "Saldo Cukup";
											?>
										<br> <div class="login-button">
											<input type="number" name="saldo" value="<?= $saldo ?>" hidden>
				                        	<input type="submit" class="btn btn-danger" name="submit" value="Bayar">
				                    	</div>
											<?php
										}}
							
                                 }
                                 ?>
							


                    </form></div>

							<?php
					};
					?>
					<?php
					}else if(!empty($nodata)){
						echo "Data tidak ditemukan";
					} 
					?>

					      </div>
					    </div>
					  </div>
					  <div class="panel panel-default">
					    <div class="panel-heading">
					      <h4 class="panel-title">
					        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
					        Transaksi</a>
					      </h4>
					    </div>
					    <div id="collapse2" class="panel-collapse collapse">
					      <div class="panel-body">
					      	<div class="container">


							<div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th style="width: 10%;">ID Transaksi</th>
                                            <th style="width: 10%;">ID Tagihan</th>
                                            <th style="width: 30%;">Tanggal Bayar</th>
                                            <th>Jumlah Tagihan</th>
                                            <th>Detail Tagihan</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$jumlah_transaksi=0;
											foreach ($transaksi_all->result_array() as $row) {
											?>
											<tr>
												<td><?=$row['id_transaksi'];?></td>
												<td><?=$row['id_tagihan'];?></td>
												<td><?=$tanggal_bayar = $row['tanggal_bayar'];?></td>
												<td><?php 
														  $view_keterangan = $row['keterangan']; 
														  $view_ket = unserialize($view_keterangan);
														  

														  ?>
														  	
													  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal<?=$row['id_transaksi'];?>">Lihat Detail</button>

													  <!-- Modal -->
													  <div class="modal fade" id="myModal<?=$row['id_transaksi'];?>" role="dialog">
													    <div class="modal-dialog">
													    
													      <!-- Modal content-->
													      <div class="modal-content">
													        <div class="modal-header">
													          <button type="button" class="close" data-dismiss="modal">&times;</button>
													          <h4 class="modal-title">Detail Transaksi</h4>
													        </div>
													        <div class="modal-body">
													          <?php 
															foreach ($view_ket as $row) {
																				?>
																				<h2 align="center">Informasi Transaksi Pembayaran</h2><br>
																				<div align="center">
																					<table style="font-size: 17px;">
																						<tr>
																							<td><strong>Id Tagihan    </strong></td>
																							<td> : <?=$id_tagihan = $row['id_tagihan'];?></td>
																						</tr>
																						<tr>
																							<td><strong>Id Pelanggan  </strong></td>
																							<td> : <?=$row['id_pelanggan'];?></td>
																						</tr>
																						<tr>
																							<td><strong>Nama Pelanggan  </strong></td>
																							<td> : <?=$row['nama_pelanggan'];?></td>
																						</tr>
																						<tr>
																							<td><strong>Daya Listrik  </strong></td>
																							<td> : <?=$row['daya_listrik'];?></td>
																						</tr>
																						<tr>
																							<td><strong>Bulan  </strong></td>
																							<td> : <?=$row['bulan'];?></td>
																						</tr>
																						<tr>
																							<td><strong>Jumlah Tagihan  </strong></td>
																							<td> : <?= $tagihan = $row['jumlah_tagihan'];?></td>
																						</tr>
																						<tr>
																							<td><strong>Status  </strong></td>
																							<td> : <?=$status = $row['status'];?></td>
																						</tr>
																						<tr>
																							<td><strong>Tanggal Bayar  </strong></td>
																							<td> : <?=$tanggal_bayar; ?></td>
																						</tr>
																					</table>
															<?php } ?>

													        </div>
													        <div class="modal-footer">
													          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													        </div>
													      </div>
													      
													    </div>
													  </div>
													  
													</div>






														  </td>
														  <td>Rp. <?php  echo $tagihan; 
														  $jumlah_transaksi=$jumlah_transaksi + $tagihan; ?>,-</td>
											</tr>
											<?php
											}
											?>
                                    </tbody>
                                </table>
                            </div>

                            <?php echo "<b>Jumlah Seluruh transaksi : </b>Rp. ".$jumlah_transaksi; ?>
					      </div>
					    </div>
					  </div>
					  <!--
					  <div class="panel panel-default">
					    <div class="panel-heading">
					      <h4 class="panel-title">
					        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
					        Collapsible Group 3</a>
					      </h4>
					    </div>
					    <div id="collapse3" class="panel-collapse collapse">
					      <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
					      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
					      minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
					      commodo consequat.</div>
					    </div>
					  </div>
					</div>
					-->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>