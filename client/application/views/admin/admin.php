<html>
<head>
	<title>Admin</title>
</head>
<body>
	<h1>Login berhasil !</h1>
	<h2>Hai, <?php echo $this->session->userdata("nama"); ?></h2>
	<a href="<?php echo base_url('admin/login/logout'); ?>">Logout</a>
</body>
</html>