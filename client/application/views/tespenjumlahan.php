<!DOCTYPE HTML>
<html>
<head>
	<title>Tes Penjumlahan</title>
</head>
<body>
    <h2>Tes Penjumlahan via SOAP</h2>
    <form method="post" action="<?php echo $action; ?>">
        <input type="number" name="a" required="required" />
        +
        <input type="number" name="b" required="required" />
        <button type="submit">Proses</button>
    </form>
    <?php
    if(isset($error)){
        echo $error;
    }
    if(isset($fault)){
        echo $fault; 
    }
    if(isset($result)){
        echo $result;
        echo $request;
        echo $response;
    }
?>
</body>
</html>
