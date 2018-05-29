        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Agen</h1>

                    <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID Agen</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>email</th>
                                            <th>Deposit</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
											foreach ($tampil_data->result_array() as $row) {
											?>
											<tr>
												<td><?=$row['id_agen'];?></td>
												<td><?=$row['nama'];?></td>
												<td><?=$row['username'];?></td>
												<td><?=$row['email'];?></td>
												<td><?=$row['saldo'];?></td>
											</tr>
											<?php
											}
											?>
                                    </tbody>
                                </table>
                            </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>