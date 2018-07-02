<?php 
$koneksi = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($koneksi, "bayarlistrik");
if(!$db){
    die("Tidak bisa menggunakan database :".mysqli_error());
}
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <h2>Data BayarListrik</h2>
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Data Pelanggan</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">
        <form method="post" style="margin-left: 10%; margin-right: 10%; ">
              <h2><u>Tambah Pelanggan</u></h2>
              <div class="form-group">
                <label for="kodekriteria">Nama Pelanggan</label>
                <input type="text" class="form-control"  name="namapelanggan" required>
              </div>
              <div class="form-group">
                <label for="namakriteria">Alamat</label>
                <input type="text" class="form-control"  name="alamat" required>
              </div>
              <div class="form-group">
                <label for="sel1">Daya Listrik:</label>
                <select class="form-control" id="sel1" name="daya_listrik">
                  <option value="450">450 VA</option>
                  <option value="900">900 VA</option>
                  <option value="1300">1300 VA</option>
                  <option value="2200">2200 VA</option>
                  <option value="3500">3500 VA</option>
                  <option value="2200">2200 VA</option>
                  <option value="5500">5500 VA</option>
                </select>
              </div>
              <button type="submit" class="btn btn-primary zz" name="submitpelanggan">Submit</button>
            </form><br><br>
            <?php 
              if(isset($_POST['submitpelanggan'])){
                echo $nama_pelanggan = $_POST['namapelanggan'];
                echo $alamat = $_POST['alamat'];
                echo $daya_listrik = $_POST['daya_listrik']; 
                $query = mysqli_query($koneksi, "INSERT INTO `pelanggan`(`nama_pelanggan`, `alamat`, `daya_listrik`) VALUES ('$nama_pelanggan', '$alamat', '$daya_listrik')");            
                mysqli_close($koneksi);
                header("location: data.php#collapse1");               
                }
             ?>

 <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Daya</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
                <?php 
                 $query_pelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan");
                 while ($pelanggan = mysqli_fetch_array($query_pelanggan)) { 
                  ?>
              <tr>
                <th scope="row"><?= $pelanggan['id_pelanggan'] ?></th>
                <td><?= $pelanggan['nama_pelanggan'] ?></td>
                <td><?= $pelanggan['alamat'] ?></td>
                <td><?= $pelanggan['daya_listrik'] ?></td>
                <td>
                    <a href="data.php?id_pelanggan=<?php echo $pelanggan['id_pelanggan'] ?>"><button title="hapus" type="button" class="btn btn-danger" id="hapuskriteria"><span class="glyphicon glyphicon-trash"></span></button></a>
                </td>
              </tr>
                 <?php
                 
                 }
                  ?>
            </tbody>
          </table>
<?php 
if (isset($_GET['id_pelanggan'])) {
  $id_pel = $_GET['id_pelanggan'];
  mysqli_query($koneksi, "DELETE FROM pelanggan WHERE id_pelanggan = '$id_pel'");
}
 ?>

          </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Tagihan</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Collapsible Group 3</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
      </div>
    </div>
  </div> 
</div> 
</body>
</html>
