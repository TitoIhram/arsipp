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
      <div class="box box-success" style="overflow-x: scroll;">
        <div class="box-header with-border">
         <center><h4 class="box-title">Edit Data</h4></center>
        </div>
        <!-- /.box-header -->
        <?php foreach($home as $srt) {?>

        <?php echo form_open_multipart('home/update'); ?>
            <div class="form-group">
                <label>Nomor Surat</label>
                <input type="hidden" name="id" class="form-control" value="<?php echo $srt->id ?>">
                <input type="varchar" name="nomor" class="form-control" value="<?php echo $srt->nomor ?>">
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <select name="kategori" class="form-control" required>
                    <option <?php if($srt->kategori == "Undangan"){echo 'selected="selected"';} ?>>Undangan</option>
                    <option <?php if($srt->kategori == "Pengumuman"){echo 'selected="selected"';} ?>>Pengumuman</option>
                    <option <?php if($srt->kategori == "Nota Dinas"){echo 'selected="selected"';} ?>>Nota Dinas</option>
                    <option <?php if($srt->kategori == "Pemberitahuan"){echo 'selected="selected"';} ?>>Pemberitahuan</option>
                </select>
            </div>
            <div class="form-group">
                <label>Judul</label>
                <input type="text" name="judul" class="form-control" value="<?php echo $srt->judul ?>">
            </div>
            <div class="form-group">
                <label>Ubah Dokumen / File*</label>
                <input type="file" name="dokumen" class="form-control">
            </div>

            
            <a href="<?=base_url('home')?>" class="btn btn-default btn-flat"><span class="fa fa-arrow-left"></span> Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        <?php echo form_close(); ?>
            <?php } ?>
      </div>
    </div>
  </div>

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