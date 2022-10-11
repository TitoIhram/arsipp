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
                <center><div class="box-title">About</div></center>
            </div><!-- /.box-header -->
            


            <div class="media">
                <div class="media-left">
                    <a href="#">
                        <img class="media-object" src="./assets/foto/copy.jpg" alt="Abdul Malik" width="200" height="256">
                    </a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Aplikasi ini dibuat oleh: </h4>
                    <table>
                        <tr>
                            <th>Nama : </th>
                            <td> Tito Ihram Nurul Raharjo</td>
                        </tr>
                        <tr>
                            <th>NIM : </th>
                            <td>1931730024</td>
                        </tr>
                        <tr>
                            <th>Tanggal: </th>
                            <td> 09 Oktober 2022</td>
                        </tr>

                    </table>
                </div>
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