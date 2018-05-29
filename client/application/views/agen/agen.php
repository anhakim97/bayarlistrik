<html>
<head>
	<title>Agen</title>
</head>
<body>
	<h1>Login berhasil !</h1>
	<h2>Hai, <?php echo $this->session->userdata("nama"); ?></h2>
	<a href="<?php echo base_url('agen/login/logout'); ?>">Logout</a>
</body>
</html>