<?php 
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>

<?php $this->load->view('content_css')?>
<?php $this->load->view('content_header')?>
<?php $this->load->view('content_menu_admin')?>
        
<div class="page-wrapper">
    	<div class="container-fluid">
        	<div class="row page-titles">
					<h4 style="color: red" class="text-themecolor">
					Laporan Surat Tugas Berdasarkan Tanggal Surat
					</h4>
				<br>
				<br>
            <div class="col-md-12 col-8 align-self-center">
					<form action="<?= site_url('laporan/rekap_surat_tugas') ?>" method="post" target="_blank">
					<div class="input-group ">

							<button type="button" style=" font-weight: bold; background-color: #000000; color: #fff;" class="btn">Bulan, Tahun</button>
          					<input type="month" class="col-md-3" name="bulan" required>&nbsp;&nbsp;
						 
						 <!-- <button type="button" style=" font-weight: bold; background-color: #000000; color: #fff;" class="btn">Dari</button>
          					<input type="date" class="col-md-2" name="tanggal1" required>&nbsp;&nbsp;
						
            				<button type="button" style=" margin-left: 5px; font-weight: bold; background-color: #000000; color: #fff;" class="btn">Sampai</button>
  							<input type="date" class="col-md-2" name="tanggal2" required> -->

							  <!-- <select name="bulan" id="bulan" class="form-control col-md-4">
							  <option value="" selected>---Pilih----</option>
							  <option value="semua">Semua</option>
							  <option value="-01-">Januari</option>
							  <option value="-02-">Februari</option>
							  <option value="-03-">Maret</option>
							  <option value="-04-">April</option>
							  <option value="-05-">Mei</option>
							  <option value="-06-">Juni</option>
							  <option value="-07-">Juli</option>
							  <option value="-08-">Agustus</option>
							  <option value="-09-">September</option>
							  <option value="-10-">Oktober</option>
							  <option value="-11-">November</option>
							  <option value="-11-">Desember</option>
							  </select> -->

						<span>
           				<button style="font-weight: bold; background-color: #000000; color: #fff;" type="submit" class="btn ml-2">Cetak</button>
						</span>
					</div>        
					</form>
				<div>
			</div>
        </div>
	</div>
            <div class="row">
	            <?php 
								$header = base_url('assets/kop.png'); echo "<center><img src='".$header."' width=0 ></center>";
							?>
              <?php echo $output?>
            </div>
          </div>

		<?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
    
    <?php $this->load->view('content_footer2')?>
