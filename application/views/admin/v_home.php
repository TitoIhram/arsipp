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
                <div class="box-header">
                    <center><h4 class="box-title">Arsip Surat</h4></center>
                </div>
                
                    <div class="box-footer">

                    </div>
                    <!-- /.box-footer -->
                </form>

            </div>
            <?= $this->session->flashdata('message'); ?>
            <!-- Default box -->
             <div class="box box-success" style="overflow-x: scroll;">
            <div class="box-header">
                <h3 class="box-title"></h3>
                
                

                <a href="<?= base_url('home_tambah') ?>"><button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#modal-default"><span class="fa fa-plus"></span> Tambah</button></a>

                <!-- <a href="<?php echo base_url('matapelajaran'); ?>"><button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#" ><span ></span>Data Mata Pelajaran</button></a> -->
            </div>

                    <table id="data" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th width="10%">Nomor Surat </th>
                                <th width="20%">Kategori</th>
                                <th>Judul</th>
                                <th width="13%">Waktu Pengarsipan</th>
                                <th width="20%">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($home as $d) { ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $d->nomor; ?></td>
                                    <td><?php echo $d->kategori; ?></td>
                                    <td><?php echo $d->judul; ?></td>
                                    <td><b><?php echo $d->waktu; ?></b></td>
                                    <td>
                                        <a href="<?= base_url() . 'home/detail/' . $d->id; ?>" class="btn btn-xs btn-success">Detail <span class="glyphicon glyphicon-search" title="Ubah"></span></a> |
                                        <a href="<?= base_url() . 'home/delete/' . $d->id; ?>" class="btn btn-xs btn-danger"> <span class="glyphicon glyphicon-trash" onclick="return confirm('Apakah yakin data ini akan di hapus?')" title="Hapus">Hapus</span></a> |
                                        <a href="<?= base_url() . 'home/download/' . $d->id; ?>" class="btn btn-xs btn-success">Download <span class="glyphicon glyphicon-download" title="Unduh"></span></a>
                                        
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.col-->
        </div>
        <!-- ./row -->
</section><!-- /.content -->

<!--<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel">Tambah Data Arsip</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <?php echo form_open_multipart('home/insert'); ?>
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><< Kembali</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            <?php echo form_close(); ?>
            <p>* = Wajib diisi</p>
        </div>
        <div class="modal-footer">
        </div>
        </div>
    </div>
    </div> -->




<?php
$this->load->view('admin/js');
?>
<!--tambahkan custom js disini-->
<script type="text/javascript">
    $(function() {
        $('#data').dataTable();
    });
    $('.select2').select2();
    $('.alert-message').alert().delay(3000).slideUp('slow');
    $('.alert-dismissible').alert().delay(3000).slideUp('slow');
</script>
<?php
$this->load->view('admin/foot');
?>