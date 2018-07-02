<html>
<head>
 <title>Home</title>
 <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> 
</head>
<body class="bg">
  <!--
 <h1 align="center">Login agen</h1><br /><br />
 
  <table align="center">
   <tr>
    <td>Username</td>
    <td><input type="text" name="username"></td>
   </tr>
   <tr>
    <td>Password</td>
    <td><input type="password" name="password"></td>
   </tr>
   <tr>
    <td></td>
    <td><input type="submit" value="Login"></td>
   </tr>
  </table>
 </form>
 </form> -->
<div class="login">
    <div class="container">
      
    <div class="col-lg-8 col-lg-offset-2 login-box" >

        <div class="col-lg-12 right-box">
        <h1 align="center">BayarListrik.Com</h1>
        <h2 align="center">Cek Tagihan Listrik Pascabayarmu !</h2>
                <form action="<?php echo base_url(); ?>cektagihan" method="post">
            
                    <div class="form-group">
                    <label for="idpelanggan">  </label>
                        <input type="number" id="idpelanggan" class="form-control" name="idpelanggan" placeholder="Tulis ID Pelanggan PLN">
                    </div>
                    <div class="login-button">
                        <input type="submit" class="btn btn-default" name="submit" >
                    </div>
            
                </form><br><br>

      <h5>Mau jadi Agen pembayaran Listrik prabayar dan pascabayar ?</h5>
      <h6><a href="#">Klik Disini</a> Untuk Mendaftar</h6>
        </div>  <!-- right-box -->
      <p align="center"> <a href="<?php echo base_url(); ?>">Home</a>   |   <a href="<?php echo base_url(); ?>tentang">Tentang Kami</a>    |    <a href="<?php echo base_url(); ?>kontak">Kontak</a>     |   <a href="<?php echo base_url(); ?>daftar">daftar</a>   | <a href="<?php echo base_url(); ?>agen/login">login</a> <br>Layanan Web Kelompok 2</p>
    </div> <!--col-lg-8-->

   </div>
</div>    

</body>
<style type="text/css">
  @import url('https://fonts.googleapis.com/css?family=Josefin+Sans:100,300,400,600,700');
body, html {
    height: 100%;
}

.bg { 
    /* The image used */
    background-image: url("http://localhost/bayarlistrik/back.jpg");

    /* Full height */
    height: 100%; 

    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
.login{
   font-family: 'Josefin Sans', sans-serif;
   
   padding:40px 0px;
}

label{
    font-weight:400;
    font-size:15px;
}
 
.login-box{
    -webkit-box-shadow: 0px 0px 14px 0px rgba(0,0,0,0.24);
    -moz-box-shadow: 0px 0px 14px 0px rgba(0,0,0,0.24);
    box-shadow: 0px 0px 14px 0px rgba(0,0,0,0.24);
    padding:0px;
    background:#78d46e;
}

.left-box{
  padding:50px;
  color:#FFF;
}

.left-box h1{
  font-weight:600;
    font-family: 'Josefin Sans', sans-serif;
    text-transform:capitalize;
    color:#FFF;
    font-size:32px;
}

.right-box{
  background:#FFF;
  min-height:520px;
}

.right-box h1{
  font-weight:600;
    font-family: 'Josefin Sans', sans-serif;
    color:#444;
    font-size:32px;
    padding:50px;
}
  
.form{
    padding:20px 30px;
}

.form-control{
    box-shadow: none;
    border-radius: 0px;
    border-bottom: 1px solid #2196f3;
    border-top: 1px;
    border-left: none;
    border-right: none;
}

.btn{
    font-weight: 700;
    font-size:15px;
    color:#FFF;
    border-radius: 0;
    background: #78d46e;
    padding:12px 30px;
    float:right;
    margin-top:40px;
}

.btn:hover{
    border:2px solid #78d46e;
    background:#FFF;
}

input[type=text], input[type=password], input[type=email] {
    background-color: transparent;
    border: none;
    border-bottom: 1px solid #d2d2d2;
    border-radius: 0;
    margin-bottom:50px;
    box-shadow: none;
}

input[type=text]:focus, input[type=password]:focus, input[type=email]:focus {
    box-shadow: none;
    border-bottom: 1px solid #78d46e;
}

.form2 {
    padding:30px 0px;
}

.white-btn{
    background:#FFF;
    color:#78d46e;
}

</style>
</html>

