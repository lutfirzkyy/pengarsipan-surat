<?php $this->load->view('content_css')?>
<?php $this->load->view('content_header')?>
<?php $this->load->view('content_menu_dinas')?>
<style>
hr{
	color: #ffffff;
	
	}
</style>


	<div class="page-wrapper">
    	<div class="container-fluid">
        	<div class="row page-titles">
			</div>

			<!-- okok -->

			<div class="row page-titles">
				<div class="col-md-12">
                  
				<div class="row">
                  
				<div class="col-lg-4">
                        <div class="main-box-dull">
                                <h3 style="color: #ffffff;">Surat Keluar <br>Diajukan</h3>
								<hr size= "10px" color= "white" />
									<span style="font-size: 30px; color: white; font-weight: bold;">
									  	<?php echo $hitung_surat_keluar; ?>
									 </span>
                        </div>
                    </div>
				<div class="col-lg-4">
                        <div class="main-box-red">
                                <h3 style="color: #ffffff;">Surat Perjalanan Dinas <br>Diajukan</h3>
								<hr size= "10px" color= "white" />
									<span style="font-size: 30px; color: white; font-weight: bold;">
									  	<?php echo $hitung_sppd; ?>
									 </span>
                        </div>
                    </div>
                    
				<div class="col-lg-4">
                        <div class="main-box-orange">
                                <h3 style="color: #ffffff;">Surat Tugas <br>Belum Diverifikasi</h3>
								<hr size= "10px" color= "white" />
									<span style="font-size: 30px; color: white; font-weight: bold;">
									  	<?php echo $hitung_surat_tugas; ?>
									 </span>
                        </div>
                    </div>
                    
				<!-- <div class="col-lg-4">
                        <div class="main-box-yel">
                                <h3 style="color: #ffffff;">Surat Izin <br>Diajukan</h3>
								<hr size= "10px" color= "white" />
									<span style="font-size: 30px; color: white; font-weight: bold;">
									  	<?php echo $hitung_surat_izin; ?>
									 </span>
                        </div>
                    </div> -->
                    
                  
                    
					</div>
				
	</div>
	</div>
	<!-- okok -->

		<!-- tes -->
		<div class="row page-titles">
                <div class="container-fluid">
      				<div class="row">
      				  <img width="100%" src="<?= base_url()?>assets/kantor2.png">
      				  </div>
 				</div>
        </div>
		<!-- tes -->
			
	</div>
	</div>
	</div>
	</div>
           
<?php $this->load->view('content_footer')?>
