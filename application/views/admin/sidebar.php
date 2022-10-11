  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url('image/avatar.png') ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('nama'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
      
        <!-- Menu Home -->
        <li <?= $this->uri->segment(1) == 'home' ? 'class="active"' : '' ?>>
          <a href="<?php echo base_url('home'); ?>"><i class="fa fa-home"></i>
            <span>Arsip</span>
          </a>
        </li>
        <li <?= $this->uri->segment(1) == 'home_about' ? 'class="active"' : '' ?>>
          <a href="<?php echo base_url('home_about'); ?>"><i class="fa fa-address-card"></i>
            <span>About</span>
          </a>
        </li>


        <!-- Dashboard ADMIN -->
      <?php if ($this->session->userdata('status') == 'admin_login') { ?>
        
            
            
             

        
        
        <!-- Dashboard GURU -->
      <?php } else if ($this->session->userdata('status') == 'guru_login') { ?>


        <li class="treeview <?= $this->uri->segment(1) == 'soal' || $this->uri->segment(1) == 'soal_ujian' ? 'active' : '' ?>">
         
            <li <?= $this->uri->segment(1) == 'soal_ujian' ? 'class="active"' : '' ?>>
              <a href="<?php echo base_url('soal_ujian'); ?>"><i class="fa fa-circle-o"></i> Kelola Soal Ujian</a>
            </li>
           
        </li>

      <?php } ?>

        <!-- <li <?= $this->uri->segment(1) == 'password' ? 'class="active"' : '' ?>>
          <a href="<?php echo base_url('password'); ?>"><i class="fa fa-lock"></i>
            <span>Ganti Password</span>
          </a>
        </li> -->

        <li>
          <a href="<?php echo base_url('logout'); ?>"><i class="fa fa-power-off"></i>
            <span>Keluar Akun</span>
          </a>
        </li>


      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">