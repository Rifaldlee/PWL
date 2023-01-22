<!DOCTYPE html>
<html>
<head>
	<title>MEMBUAT GRAFIK DARI DATABASE MYSQL DENGAN PHP DAN CHART.JS </title>
	<script type="text/javascript" src="Chart.js"></script>
	<link rel="stylesheet" href="CSS/Navbar.css">
</head>

<body>
<ul>
                <li><a href="HomePage.html">Home</a></li>
                <li><a href="ProductPage.html">Product</a></li>
                <li><a class="active-page" href="FaqPage.html">FAQ</a></li>
                <li><a href="AboutPage.html">About</a></li>
                <li><a href="index.php">Chart</a></li>
                 <li><a href="read.php">Admin</a></li>
            </ul>
	<style type="text/css">
	body{
		font-family: roboto;
	}
 
	table{
		margin: 0px auto;
	}
	</style>
 
 
	<center>
		<h2>MEMBUAT GRAFIK DARI DATABASE MYSQL DENGAN PHP DAN CHART.JS<br/></h2>
	</center>
 
 
	<?php 
	include 'koneksi.php';
	?>
 
	<div style="width: 800px;margin: 0px auto;">
		<canvas id="myChart"></canvas>
	</div>
 
	<br/>
	<br/>
 
	<table border="1">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nama </th>
				<th>merk</th>
				<!-- <th>tipe </th> -->
                <th>jenis</TH>
			</tr>
		</thead>
		<tbody>
			<?php 
			$no = 1;
			$data = mysqli_query($koneksi,"SELECT * FROM barang ");
			while($d=mysqli_fetch_array($data)){
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $d['nama']; ?></td>
					<td><?php echo $d['merk']; ?></td>
					<!-- <td><?php echo $d['tipe']; ?></td> -->
                    <td><?php echo $d['JENIS']; ?></td>
				</tr>
				<?php 
			}
			?>
		</tbody>
	</table>
 
 
	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["VGA", "PROCESSOR", "STORAGE", "RAM"],
				datasets: [{
					label: '',
					data: [
					<?php 
					$jumlah_VGA = mysqli_query($koneksi,"SELECT * FROM barang where JENIS='VGA'");
					echo mysqli_num_rows($jumlah_VGA);
					?>, 
					<?php 
					$jumlah_PROCESSOR = mysqli_query($koneksi,"SELECT * FROM barang where JENIS='PROCESSOR'");
					echo mysqli_num_rows($jumlah_PROCESSOR);
					?>, 
					<?php 
					$jumlah_STORAGE = mysqli_query($koneksi,"SELECT * FROM barang where JENIS='STORAGE'");
					echo mysqli_num_rows($jumlah_STORAGE);
					?>, 
					<?php 
					$jumlah_RAM = mysqli_query($koneksi,"SELECT * FROM barang where JENIS='RAM'");
					echo mysqli_num_rows($jumlah_RAM);
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
</body>
</html>