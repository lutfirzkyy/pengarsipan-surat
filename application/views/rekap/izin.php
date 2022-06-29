<!DOCTYPE html>
<html lang="en">
<?php
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}?>

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url()?>assets/fantala.png">
    <title>Dinas Pariwisata Tanah Laut</title>
	<script>window.print();</script>
	<style>
	#wrapper {
     width: 800px;
     margin: 0 auto;
	 }
	 #judul {
		 text-align: center;
		 font-size: 25px;
		 font-weight: bold;
		 text-decoration: underline;
		 padding-top: 30px;
	 }
	 #judul1 {
		 text-align: center;
		 font-size: 20px;
		 font-weight: bold;
		 padding-bottom: 20px;
	 }
	 .isi {
		 font-size: 20px;
		 padding: 20px;
		 text-align: justify;
		 text-indent: 40px;
	 }
	 .isi1 {
		 font-size: 20px;
		 padding: 20px;
		 text-align: justify;
	 }

	 .table {
         margin-left: 60px;
		font-size: 20px;
	}

	td{
		height: 30px;
       padding-right: 5px;
	}
	</style>
</head>
<body>
	<div id="wrapper">
    
  <img style="margin:0 auto; width: 100%;" src="<?php echo base_url('assets/kop.png')?>" alt="">
		<!-- <div id="judul">Surat Keterangan Guru</div> -->
		<br>
     <div style="text-align: right; font-size: 18px; margin-right: 60px; font-family: 'Times New Roman';">
     Banjarmasin, <?php echo tgl_indo($data['tanggal_surat'])?>
    </div>
		<br>

      <div id="judul">SURAT IZIN</div>
      <div id="judul1">No Surat: <?php
	  
	  echo $data['no_surat'];?></div>
	
   		<div class="isi">
		  <p>
		  Yang bertanda tangan dibawah ini Kepala Dinas Pemuda dan Olahraga Provinsi Kalimantan Selatan, Dengan ini memberikan izin kepada :</p>
		  </div>
	
		<table class="table">
	 		<tbody>
 				<tr>
 					<td>NIK</td>
 					<td>:</td>
 					<td><?php echo $data['nik'];?></td>
 				</tr>
 				<tr>
 					<td>Nama</td>
 					<td>:</td>
 					<td><?php echo $data['nama'];?></td>
                 </tr>
 				<tr>
 					<td>Jabatan</td>
 					<td>:</td>
 					<td><?php echo $data['jabatan'];?></td>
                 </tr>

 				<tr>
 					<td>Tanggal Mulai Izin</td>
 					<td>:</td>
 					<td><?php echo tgl_indo($data['tanggal_mulai_izin']);?></td>
                 </tr>
 				<tr>
 					<td>Tanggal Selesai Izin</td>
 					<td>:</td>
 					<td><?php echo tgl_indo($data['tanggal_selesai_izin']);?></td>
                 </tr>
 				<tr>
 					<td>Keterangan</td>
 					<td>:</td>
 					<td><?php echo $data['keterangan'];?></td>
                 </tr>
 	

 			</tbody>
		 </table>
		 
		 <div class="isi1">
		 <p>
		 Demikian surat izin ini dibuat agar dapat digunakan sebagaimana mestinya. Atas perhatiannya kami ucapkan terima kasih.
		 </p> 
		  </div>

		<table align="right" border="0">
		    <tr>
		        <td></td>
		        <td style="font-size: 20px" align="center">Pelaihari, <?php echo tgl_indo(date('Y-m-d'));?><br>
				Kepala Dinas

		        <br><br><br><br><br><u>Drs. H.M. Rafiki Efendi, M.SI</u>
				</td>
		    </tr>
		</table>
	</div>
</body>
</html>
