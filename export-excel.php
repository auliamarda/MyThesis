<html>
<head>
	<title>Prediksi Tunggakan BP3 menggunakan Metode Naïve Bayes</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;
 
	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>
 
	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Hasil Perhitungan Naive.xls");
	?>
 
	<center>
		<h1>Hasil Perhitungan Naive Bayes Clasifier <br/></h1>
	</center>
 
	<table border="1">
		<tr>
            <th rowspan="2">No Reg</th>
			<th rowspan="2">Status Ayah</th>
            <th rowspan="2">Pekerjaan Ayah</th>
            <th rowspan="2">Gajji Ayah</th>
            <th rowspan="2">Status Ibu</th>
            <th rowspan="2">Pekerjaan Ibu</th>
            <th rowspan="2">Gaji ibu</th>
            <th rowspan="2">Label Sebenarnya</th>
            <th colspan="2">Label Prediksi</th>
            <th rowspan="2">Hasil</th>
        </tr>
        <tr>
            <th>Lunas</th>
            <th>Menunggak</th>
        </tr>
        <?php
        include 'koneksi.php';
        $ambil = mysqli_query($koneksi, "SELECT * FROM hasil_naive");
        while($data = mysqli_fetch_array($ambil)){
        ?>
        <tr>
        	<td><?= $data['no_reg'] ?></td>
            <td><?= $data['status_ayah'] ?></td>
            <td><?= $data['pekerjaan_ayah'] ?></td>
            <td><?= htmlspecialchars($data['gaji_ayah']) ?></td>
            <td><?= $data['status_ibu'] ?></td>
            <td><?= $data['pekerjaan_ibu'] ?></td>
            <td><?= htmlspecialchars($data['gaji_ibu']) ?></td>
            <td><?= $data['label'] ?></td>
            <td><?= $data['hasil_lunas'] ?></td>
            <td><?= $data['hasil_menunggak'] ?></td>
            <?php
                if($data['hasil_lunas'] > $data['hasil_menunggak']){
                    $label = 'lunas';
            ?>
            <td><button type="button" class='d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm'><span aria-hidden="true"></span><?= $label ?></button></td>
            <?php
                }else{
                    $label = 'menunggak';
            ?>
            <td><button type="button" class='d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm'><span aria-hidden="true"></span><?= $label ?></button></td>

            <?php } ?>
        </tr>
        <?php } ?>
	</table>
</body>
</html>