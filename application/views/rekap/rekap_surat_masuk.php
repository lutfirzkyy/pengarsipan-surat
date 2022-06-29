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

<?php
function bulan($tanggal)
{
    $bulan = array(
        1 =>   'JANUARI',
        'FEBRUARI',
        'MARET',
        'APRIL',
        'MEI',
        'JUNI',
        'JULI',
        'AGUSTUS',
        'SEPTEMBER',
        'OKTOBER',
        'NOVEMBER',
        'DESEMBER'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $bulan[(int) $pecahkan[1]];
}?>
<head>
<script>window.print()</script>
    <meta charset="UTF-8">
    <script>window.print()</script>
    <link rel="stylesheet" type="text/css" href="style.css">
    
    <title>Dinas Pariwisata Tanah Laut</title>
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url()?>assets/fantala.png">
    <style>
    .table1 {
    font-family: sans-serif;
    color: #444;
    border-collapse: collapse;
    width: 100%;
    border: 1px solid #000000;
}
 
.table1 tr th{
    background: #90EE90;
    color: 	#000000;
    font-weight: normal;
}
 
.table1, th, td {
    padding: 8px;
    text-align: center;
}
 
.table1 tr:hover {
    background-color: #E0FFFF;
}
 
.table1 tr:nth-child(even) {
    background-color: #f2f2f2;
}
    </style>
</head>
<img src="<?php echo base_url('assets/kop.png')?>" alt=""style="width :100%" />
<h4><p align="center">LAPORAN DATA SURAT MASUK</p></h4>
<body>
<table border="1" align="center" class="table1">
    <tr>
   
		<th>No</th>
		<th>No Surat</th>
		<th>Tanggal Surat</th>
        <th>Pengirim</th>
        <th>Perihal</th>
        <th>Sifat</th>
        <th>Lampiran</th>

        <?php $no = 1; foreach ($data as $key):?>
            <tr>
         
            <td><?php echo $no++?></td>
            <td><?php echo $key->no_surat?></td>
            <td><?php echo tgl_indo($key->tanggal_surat)?></td>
            <td><?php echo $key->pengirim ?></td>
            <td><?php echo $key->perihal ?></td>
            <td><?php echo $key->sifat ?></td>
            <td>
			<img src="<?php echo base_url().'assets/uploads/images/'.$key->lampiran;?>" alt="" width="70px">
            </td>

            </tr>
            <?php endforeach ?>
    </table>
    <br>
    <br>
    <table align="right" border="0">
		    <tr>
		        <td></td>
		        <td style="font-size: 20px" align="center">Pelaihari, <?php echo tgl_indo(date('Y-m-d'));?><br>
                Kepala Dinas,
                <br><br><br><u>Drs. H.M. Rafiki Efendi, M.SI</u>

				</td>
                <!-- <?php
        foreach ($data2 as $key2):?>
		        <br><br><br><u><?php echo $key2->nama ?></u>

                <br>NIP. <?php echo $key2->nip?>
            </td>
				<?php endforeach ?> -->
		    </tr>
		</table>
   
</body>
</body>
</html>
