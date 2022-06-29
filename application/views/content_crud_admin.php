<?php 
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>

<?php $this->load->view('content_css')?>
<?php $this->load->view('content_header')?>
<?php $this->load->view('content_menu_admin')?>
        
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
<div id="JabatModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content" style="width:1000px; margin-left: -150px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ambil Data Jabatan</h4>
      </div>
      <div class="modal-body">
                        <table id="pempol1" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Jabatan</th>
                                    <th>Keterangan</th>

                                    <th>Pilih</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            $jabatan = $this->db->query(" SELECT * FROM jabatan ORDER BY id ASC")->result();
                             foreach ($jabatan as $key): ?>
                            <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $key->nama_jabatan ?></td>
                            <td><?php echo $key->keterangan ?></td>
                             
                              <td><button class="jabatan"
                              
                               data-nim1="<?php echo $key->nama_jabatan ?>"

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
   $(document).on('click', '.jabatan', function (e) {
        document.getElementById("jabatan").value = $(this).attr('data-nim1');

        $('#JabatModal').modal('hide');
       });
</script>
<!-- batas modal -->

<!-- modal -->
<div id="NIKModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content" style="width:1000px; margin-left: -150px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ambil Data Pegawai</h4>
      </div>
      <div class="modal-body">
                        <table id="pempol2" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>

                                    <th>Pilih</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            $pegawai = $this->db->query(" SELECT * FROM pegawai where role = 'pegawai' ORDER BY id ASC")->result();
                             foreach ($pegawai as $key): ?>
                            <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $key->nik ?></td>
                            <td><?php echo $key->nama ?></td>
                            <td><?php echo $key->jabatan ?></td>
                             
                              <td><button class="NIK"
                              
                               data-nim1="<?php echo $key->nik ?>"
                               data-nim2="<?php echo $key->nama ?>"
                               data-nim3="<?php echo $key->jabatan ?>"

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
   $(document).on('click', '.NIK', function (e) {
        document.getElementById("nik").value = $(this).attr('data-nim1');
        document.getElementById("nama").value = $(this).attr('data-nim2');
        document.getElementById("jabatan").value = $(this).attr('data-nim3');

        $('#NIKModal').modal('hide');
       });
</script>
<!-- batas modal -->


<!-- modal -->
<div id="kegiatanModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content" style="width:1000px; margin-left: -150px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ambil Data Pegawai</h4>
      </div>
      <div class="modal-body">
                        <table id="pempol3" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>No Telepon</th>
                                    <th>Jabatan</th>

                                    <th>Pilih</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            $pegawai = $this->db->query(" SELECT * FROM pegawai where role = 'pegawai' ORDER BY id ASC")->result();
                             foreach ($pegawai as $key): ?>
                            <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $key->nik ?></td>
                            <td><?php echo $key->nama ?></td>
                            <td><?php echo $key->no_telepon ?></td>
                            <td><?php echo $key->jabatan ?></td>
                             
                              <td><button class="kegiatanModal"
                              
                               data-nim1="<?php echo $key->nik ?>"
                               data-nim2="<?php echo $key->nama ?>"
                               data-nim3="<?php echo $key->jabatan ?>"
                               data-nim4="<?php echo $key->no_telepon ?>"

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
   $(document).on('click', '.kegiatanModal', function (e) {
        document.getElementById("nik").value = $(this).attr('data-nim1');
        document.getElementById("field-nama").value = $(this).attr('data-nim2');
        document.getElementById("field-jabatan").value = $(this).attr('data-nim3');
        document.getElementById("field-no_telepon").value = $(this).attr('data-nim4');

        $('#kegiatanModal').modal('hide');
       });
</script>
<!-- batas modal -->


