<!DOCTYPE html>
<html>
<head>
	<title>test</title>
</head>
<style type="text/css">
table{
	width: auto;
	}
	table,th,td{
	border: 1px black solid;
	border-collapse: collapse;
	}
</style>
<body>
<table>
	<thead>
		<tr>
			<th>Nama</th>
			<th>Tipe</th>
			<th>Harga</th>
			<th>Stok</th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach ($result as $row) {
		?>
		<tr>
			<td><?=$row['nama'];?></td>
			<td><?=$row['tipe'];?></td>
			<td><?=$row['harga'];?></td>
			<td><?=$row['stok'];?></td>
		</tr>
		<?php
		}
		?>
	</tbody>
</table>

</body>
</html>