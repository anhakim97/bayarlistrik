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
			<th>id_tagihan</th>
			<th>id_pelanggan</th>
			<th>jumlah tagihan</th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach ($hasil->result_array() as $row) {
		?>
		<tr>
			<td><?=$row['id_pelanggan'];?></td>
			<td><?=$row['nama'];?></td>
			<td><?=$row['alamat'];?></td>
		</tr>
		<?php
		}
		?>
	</tbody>
</table>

</body>
</html>