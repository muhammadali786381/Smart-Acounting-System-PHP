
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4 sidebar-dark-info">
    <!-- Brand Logo -->
    <a href="<?php echo BASE_URL; ?>dashboard" class="brand-link navbar-info text-white">
      <img src="<?php echo BASE_URL ?>uploads/site/<?php echo $view->app_config("APP_SIDEBAR_LOGO"); ?>" alt="<?php echo BASE_URL ?>" class="brand-image img-circle elevation-3"
           style="">
      <span class="brand-text font-weight-light"><?php echo $view->app_config("APP_DASHBOARD_NAME"); ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo BASE_URL ?>uploads/profile/<?php if(empty($login_user['profile_img'])){if($login_user['gender']=="Male"){echo "d-avatar.png";}else{echo "f-avatar.jpg";}}else {echo $login_user['profile_img'];} ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="<?php echo BASE_URL; ?>dashboard" class="d-block"><?php echo $login_user['first_name'];?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview <?php echo ($url['0']=="dashboard")? "menu-open":""; ?>">
              <a href="<?php echo BASE_URL; ?>dashboard" class="nav-link <?php echo ($url['0']=="dashboard")? "active":""; ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
         </li>
<!--          <li class="nav-item">
            <a href="<?php echo BASE_URL; ?>recent-activity" class="nav-link <?php echo ($url['0']=="recent-activity")? "active":""; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Recent Activity
                <span class="right badge badge-danger">1</span>
              </p>
            </a>
          </li>-->

          <li class="nav-item has-treeview <?php echo ($url['0']=="availforrent" || $url['0']=="availforsale" || $url['0']=="listofproperty")? "menu-open":""; ?>">
            <a href="#" class="nav-link <?php echo ($url['0']=="availforrent" || $url['0']=="availforsale" || $url['0']=="listofproperty")? "active":""; ?>">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Inventory
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"><?php echo $global_your_properties_total_available;?></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
                
              <li class="nav-item">
                <a href="<?php echo BASE_URL; ?>listofproperty" class="nav-link <?php echo ($url['0']=="listofproperty" )? "active":""; ?>">
                  <i class="fas fa-list"></i>
                  <p>Inventory List</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="<?php echo BASE_URL; ?>availforsale" class="nav-link <?php echo ($url['0']=="availforsale" )? "active":""; ?>">
                  <i class="fas fa-box-open"></i>
                  <p>Available For Sale</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="<?php echo BASE_URL; ?>availforrent" class="nav-link <?php echo ($url['0']=="availforrent")? "active":""; ?>">
                  <i class="fas fa-box-open"></i>
                  <p>Available For Rent</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item has-treeview <?php echo (
                  $url[0]=="addnewproperty" 
                    || $url['0']=="postbymeproperty" 
                    || $url['0']=="viewproperty"
                    || $url['0']=="myavail"
                    || $url['0']=="propertysoldbyme"
                    || $url['0']=="propertyrentedbyme"
                  
                  )?"menu-open":""; ?>">
            <a href="#" class="nav-link <?php echo (
                    $url[0]=="addnewproperty" 
                    || $url['0']=="postbymeproperty" 
                    || $url['0']=="viewproperty"
                    || $url['0']=="myavail"
                    || $url['0']=="propertysoldbyme"
                    || $url['0']=="propertyrentedbyme"
                    
                    )? "active":""; ?>">
              <i class="nav-icon fas fa-house-user"></i>
              <p>
                My Inventory
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"><?php echo $global_your_properties_total_available;?></span>
              </p>
            </a>
              
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo BASE_URL; ?>addnewproperty" class="nav-link <?php echo ($url['0']=="addnewproperty")? "active":""; ?>">
                  <i class="fas fa-plus-circle"></i>
                  <p>Add New Inventory</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="<?php echo BASE_URL; ?>postbymeproperty" class="nav-link <?php echo ($url['0']=="postbymeproperty" )? "active":""; ?>">
                  <i class="fas fa-user-check"></i>
                  <p>My Inventory</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="<?php echo BASE_URL; ?>myavail" class="nav-link <?php echo ($url['0']=="myavail" )? "active":""; ?>">
                  <i class="fas fa-list-alt"></i>
                  <p>My Available Inventory</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="<?php echo BASE_URL; ?>propertysoldbyme" class="nav-link <?php echo ($url['0']=="propertysoldbyme" )? "active":""; ?>">
                  <i class="fas fa-certificate"></i>
                  <p>Inventory Sold Out By Me</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="<?php echo BASE_URL; ?>propertyrentedbyme" class="nav-link <?php echo ($url['0']=="propertyrentedbyme" )? "active":""; ?>">
                  <i class="fas fa-certificate"></i>
                  <p>Inventory Rented Out By Me</p>
                </a>
              </li>
              
              
              
            </ul>
          </li>
          
          <li class="nav-item has-treeview <?php echo ($url['0']=="myoffers")? "menu-open":""; ?>">
            <a href="#" class="nav-link <?php echo ($url['0']=="myoffers")? "active":""; ?>">
              <i class="nav-icon fas fa-coffee"></i>
              <p>
                Offers
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"><?php echo $global_your_offers_sent;?></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo BASE_URL; ?>myoffers" class="nav-link <?php echo ($url['0']=="myoffers")? "active":""; ?>">
                  <i class="fas fa-list-alt"></i>
                  <p>My Offers List</p>
                </a>
              </li>
              
            </ul>
          </li>
          
          <li class="nav-item has-treeview <?php echo ($url['0']=="addwanted" || $url['0']=="mywanted")? "menu-open":""; ?>">
            <a href="#" class="nav-link <?php echo ($url['0']=="addwanted" || $url['0']=="mywanted")? "active":""; ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>
                My Wanted
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"><?php echo $global_your_wanted;?></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
                
               <li class="nav-item">
                <a href="<?php echo BASE_URL; ?>addwanted" class="nav-link <?php echo ($url['0']=="addwanted")? "active":""; ?>">
                  <i class="fas fa-plus-circle"></i>
                  <p>Add New Wanted</p>
                </a>
              </li> 
              
              <li class="nav-item">
                <a href="<?php echo BASE_URL; ?>mywanted" class="nav-link <?php echo ($url['0']=="mywanted")? "active":""; ?>">
                  <i class="fas fa-list-alt"></i>
                  <p>My Wanted List</p>
                </a>
              </li>
              
            </ul>
          </li>
          
          
          <li class="nav-item has-treeview <?php echo ($url['0']=="wantedlist")? "menu-open":""; ?>">
              
            <a href="#" class="nav-link <?php echo ($url['0']=="wantedlist")? "active":""; ?>">
              <i class="nav-icon fas fa-igloo"></i>
              <p>
                Wanted
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"><?php echo  $global_total_wanted-$global_your_wanted;?></span>
              </p>
            </a>
              
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo BASE_URL; ?>wantedlist" class="nav-link <?php echo ($url['0']=="wantedlist")? "active":""; ?>">
                  <i class="fas fa-list-alt"></i>
                  <p>Wanted List</p>
                </a>
              </li>
            </ul>
              
          </li>
          
