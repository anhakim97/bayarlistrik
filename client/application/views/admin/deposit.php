        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Deposit</h1>
                    <div class="panel-group" id="accordion">
					  
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
                                            <th>ID agen</th>
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
												<td><?=$row['id_agen'];?></td>
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
					        <span class="glyphicon glyphicon-time"></span>   Deposit Masih dalam proses(belum transfer)</a>
					      </h4>
					    </div>
					    <div id="collapse3" class="panel-collapse collapse">
					      <div class="panel-body">
					      	<br><br>
					      	<div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID Deposit</th>
                                            <th>ID agen</th>
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
												<td><?=$row['id_agen'];?></td>
												<td><?=$row['nominal'];?></td>
												<td><?=$row['bank'];?></td>
												<td><?=$row['status'];?></td>
												<td> 
													<a href="<?php echo base_url();?>admin/konfirmasideposit/<?=$row['id_deposit'];?>" onclick="alert('Deposit berhasil diupdate !')">Konfirmasi</a>| 
													<a href="<?php echo base_url();?>admin/hapus_deposit/<?=$row['id_deposit'];?>" onclick="alert('Deposit dihapus dan dibatalkan !')">Hapus</a>														
													</td>
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
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>