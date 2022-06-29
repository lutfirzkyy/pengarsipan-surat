<?php 
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>

<?php $this->load->view('content_css')?>
<?php $this->load->view('content_header')?>
<?php $this->load->view('content_menu_dinas')?>
        
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

<!-- modal -->
<div id="disposisiModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content" style="width:1000px; margin-left: -150px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ambil Data Surat Masuk</h4>
      </div>
      <div class="modal-body">
                        <table id="pempol1" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Surat</th>
                                    <th>Tanggal Surat</th>
                                    <th>Pengirim</th>
                                    <th>Perihal</th>
                                    <th>Sifat</th>
                                    <th>Pilih</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            $surat_masuk = $this->db->query(" SELECT * FROM surat_masuk ORDER BY id ASC")->result();
                             foreach ($surat_masuk as $key): ?>
                            <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $key->no_surat ?></td>
                            <td><?php echo tgl_indo($key->tanggal_surat) ?></td>
                            <td><?php echo $key->pengirim ?></td>
                            <td><?php echo $key->perihal ?></td>
                            <td><?php echo $key->sifat ?></td>
                             
                              <td><button class="suratMasuk"
                              
                               data-nim1="<?php echo $key->no_surat ?>"
                               data-nim2="<?php echo $key->tanggal_surat ?>"
                               data-nim3="<?php echo $key->pengirim ?>"
                               data-nim4="<?php echo $key->perihal ?>"
                               data-nim5="<?php echo $key->sifat ?>"

                               >PILIH</button type="button" class="btn btn-primary"></td>

                            </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
      </div>
    </div>

  </div>
</div>
<script>
   $(document).on('click', '.suratMasuk', function (e) {
        document.getElementById("no_surat").value = $(this).attr('data-nim1');
        document.getElementById("tanggal_surat").value = $(this).attr('data-nim2');
        document.getElementById("pengirim").value = $(this).attr('data-nim3');
        document.getElementById("perihal").value = $(this).attr('data-nim4');
        document.getElementById("sifat").value = $(this).attr('data-nim5');

        $('#disposisiModal').modal('hide');
       });
</script>
<!-- batas modal -->


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