<!--          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Charts
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ChartJS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Flot</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inline</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                UI Elements
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/UI/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>General</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/icons.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Icons</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/buttons.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buttons</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/sliders.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sliders</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/modals.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Modals & Alerts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/navbar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Navbar & Tabs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/timeline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Timeline</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/ribbons.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ribbons</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Forms
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/forms/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>General Elements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/advanced.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Advanced Elements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/editors.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Editors</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/validation.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Validation</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Tables
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/tables/simple.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Simple Tables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/data.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>DataTables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/jsgrid.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>jsGrid</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">EXAMPLES</li>
          <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Calendar
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Gallery
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Mailbox
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/mailbox/mailbox.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/compose.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Compose</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/read-mail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Read</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Pages
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/examples/invoice.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Invoice</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/profile.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/e-commerce.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>E-commerce</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/projects.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Projects</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/project-add.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/project-edit.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Edit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/project-detail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Detail</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/contacts.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contacts</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Extras
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/examples/login.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Login</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/register.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Register</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/forgot-password.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Forgot Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/recover-password.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Recover Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/lockscreen.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lockscreen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/legacy-user-menu.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Legacy User Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/language-menu.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Language Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/404.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Error 404</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/500.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Error 500</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/pace.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pace</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/blank.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blank Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="starter.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Starter Page</p>
                </a>
              </li>
            </ul>-->
          </li>
          <li class="nav-header">Accounts Details</li>
          
          <li class="nav-item">
            <a href="<?php echo BASE_URL ?>profile" class="nav-link <?php echo ($url['0']=="profile")? "active":""; ?>">
              <i class="nav-icon fa fa-user"></i>
              <p>My Profile</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?php echo BASE_URL ?>logout" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
