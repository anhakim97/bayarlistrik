<html>
<head>
 <title>Halaman login</title>
 <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> 
</head>
<body>
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
        
        <div class="col-lg-6 left-box">
            <h1>BayarListrik.Com</h1>
            <p>Layanan Pembayaran Listrik </p>
            <br>
            <h2>Ingin menjadi Mitra kami?</h2>
            <h3>Silahkan <a href="<?php echo base_url('daftar'); ?>">Klik disini</a> untuk mendaftar</h3>
            </div>
        
        <div class="col-lg-6 right-box">
        <h1>Login Agen</h1>
  
                <form action="<?php echo base_url('agen/aksi_login'); ?>" method="post">
            
                    <div class="form-group">
                    <label for="username">Usersname </label>
                        <input type="text" id="username" class="form-control" name="username">
                        
                    </div>
            
                    <div class="form-group">
                    <label for="password">Password</label>
                        <input type="password" id="password" class="form-control" name="password">
                       
                    </div>
            
                    <div class="login-button">
                        <button class="btn btn-default" type="submit">Login</button>
                    </div>
            
                </form>
 
        </div>  <!-- right-box -->
    </div> <!--col-lg-8-->
        
   </div>
</div>    

</body>
<style type="text/css">
  @import url('https://fonts.googleapis.com/css?family=Josefin+Sans:100,300,400,600,700');

.login{
   font-family: 'Josefin Sans', sans-serif;
   background: #fbfbfb; 
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

