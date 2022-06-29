<?php 
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>

<?php $this->load->view('content_css')?>
<?php $this->load->view('content_header')?>
<?php $this->load->view('content_menu_pegawai')?>
        
        <div class="page-wrapper">
            
            <div class="container-fluid">

                <div class="row" style="margin-top: 20px;">
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

