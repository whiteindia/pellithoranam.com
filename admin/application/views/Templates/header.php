<?php  /* $uid=$this->session->userdata('logged_in_admin')['user_id'];
$ci =&get_instance(); 
$ci->load->model('Staff_model',TRUE);
$staff_roles=$ci->Staff_model->get_staff_role($uid);*/
$settings = get_settings();
?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="<?php echo $settings->icon; ?>">
  <title><?php echo $title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="description" content="">
  <meta name="author" content="">

  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
  <link href="<?php echo base_url();?>/assets/css/charisma-app.css" rel="stylesheet">
  <link href="<?php echo base_url();?>/assets/css/colorbox.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">-->
  
  
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/datepicker3.css">

  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/blue.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-jvectormap-1.2.2.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/_all-skins.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/select2.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/TableTools.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/AdminLTE.min.css">


    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/pace.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom-style.css">
    
    <!--time picker-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-timepicker.min.css">
    <!--time picker-->
    <link href="<?php echo base_url();?>assets/css/morris.css" rel="stylesheet">

    <script src="<?php echo base_url();?>/assets/js/jquery.min.js"></script>    
    <link href="<?php echo base_url();?>assets/parsley/parsley.css" rel="stylesheet">
  </head>

   <body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url(); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>PT</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b></b>Pellithoranam</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo $this->session->userdata('profile_pic'); ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata('logged_in_admin')['username']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo $this->session->userdata('profile_pic'); ?>" class="img-circle" alt="User Image">

              </li>
              <!-- Menu Body -->

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url(); ?>manage/admin_profile" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url(); ?>dashboard_ctrl/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>

            </ul>
          </li>

        </ul>
      </div>
    </nav>
  </header>

  
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $this->session->userdata('profile_pic'); ?>" class="img-circle" alt="User Image">
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
      <?php  if($this->session->userdata('logged_in_admin')['user_type']=='2') {?>
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Matrimony Memebers</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
           <!--       <li><a href="<?php echo base_url(); ?>event/create"><i class="fa fa-circle-o text-yellow"></i> Create Event </a></li> -->
           <li><a href="<?php echo base_url(); ?>Customer/view_members"><i class="fa fa-circle-o text-yellow"></i> All Members</a></li>
          <li><a href="<?php echo base_url(); ?>Customer/view_profilepics"><i class="fa fa-circle-o text-yellow"></i>Members Profile Pic. Approval</a></li>
         <li><a href="<?php echo base_url(); ?>Customer/view_gallerypics"><i class="fa fa-circle-o text-yellow"></i>Members Gallery Approval</a></li>
          <li><a href="<?php echo base_url(); ?>Customer/view_idproof"><i class="fa fa-circle-o text-yellow"></i>Members ID Proofs</a></li>
          <li><a href="<?php echo base_url(); ?>Index_management/view_other_source"><i class="fa fa-circle-o text-yellow"></i>Members Deleted</a></li>
         </ul>
       </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-heart"></i>
            <span>Bridal collection</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
           <li><a href="<?php echo base_url(); ?>bridal"><i class="fa fa-circle-o text-yellow"></i> All collection</a></li>
          <li><a href="<?php echo base_url(); ?>bridal/add_collection"><i class="fa fa-circle-o text-yellow"></i>Add Collection</a></li>
         
         </ul>
       </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pencil"></i>
            <span>Pages</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
           <li><a href="<?php echo base_url(); ?>pages"><i class="fa fa-circle-o text-yellow"></i> All Pages</a></li>
          <li><a href="<?php echo base_url(); ?>pages/add_page"><i class="fa fa-circle-o text-yellow"></i>Add Pages</a></li>
         
         </ul>
       </li>
      <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Packages</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
           <li><a href="<?php echo base_url(); ?>Packages/view_packages"><i class="fa fa-circle-o text-yellow"></i> Add Packages</a></li>
          <li><a href="<?php echo base_url(); ?>Packages/view_manage_packages"><i class="fa fa-circle-o text-yellow"></i>Packages Details</a></li>
         </ul>
       </li>

        <?php /* <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Staff Management</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
           <li><a href="<?php echo base_url(); ?>Staff/view_super_admin"><i class="fa fa-circle-o text-yellow"></i> Super Admins</a></li>
           <li><a href="<?php echo base_url(); ?>Staff/view_staff"><i class="fa fa-circle-o text-yellow"></i>Admins</a></li>
          <!-- <li><a href="<?php echo base_url(); ?>Packages/view_manage_packages"><i class="fa fa-circle-o text-yellow"></i>State</a></li>
           <li><a href="<?php echo base_url(); ?>Packages/view_manage_packages"><i class="fa fa-circle-o text-yellow"></i>City</a></li> -->
         </ul>
       </li> */ ?>
       <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Index Management</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
          <li><a href="<?php echo base_url(); ?>Index_management/view_banner"><i class="fa fa-circle-o text-yellow"></i> Banner Management</a></li>
          <li><a href="<?php echo base_url(); ?>Index_management/view_content"><i class="fa fa-circle-o text-yellow"></i>Content Management</a></li>
          <li><a href="<?php echo base_url(); ?>Index_management/view_footer"><i class="fa fa-circle-o text-yellow"></i>Footer Management</a></li>
         </ul>
       </li>
      <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Classifieds Management</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
           <li><a href="<?php echo base_url(); ?>classifieds_management/view_approvals"><i class="fa fa-circle-o text-yellow"></i>Classifieds Approvals</a></li>
          <li><a href="<?php echo base_url(); ?>Staff/view_staff/classifieds"><i class="fa fa-circle-o text-yellow"></i>Classifieds Admins</a></li>
           <li><a href="<?php echo base_url(); ?>classifieds_management/view_providers"><i class="fa fa-circle-o text-yellow"></i>Classifieds Providers</a></li>
           <li><a href="<?php echo base_url(); ?>classifieds_management/view_categories"><i class="fa fa-circle-o text-yellow"></i>Classifieds Categories</a></li>
         </ul>
       </li>-->
       <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Success Stories</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
          <li><a href="<?php echo base_url(); ?>Index_management/view_success_story"><i class="fa fa-circle-o text-yellow"></i>Success Stories Management</a></li>  
         </ul>
       </li>
       <?php /* <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>News Letter</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
          
           <li><a href="<?php echo base_url(); ?>Settings_ctrl/add_newsletter"><i class="fa fa-circle-o text-yellow"></i>Send News Letter</a></li>
         
         </ul>
       </li> */ ?>
       <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Reports</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
           <li><a href="<?php echo base_url(); ?>Reports/view_result/search"><i class="fa fa-circle-o text-yellow"></i>Reports</a></li>
           <li><a href="<?php echo base_url(); ?>Reports/view_new_user"><i class="fa fa-circle-o text-yellow"></i>New users Registered</a></li>
           <li><a href="<?php echo base_url(); ?>Reports/view_inactive_user"><i class="fa fa-circle-o text-yellow"></i>Inactive users</a></li>
           <li><a href="<?php echo base_url(); ?>Reports/view_amount_report"><i class="fa fa-circle-o text-yellow"></i>View Earnings</a></li>
           <li><a href="<?php echo base_url(); ?>Reports/view_mobile"><i class="fa fa-circle-o text-yellow"></i>View mobile views</a></li>
         </ul>
       </li>
      <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Settings</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
           <?php /* <li><a href="<?php echo base_url(); ?>Settings_ctrl/view_parish"><i class="fa fa-circle-o text-yellow"></i>Parish</a></li>*/ ?>       
           <li><a href="<?php echo base_url(); ?>Settings_ctrl/view_country"><i class="fa fa-circle-o text-yellow"></i> Country</a></li>
           <li><a href="<?php echo base_url(); ?>Settings_ctrl/view_state"><i class="fa fa-circle-o text-yellow"></i>State</a></li>
           <li><a href="<?php echo base_url(); ?>Settings_ctrl/view_city"><i class="fa fa-circle-o text-yellow"></i>City</a></li>
           <li><a href="<?php echo base_url(); ?>Settings_ctrl/view_education"><i class="fa fa-circle-o text-yellow"></i>Education</a></li>
           <li><a href="<?php echo base_url(); ?>Settings_ctrl/view_occupation"><i class="fa fa-circle-o text-yellow"></i>Ocupation</a></li> 
           <li><a href="<?php echo base_url(); ?>Settings_ctrl/view_religion"><i class="fa fa-circle-o text-yellow"></i>Religion</a></li> 
           <li><a href="<?php echo base_url(); ?>Settings_ctrl/view_caste"><i class="fa fa-circle-o text-yellow"></i>Caste/Division</a></li>
           <li><a href="<?php echo base_url(); ?>Settings_ctrl/websettings"><i class="fa fa-circle-o text-yellow"></i>Web Settings</a></li>          
         </ul>
       </li>
       <!-- <li class="treeview">
        <a href="#">
          <i class="fa fa-user"></i>
          <span>Matrimony Approvals</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url(); ?>Customer/view_profilepic"><i class="fa fa-circle-o text-yellow"></i>Profile Picture Approval</a></li>
        </ul>
      </li> -->

    </ul>
    <?php }else if($this->session->userdata('logged_in_admin')['user_type']=='3') { ?>
<?php 
     $uid=$this->session->userdata('logged_in_admin')['user_id'];
     $query = $this->db->where('staff_id',$uid);
     $query = $this->db->get('staff_roles');
     $result = $query->row();

?>
          <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <?php if($result->matrimony_members==1) {?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Matrimony Memebers</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
           <!--       <li><a href="<?php echo base_url(); ?>event/create"><i class="fa fa-circle-o text-yellow"></i> Create Event </a></li> -->
           <li><a href="<?php echo base_url(); ?>Customer/view_members"><i class="fa fa-circle-o text-yellow"></i> All Members</a></li>
          <li><a href="<?php echo base_url(); ?>Customer/view_profilepics"><i class="fa fa-circle-o text-yellow"></i>Profile Picture Approval</a></li>
         <li><a href="<?php echo base_url(); ?>Customer/view_gallerypics"><i class="fa fa-circle-o text-yellow"></i>Gallery Picture Approval</a></li>
          <li><a href="<?php echo base_url(); ?>Customer/view_idproof"><i class="fa fa-circle-o text-yellow"></i>ID Proofs</a></li>
         </ul>
       </li>
        
    
        <?php } if($result->packages==1) {?>
      <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Packages</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
           <!--       <li><a href="<?php echo base_url(); ?>event/create"><i class="fa fa-circle-o text-yellow"></i> Create Event </a></li> -->
           <li><a href="<?php echo base_url(); ?>Packages/view_packages"><i class="fa fa-circle-o text-yellow"></i> View Packages</a></li>
          <li><a href="<?php echo base_url(); ?>Packages/view_manage_packages"><i class="fa fa-circle-o text-yellow"></i>Packages Management</a></li>
         </ul>
       </li>
    
         <?php } if($result->settings==1) {?>
      <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Settings</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
           <!--       <li><a href="<?php echo base_url(); ?>event/create"><i class="fa fa-circle-o text-yellow"></i> Create Event </a></li> -->
           <li><a href="<?php echo base_url(); ?>Settings_ctrl/view_country"><i class="fa fa-circle-o text-yellow"></i> Country</a></li>
           <li><a href="<?php echo base_url(); ?>Settings_ctrl/view_state"><i class="fa fa-circle-o text-yellow"></i>State</a></li>
           <li><a href="<?php echo base_url(); ?>Settings_ctrl/view_city"><i class="fa fa-circle-o text-yellow"></i>City</a></li>
            <li><a href="<?php echo base_url(); ?>Settings_ctrl/view_education"><i class="fa fa-circle-o text-yellow"></i>Education</a></li>
           <li><a href="<?php echo base_url(); ?>Settings_ctrl/view_occupation"><i class="fa fa-circle-o text-yellow"></i>Ocupation</a></li> 
           <li><a href="<?php echo base_url(); ?>Settings_ctrl/view_religion"><i class="fa fa-circle-o text-yellow"></i>Religion</a></li> 
           <li><a href="<?php echo base_url(); ?>Settings_ctrl/view_caste"><i class="fa fa-circle-o text-yellow"></i>Caste/Division</a></li>          
         </ul>
       </li>
        <?php } if($result->staff==1) {?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Staff</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
           <!--       <li><a href="<?php echo base_url(); ?>event/create"><i class="fa fa-circle-o text-yellow"></i> Create Event </a></li> -->
          <li><a href="<?php echo base_url(); ?>Staff/view_super_admin"><i class="fa fa-circle-o text-yellow"></i> Super Admin</a></li>
           <li><a href="<?php echo base_url(); ?>Staff/view_staff"><i class="fa fa-circle-o text-yellow"></i> Normal Admin</a></li>
          <!-- <li><a href="<?php echo base_url(); ?>Packages/view_manage_packages"><i class="fa fa-circle-o text-yellow"></i>State</a></li>
           <li><a href="<?php echo base_url(); ?>Packages/view_manage_packages"><i class="fa fa-circle-o text-yellow"></i>City</a></li> -->
         </ul>
       </li>
       <?php } if($result->index_management==1) {?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Index Management</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
           <!--       <li><a href="<?php echo base_url(); ?>event/create"><i class="fa fa-circle-o text-yellow"></i> Create Event </a></li> -->
           <li><a href="<?php echo base_url(); ?>Index_management/view_banner"><i class="fa fa-circle-o text-yellow"></i> Banner Management</a></li>
          <li><a href="<?php echo base_url(); ?>Index_management/view_content"><i class="fa fa-circle-o text-yellow"></i>Content Management</a></li>
           <li><a href="<?php echo base_url(); ?>Index_management/view_footer"><i class="fa fa-circle-o text-yellow"></i>Footer Management</a></li>
          <li><a href="<?php echo base_url(); ?>Index_management/view_ad"><i class="fa fa-circle-o text-yellow"></i>Ads Management</a></li>
         </ul>
       </li>
         <?php } if($result->classifieds_management==1) {?>
       <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Classifieds Management</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
           <!--       <li><a href="<?php echo base_url(); ?>event/create"><i class="fa fa-circle-o text-yellow"></i> Create Event </a></li> -->
           <li><a href="<?php echo base_url(); ?>classifieds_management/view_approvals"><i class="fa fa-circle-o text-yellow"></i>Classifieds Approvals</a></li>
          <li><a href="<?php echo base_url(); ?>Staff/view_staff/classifieds"><i class="fa fa-circle-o text-yellow"></i>Classifieds Admins</a></li>
           <li><a href="<?php echo base_url(); ?>classifieds_management/view_providers"><i class="fa fa-circle-o text-yellow"></i>Classifieds Providers</a></li>
         </ul>
       </li>
       <?php } ?>
       <!-- <li class="treeview">
        <a href="#">
          <i class="fa fa-user"></i>
          <span>Matrimony Approvals</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url(); ?>Customer/view_profilepic"><i class="fa fa-circle-o text-yellow"></i>Profile Picture Approval</a></li>
        </ul>
      </li> -->

    </ul>
    <?php } ?>
  </section>
  <!-- /.sidebar -->
</aside>

  

