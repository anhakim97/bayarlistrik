        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">Deposit</h1>
                    <!-- konten -->

					<div class="panel-group" id="accordion">
					  <div class="panel panel-default">
					    <div class="panel-heading">
					      <h4 class="panel-title">
					        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
					        <span class="glyphicon glyphicon-plus"></span>  Deposit Baru</a>
					      </h4>
					    </div>
					    <div id="collapse1" class="panel-collapse collapse">
					      <div class="panel-body">
					      Form Pengajuan Deposit Baru <br>
					      <form action="<?php echo base_url('agen/deposit'); ?>" method="post">
					      	<div class="form-group">
							  <label for="nominal">Pilih nominal :</label>
							  <select class="form-control" id="nominal" name="nominal">
							    <option value="50000">Rp.    50.000,-</option>
							    <option value="100000">Rp.   100.000,-</option>
							    <option value="200000">Rp.   200.000,-</option>
							    <option value="500000">Rp.   500.000,-</option>
							    <option value="1000000">Rp. 1.000.000,-</option>
							    <option value="1500000">Rp. 1.500.000,-</option>
							    <option value="2000000">Rp. 2.000.000,-</option>
							  </select>
							  <label for="bank">Pilih bank :</label>
							  <select class="form-control" id="bank" name="bank">
							    <option value="Mandiri (8123098120938 An. Bayar Listrik)">Mandiri (8123098120938 An. Bayar Listrik)</option>
							    <option value="BRI (2173087901273 An. Bayar Listrik)">BRI (2173087901273 An. Bayar Listrik)</option>
							    <option value="BCA (1236986986969 An. Bayar Listrik)">BCA (1236986986969 An. Bayar Listrik)</option>
							    <option value="BNI (1829730902173 An. Bayar Listrik)">BNI (1829730902173 An. Bayar Listrik)</option>

							  </select>
							</div>
							<input type="submit" id="submit" class="btn btn-default " name="submit" value="Submit" onclick="alert('Silahkan Transfer Sesuai nominal ke rekening yang sudah dipilih, jika sudah melakukan transfer segera hubungi admin dan kirim bukti transfer via whatsaap (085-000-000-000) agar depotit kamu segera masuk ke akun kamu. terima kasih.')">
					      </form>



					  	</div>
					    </div>
					  </div>
					  <div class="panel panel-default">
					    <div class="panel-heading">
					      <h4 class="panel-title">
					        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
					        <span class="glyphicon glyphicon-th-list"></span>  Riwayat Deposit</a>
					      </h4>
					    </div>
					    <div id="collapse2" class="panel-collapse collapse">
					      <div class="panel-body">
					      	Deposit Sukses <br>
					      	<br>
					      	<div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID Deposit</th>
                                            <th>Nominal</th>
                                            <th>Bank</th>
                                            <th>Status</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
											foreach ($depositsukses->result_array() as $row) {
											?>
											<tr>
												<td><?=$row['id_deposit'];?></td>
												<td><?=$row['nominal'];?></td>
												<td><?=$row['bank'];?></td>
												<td><?=$row['status'];?></td>
											</tr>
											<?php
											}
											?>
                                    </tbody>
                                </table>
                            </div>

					      </div>
					    </div>
					  </div>
					  <div class="panel panel-default">
					    <div class="panel-heading">
					      <h4 class="panel-title">
					        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
					        <span class="glyphicon glyphicon-time"></span>  Deposit Masih dalam proses</a>
					      </h4>
					    </div>
					    <div id="collapse3" class="panel-collapse collapse">
					      <div class="panel-body">Jika Sudah Trasfer, mohon hubungi admin via WhatsApp(085-000-000-000) dengan mengirimkan bukti transfer.
					      	<br><br>
					      	<div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID Deposit</th>
                                            <th>Nominal</th>
                                            <th>Bank</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
											foreach ($depositproses->result_array() as $row) {
											?>
											<tr>
												<td><?=$row['id_deposit'];?></td>
												<td><?=$row['nominal'];?></td>
												<td><?=$row['bank'];?></td>
												<td><?=$row['status'];?></td>
												<td onclick="alert('Deposit berhasil dibatalkan !')"><?php echo anchor('agen/hapus_deposit/'.$row['id_deposit'],'Hapus'); ?></td>
											</tr>
											<?php
											}
											?>
                                    </tbody>
                                </table>
                            </div>
					      </div>
					    </div>
					  </div>
					</div>


                    <!-- /. konten -->




                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>