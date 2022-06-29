<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laporan</title>
</head>
<body onload="window.print();">
	
<div class="container-fluid">
        	
			<div class="row page-titles">
		<center>LAPORAN SUMMARY PEMESANAN PERBULAN</center> <br>
				<canvas id="myChart"></canvas>
 <?php 
 $mei = $this->db->query("SELECT SUM(jumlah) as totaljumlah FROM semua_pesanan WHERE MONTH(tanggal) = 5 AND YEAR(tanggal) = 2020")->row_array();
 $juni = $this->db->query("SELECT SUM(jumlah) as totaljumlah FROM semua_pesanan WHERE MONTH(tanggal) = 6 AND YEAR(tanggal) = 2020")->row_array();
 $juli = $this->db->query("SELECT SUM(jumlah) as totaljumlah FROM semua_pesanan WHERE MONTH(tanggal) = 7 AND YEAR(tanggal) = 2020")->row_array();
 $agustus = $this->db->query("SELECT SUM(jumlah) as totaljumlah FROM semua_pesanan WHERE MONTH(tanggal) = 8 AND YEAR(tanggal) = 2020")->row_array();
 $september = $this->db->query("SELECT SUM(jumlah) as totaljumlah FROM semua_pesanan WHERE MONTH(tanggal) = 9 AND YEAR(tanggal) = 2020")->row_array();
 $oktober = $this->db->query("SELECT SUM(jumlah) as totaljumlah FROM semua_pesanan WHERE MONTH(tanggal) = 10 AND YEAR(tanggal) = 2020")->row_array();
 $november = $this->db->query("SELECT SUM(jumlah) as totaljumlah FROM semua_pesanan WHERE MONTH(tanggal) = 11 AND YEAR(tanggal) = 2020")->row_array();
 ;?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.2/Chart.min.js"></script>
<script type="text/javascript">var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November"],
    datasets: [{
      label: 'Total Semua Pesanan',
      data: [<?php echo $mei['totaljumlah'] ?>,<?php echo $juni['totaljumlah'] ?>,<?php echo $juli['totaljumlah'] ?>,<?php echo $agustus['totaljumlah'] ?>,<?php echo $september['totaljumlah'] ?>,<?php echo $oktober['totaljumlah'] ?>,<?php echo $november['totaljumlah'] ?>,],
      backgroundColor: "rgba(153,255,51,1)"
    }]
  }
});</script>
        </div>
	</div>
</body>
</html>