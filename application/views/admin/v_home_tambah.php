<?php
$this->load->view('admin/head');
?>
<!--tambahkan custom css disini-->

<?php
$this->load->view('admin/topbar');
$this->load->view('admin/sidebar');
?>

<!-- Content Header (Page header) -->


<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">

            <?= $this->session->flashdata('message'); ?>

            <div class="box box-success" style="overflow-x: scroll;">
              <div class="box-header">
                <center><div class="box-title">Tambah Data Arsip</div></center>
            </div><!-- /.box-header -->
            


                        <div class="modal-body">
                            <?php echo form_open_multipart('home_tambah/insert'); ?>
                            <div class="form-group">
                                <label>Nomor Surat*</label>
                                <input type="varchar" name="nomor" class="form-control" placeholder="Masukan Nomor Surat" required>
                            </div>

                            <div class="form-group">
                                <label>Kategori*</label>
                                <select name="kategori" class="form-control" required>
                                    <option>Undangan</option>
                                    <option>Pengumuman</option>
                                    <option>Nota Dinas</option>
                                    <option>Pemberitahuan</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Judul*</label>
                                <input type="varchar" name="judul" class="form-control" placeholder="Masukan Judul Surat" required>
                            </div>
                            <div class="form-group">
                                <label>Upload Dokumen / File*</label>
                                <input type="file" name="dokumen" class="form-control">
                            </div>
                            <a href="<?=base_url('home')?>" class="btn btn-default btn-flat"><span class="fa fa-arrow-left"></span> Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <?php echo form_close(); ?>
                            <p>* = Wajib diisi</p>
                        </div>
                    
            </div>
        </div>
        <!-- /.col-->
    </div>
    <!-- ./row -->
</section><!-- /.content -->

<?php
$this->load->view('admin/js');
?>

<!--tambahkan custom js disini-->

<script type="text/javascript">
    $(function() {
        $('#data-tables').dataTable();
    });

    $('.select2').select2();

    $('.alert-message').alert().delay(3000).slideUp('slow');
</script>


<?php
$this->load->view('admin/foot');
?>