
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4 sidebar-dark-info">
    <!-- Brand Logo -->
    <a href="<?php echo BASE_URL.ADMIN_DIR; ?>/dashboard" class="brand-link navbar-info text-white">
      <img src="<?php echo BASE_URL ?>uploads/site/icon.jpg" alt="<?php echo BASE_URL ?>" class="brand-image img-circle elevation-3"
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
            <a href="<?php echo BASE_URL.ADMIN_DIR; ?>/dashboard" class="d-block"><?php echo $login_user['first_name'];?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview <?php echo ($url['1']=="dashboard")? "menu-open":""; ?>">
              <a href="<?php echo BASE_URL.ADMIN_DIR; ?>/dashboard" class="nav-link <?php echo ($url['1']=="dashboard")? "active":""; ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
         </li>
         
          <li class="nav-item">
            <a href="<?php echo BASE_URL.ADMIN_DIR; ?>/cash-book" class="nav-link <?php echo ($url['1']=="cash-book")? "active":""; ?>">
              <i class="nav-icon fas fa-cash-register"></i>
              <p>
                Cash Book
             </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?php echo BASE_URL.ADMIN_DIR; ?>/sale-purchase" class="nav-link <?php echo ($url['1']=="sale-purchase")? "active":""; ?>">
              <i class="nav-icon fas fa-book-open"></i>
              <p>
                Sale/Purchase
             </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?php echo BASE_URL.ADMIN_DIR; ?>/ledger" class="nav-link <?php echo ($url['1']=="ledger")? "active":""; ?>">
              <i class="nav-icon fas fa-clipboard"></i>
              <p>
                Ledger
             </p>
            </a>
          </li>
          
          
          <li class="nav-item">
            <a href="<?php echo BASE_URL.ADMIN_DIR; ?>/head-list" class="nav-link <?php echo ($url['1']=="head-list")? "active":""; ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Head List
             </p>
            </a>
          </li>
          
          <li class="nav-item has-treeview <?php echo ($url['1']=="users")? "menu-open":""; ?>">
            <a href="#" class="nav-link <?php echo ($url['1']=="users")? "active":""; ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                <i class="fas fa-angle-left right"></i>
                <!--<span class="badge badge-info right">6</span>-->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo BASE_URL.ADMIN_DIR; ?>/users/member" class="nav-link <?php echo ($url['1']=="users" && $url['2']=="member")? "active":""; ?>">
                  <i class="fa fa-user-secret"></i>
                  <p>Members</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo BASE_URL.ADMIN_DIR; ?>/users/administrator" class="nav-link <?php echo ($url['1']=="users" && $url['2']=="administrator")? "active":""; ?>">
                  <i class="fas fa-life-ring"></i>
                  <p>Administrator</p>
                </a>
              </li>
             
            </ul>
          </li>
          
<!--          <li class="nav-item has-treeview <?php echo ($url['1']=="available-properties" || $url['1']=="other-properties")? "menu-open":""; ?>">
            <a href="#" class="nav-link <?php echo ($url['1']=="available-properties" || $url['1']=="other-properties")? "active":""; ?>">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Properties
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo BASE_URL.ADMIN_DIR; ?>/available-properties" class="nav-link <?php echo ($url['1']=="available-properties")? "active":""; ?>">
                  <i class="fas fa-building"></i>
                  <p>Available</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="<?php echo BASE_URL.ADMIN_DIR; ?>/other-properties" class="nav-link <?php echo ($url['1']=="other-properties")? "active":""; ?>">
                  <i class="fas fa-building"></i>
                  <p>Other</p>
                </a>
              </li>
            </ul>
          </li>-->
          
<!--          <li class="nav-item has-treeview <?php echo ($url['1']=="pending-offers" || $url['1']=="other-offers")? "menu-open":""; ?>">
              
            <a href="#" class="nav-link <?php echo ($url['1']=="pending-offers" || $url['1']=="other-offers")? "active":""; ?>">
              <i class="nav-icon fas fa-money-bill"></i>
              <p>
                Offers
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
              
            <ul class="nav nav-treeview">
                
              <li class="nav-item">
                <a href="<?php echo BASE_URL.ADMIN_DIR; ?>/pending-offers" class="nav-link <?php echo ($url['1']=="pending-offers")? "active":""; ?>">
                  <i class="fas fa-business-time"></i>
                  <p>Pending</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="<?php echo BASE_URL.ADMIN_DIR; ?>/other-offers" class="nav-link <?php echo ($url['1']=="other-offers")? "active":""; ?>">
                  <i class="fas fa-briefcase"></i>
                  <p>Other</p>
                </a>
              </li>
              
              
            </ul>
          </li>-->
          
<!--          <li class="nav-item has-treeview <?php echo ($url['1']=="pending-wanted" || $url['1']=="other-wanted")? "menu-open":""; ?>">
              
            <a href="#" class="nav-link <?php echo ($url['1']=="pending-wanted" || $url['1']=="other-wanted")? "active":""; ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Wanted
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
              
            <ul class="nav nav-treeview">
                
              <li class="nav-item">
                <a href="<?php echo BASE_URL.ADMIN_DIR; ?>/pending-wanted" class="nav-link <?php echo ($url['1']=="pending-wanted")? "active":""; ?>">
                  <i class="fas fa-business-time"></i>
                  <p>Pending</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="<?php echo BASE_URL.ADMIN_DIR; ?>/other-wanted" class="nav-link <?php echo ($url['1']=="other-wanted")? "active":""; ?>">
                  <i class="fas fa-briefcase"></i>
                  <p>Other</p>
                </a>
              </li>
              
            </ul>
          </li>-->
          
          
          

          
          <li class="nav-header">Setting</li>
          <li class="nav-item has-treeview <?php echo ($url['1']=="product-list")? "menu-open":""; ?>">
            <a href="#" class="nav-link <?php echo ($url['1']=="product-list")? "active":""; ?>">
              <i class="nav-icon fab fa-product-hunt"></i>
              <p>
                Product
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo BASE_URL.ADMIN_DIR; ?>/product-list" class="nav-link <?php echo ($url['1']=="product-list")? "active":""; ?>">
                  <i class="fas fa-list-ul"></i>
                  <p>Product List</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item has-treeview <?php echo ($url['1']=="app-basic")? "menu-open":""; ?>">
            <a href="#" class="nav-link <?php echo ($url['1']=="app-basic")? "active":""; ?>">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                App Setting
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo BASE_URL.ADMIN_DIR; ?>/app-basic" class="nav-link <?php echo ($url['1']=="app-basic")? "active":""; ?>">
                  <i class="fas fa-cog"></i>
                  <p>Application Basic</p>
                </a>
              </li>
            </ul>
          </li>
          
         
          
          <li class="nav-header">Others</li>
          <li class="nav-item">
            <a href="<?php echo BASE_URL.ADMIN_DIR ?>/logout" class="nav-link">
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