<!-- modal -->
<div id="sppdModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content" style="width:1000px; margin-left: -150px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ambil Data Pegawai</h4>
      </div>
      <div class="modal-body">
                        <table id="pempol4" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>No Telepon</th>
                                    <th>Jabatan</th>

                                    <th>Pilih</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            $pegawai = $this->db->query(" SELECT * FROM pegawai where role = 'pegawai' ORDER BY id ASC")->result();
                             foreach ($pegawai as $key): ?>
                            <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $key->nik ?></td>
                            <td><?php echo $key->nama ?></td>
                            <td><?php echo $key->no_telepon ?></td>
                            <td><?php echo $key->jabatan ?></td>
                             
                              <td><button class="sppdModal"
                              
                               data-nim1="<?php echo $key->nik ?>"
                               data-nim2="<?php echo $key->nama ?>"
                               data-nim3="<?php echo $key->jabatan ?>"
                               data-nim4="<?php echo $key->no_telepon ?>"

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
   $(document).on('click', '.sppdModal', function (e) {
        document.getElementById("nik").value = $(this).attr('data-nim1');
        document.getElementById("nama").value = $(this).attr('data-nim2');
        document.getElementById("jabatan").value = $(this).attr('data-nim3');
        document.getElementById("field-no_telepon").value = $(this).attr('data-nim4');

        $('#sppdModal').modal('hide');
       });
</script>
<!-- batas modal -->


<!-- modal -->
<div id="tugasModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content" style="width:1000px; margin-left: -150px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ambil Data Pegawai</h4>
      </div>
      <div class="modal-body">
                        <table id="pempol5" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>No Telepon</th>
                                    <th>Jabatan</th>

                                    <th>Pilih</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            $pegawai = $this->db->query(" SELECT * FROM pegawai where role = 'pegawai' ORDER BY id ASC")->result();
                             foreach ($pegawai as $key): ?>
                            <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $key->nik ?></td>
                            <td><?php echo $key->nama ?></td>
                            <td><?php echo $key->no_telepon ?></td>
                            <td><?php echo $key->jabatan ?></td>
                             
                              <td><button class="tugasModal"
                              
                               data-nim1="<?php echo $key->nik ?>"
                               data-nim2="<?php echo $key->nama ?>"
                               data-nim3="<?php echo $key->jabatan ?>"
                               data-nim4="<?php echo $key->no_telepon ?>"

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
   $(document).on('click', '.tugasModal', function (e) {
        document.getElementById("nik").value = $(this).attr('data-nim1');
        document.getElementById("nama").value = $(this).attr('data-nim2');
        document.getElementById("jabatan").value = $(this).attr('data-nim3');
        document.getElementById("field-no_telepon").value = $(this).attr('data-nim4');

        $('#tugasModal').modal('hide');
       });
</script>
<!-- batas modal -->



<!-- modal -->
<div id="suratKeluar" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content" style="width:1000px; margin-left: -150px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ambil Data Surat Keluar</h4>
      </div>
      <div class="modal-body">
                        <table id="pempol6" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Surat</th>
                                    <th>Tujuan</th>
                                    <th>Perihal</th>
                                    <th>Sifat</th>
                                    <th>Pilih</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            $data = $this->db->query(" SELECT * FROM surat_keluar where verifikasi = 'Diizinkan' ORDER BY id ASC")->result();
                             foreach ($data as $key): ?>
                            <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $key->no_surat ?></td>
                            <td><?php echo $key->tujuan ?></td>
                            <td><?php echo $key->perihal ?></td>
                            <td><?php echo $key->sifat ?></td>
                             
                              <td><button class="suratKeluar"
                              
                               data-nim1="<?php echo $key->no_surat ?>"
                               data-nim2="<?php echo $key->tujuan ?>"
                               data-nim3="<?php echo $key->perihal ?>"
                               data-nim4="<?php echo $key->sifat ?>"

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
   $(document).on('click', '.suratKeluar', function (e) {
        document.getElementById("no_surat_keluar").value = $(this).attr('data-nim1');
        document.getElementById("field-tujuan").value = $(this).attr('data-nim2');
        document.getElementById("field-perihal").value = $(this).attr('data-nim3');
        document.getElementById("field-sifat").value = $(this).attr('data-nim4');

        $('#suratKeluar').modal('hide');
       });
</script>
<!-- batas modal -->
