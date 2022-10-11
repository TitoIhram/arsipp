<?php
$this->load->view('admin/head');
?>
<!--tambahkan custom css disini-->

<?php
$this->load->view('admin/topbar');
$this->load->view('admin/sidebar');
?>

<!-- Content Header (Page header) -->


<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-success" style="overflow-x: scroll;">
        <div class="box-header with-border">
         <center><h4 class="box-title">Detail Data</h4></center>
        </div>
        <!-- /.box-header -->
        <div class="table">
            <div class="form-group">
               <th><b>Nomor Surat : </b></th>
                <td><b><?php echo $detail->nomor ?></b></td>
            </div>
            <div class="form-group">
                 <th><b>Kategori : </b></th>
                <td><b><?php echo $detail->kategori ?></b></td>
            </div>
            <div class="form-group">
                <th><b>Judul : </b></th>
                <td><b><?php echo $detail->judul ?></b></td>
            </div>
            <div class="form-group">
                <th><b>Waktu Pengarsipan : </b></th>
                <td><b><?php echo $detail->waktu ?></b></td>
            </div>
        </div>
              
      </div>
    </div>
  </div>

</section><!-- /.content -->

<section>
    <tr>
                <td>
                    <iframe src="<?php echo base_url(); ?>assets/dokumen/<?php echo $detail->dokumen ?>" frameborder="0" width="100%" height="700px"></iframe>
                </td>
            </tr>
</section><br>
<a href="<?=base_url('home')?>" class="btn btn-default btn-flat"><span class="fa fa-arrow-left"></span> Kembali</a>
<a href="<?= base_url() . 'home/download/' . $detail->id; ?>" class="btn btn-primary">Unduh <span title="Ubah" class="fa fa-download"></span ></a>
<a href="<?= base_url() . 'home/edit/' . $detail->id; ?>" class="btn btn-primary">Ubah <span title="Ubah" class="fa fa-edit"></span></a>

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