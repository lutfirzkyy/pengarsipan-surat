<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laporan</title>
</head>
<img src="<?php echo base_url('assets/kop.png')?>" alt=""style="width :100%" />
<h4><p align="center">LAPORAN GRAFIK SURAT MASUK</p></h4>
<body onload="window.print();">
	
<div class="container-fluid">
        	
			<div class="row page-titles">
		<!-- <center>LAPORAN GRAFIK SURAT MASUK</center> <br> -->
    <canvas id="myChart"></canvas>
 <?php 
 $januari = $this->db->query("SELECT SUM(jumlah) as totaljumlah FROM surat_masuk WHERE MONTH(tanggal_surat) = 1 AND YEAR(tanggal_surat) = 2021")->row_array();
 $februari = $this->db->query("SELECT SUM(jumlah) as totaljumlah FROM surat_masuk WHERE MONTH(tanggal_surat) = 2 AND YEAR(tanggal_surat) = 2021")->row_array();
 $maret = $this->db->query("SELECT SUM(jumlah) as totaljumlah FROM surat_masuk WHERE MONTH(tanggal_surat) = 3 AND YEAR(tanggal_surat) = 2021")->row_array();
 $april = $this->db->query("SELECT SUM(jumlah) as totaljumlah FROM surat_masuk WHERE MONTH(tanggal_surat) = 4 AND YEAR(tanggal_surat) = 2021")->row_array();
 $mei = $this->db->query("SELECT SUM(jumlah) as totaljumlah FROM surat_masuk WHERE MONTH(tanggal_surat) = 5 AND YEAR(tanggal_surat) = 2021")->row_array();
 $juni = $this->db->query("SELECT SUM(jumlah) as totaljumlah FROM surat_masuk WHERE MONTH(tanggal_surat) = 6 AND YEAR(tanggal_surat) = 2021")->row_array();
 $juli = $this->db->query("SELECT SUM(jumlah) as totaljumlah FROM surat_masuk WHERE MONTH(tanggal_surat) = 7 AND YEAR(tanggal_surat) = 2021")->row_array();
 $agustus = $this->db->query("SELECT SUM(jumlah) as totaljumlah FROM surat_masuk WHERE MONTH(tanggal_surat) = 8 AND YEAR(tanggal_surat) = 2021")->row_array();
//  $september = $this->db->query("SELECT SUM(jumlah) as totaljumlah FROM surat_masuk WHERE MONTH(tanggal_surat) = 9 AND YEAR(tanggal_surat) = 2021")->row_array();
//  $oktober = $this->db->query("SELECT SUM(jumlah) as totaljumlah FROM surat_masuk WHERE MONTH(tanggal_surat) = 10 AND YEAR(tanggal_surat) = 2021")->row_array();
//  $november = $this->db->query("SELECT SUM(jumlah) as totaljumlah FROM surat_masuk WHERE MONTH(tanggal_surat) = 11 AND YEAR(tanggal_surat) = 2021")->row_array();
 ;?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.2/Chart.min.js"></script>
<script type="text/javascript">var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus"],
    datasets: [{
      label: 'Total Semua Surat Masuk',
      data: [<?php echo $januari['totaljumlah'] ?>,<?php echo $februari['totaljumlah'] ?>,<?php echo $maret['totaljumlah'] ?>,<?php echo $april['totaljumlah'] ?>,<?php echo $mei['totaljumlah'] ?>,<?php echo $juni['totaljumlah'] ?>,<?php echo $juli['totaljumlah'] ?>,<?php echo $agustus['totaljumlah'] ?>,],
      backgroundColor: "rgba(153,255,51,1)"
    }]
  }
});</script>
        </div>
	</div>
</body>
</html>