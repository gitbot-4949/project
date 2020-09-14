
   <aside class="main-sidebar" >
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $userPictureURL; ?>" id="imagePreview3" style="height: 45px; width: 45px; " class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $row['name']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        
       
       <li class="<?php if ($current_page=="index1") {echo "active"; }?>">
          <a href="index1.php">
            <i class="fa fa-dashboard" style="padding-left: 4px"></i> <span>Dashboard</span>
          </a>
        </li>        

        <li class="<?php if ($current_page=="manage-clients") {echo "active"; }?>">
          <a href="manage-clients.php">
            <i class="fa fa-fw fa-shield"></i> <span>Manage Clients</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>

        <li class="<?php if ($current_page=="manage-products") {echo "active"; }?>">
          <a href="manage-products.php">
            <i  class="fa fa-fw fa-gears"></i> <span>Manage Products</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>

         <li class="<?php if ($current_page=="manage-debitors") {echo "active"; }?>">
          <a href="sundry-debitors.php">
            <i class="fa fa-fw fa-qrcode"></i> <span>Manage Debitors</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>

        <li class="<?php if ($current_page=="manage-invoice") {echo "active"; }?> treeview">
          <a href="#">
            <i class="fa fa-fw fa-cloud-download"></i>
            <span>Manage Invoice</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if ($current_page1=="manage-prolist") {echo "active"; }?>"><a href="proforma-list.php"><i class="glyphicon glyphicon-floppy-saved"></i> Proforma Invoice List</a></li>
            <li class="<?php if ($current_page1=="manage-invlist") {echo "active"; }?>"><a href="inv-list.php"><i class="glyphicon glyphicon-barcode"></i> Tax Invoice List</a></li>
           
          </ul>
        </li>

        <li class="<?php if ($current_page=="manage-paidhistory") {echo "active"; }?>">
          <a href="paid-his.php">
            <i class="fa fa-fw fa-rupee"></i> <span>Paid History </span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>

        <li class="<?php if ($current_page=="generate-inv") {echo "active"; }?> treeview">
          <a href="#">
            <i class="fa fa-fw fa-print"></i> <span>Generate Invoice </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if ($current_page1=="gen-pro") {echo "active"; }?>"><a href="gen-pro.php"><i class="glyphicon glyphicon-floppy-saved"></i>Gen. Proforma Invoice </a></li>
            <li class="<?php if ($current_page1=="gen-inv") {echo "active"; }?>"><a href="gen-inv.php"><i class="glyphicon glyphicon-barcode"></i>Gen. Tax Invoice</a></li>
           
          </ul>
        </li>

         <li class="<?php if ($current_page=="generate-report") {echo "active"; }?>">
          <a href="Generate-report.php">
            <i class="fa fa-fw fa-file-excel-o" ></i> <span>Generate Report</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>

          <li class="<?php if ($current_page=="setting") {echo "active"; }?>">
          <a href="profile.php">
            <i class="fa fa-fw fa-gear" ></i> <span>Settings</span>
           
          </a>
        </li>

        <li>
          <a href="logout.php">
            <i class="fa fa-fw fa-power-off" ></i> <span>Logout</span>
            
          </a>
        </li>

      </ul>
      
    </section>
    <!-- /.sidebar -->
  </aside>