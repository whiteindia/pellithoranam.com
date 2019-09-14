
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url(); ?>assets/images/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Admin</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form method="post" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-building-o"></i>
                <span>Test</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              	<li><a href="<?php echo base_url(); ?>welcome"><i class="fa fa-circle-o text-aqua"></i> test 1</a></li>
                <li><a href="<?php echo base_url(); ?>welcome"><i class="fa fa-circle-o text-aqua"></i> test 2</a></li>
                <li><a href="<?php echo base_url(); ?>welcome"><i class="fa fa-circle-o text-aqua"></i> test 3</a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="<?php echo base_url(); ?>/welcome/test">
                <i class="fa fa-user"></i>
                <span>Test 1</span>
              </a>
            </li>

            
            
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
