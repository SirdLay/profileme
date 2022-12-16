 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar mt-10">
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">


        <?php if (is_admin()): ?>
          <li class="<?php if(isset($page_title) && $page_title == "Dashboard"){echo "active";} ?>">
            <a href="<?php echo base_url('admin/dashboard') ?>">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
          </li>

          <li class="<?php if(isset($page_title) && $page_title == "Settings"){echo "active";} ?>">
            <a href="<?php echo base_url('admin/settings') ?>">
              <i class="fa fa-cog"></i> <span>Settings</span>
            </a>
          </li>

          <li class="<?php if(isset($page_title) && $page_title == "Users"){echo "active";} ?>">
            <a href="<?php echo base_url('admin/users') ?>">
              <i class="fa fa-users"></i> <span>Users</span>
            </a>
          </li>


          <li class="<?php if(isset($page_title) && $page_title == "Service"){echo "active";} ?>">
            <a href="<?php echo base_url('admin/services') ?>">
              <i class="fa fa-cog"></i> <span>Services</span>
            </a>
          </li>

          <li class="<?php if(isset($page_title) && $page_title == "Features"){echo "active";} ?>">
            <a href="<?php echo base_url('admin/package') ?>">
              <i class="fa fa-money"></i> <span>Pricing Package</span>
            </a>
          </li>

          <li class="<?php if(isset($page_title) && $page_title == "Feature"){echo "active";} ?>">
            <a href="<?php echo base_url('admin/feature') ?>">
              <i class="fa fa-bars"></i> <span>Package Features</span>
            </a>
          </li>

          <li class="<?php if(isset($page_title) && $page_title == "Pages"){echo "active";} ?>">
            <a href="<?php echo base_url('admin/pages') ?>">
              <i class="fa fa-file-text-o"></i> <span>Pages</span>
            </a>
          </li>

        <?php else: ?>
        
 
        <li class="<?php if(isset($page_title) && $page_title == "Profile"){echo "active";} ?>">
          <a href="<?php echo base_url('admin/profile') ?>">
            <i class="fa fa-dashboard"></i> <span>My Profile</span>
          </a>
        </li>
        
        <?php if (user()->account_type == 'pro'): ?>
          
        <li class="<?php if(isset($page_title) && $page_title == "Service"){echo "active";} ?>">
          <a href="<?php echo base_url('admin/service') ?>">
            <i class="fa fa-cog"></i> <span>Services</span>
          </a>
        </li>

        <li class="<?php if(isset($page_title) && $page_title == "Skills"){echo "active";} ?>">
          <a href="<?php echo base_url('admin/skill') ?>">
            <i class="fa fa-cogs"></i> <span>Skills</span>
          </a>
        </li>

        <li class="<?php if(isset($page_title) && $page_title == "Experience"){echo "active";} ?>">
          <a href="<?php echo base_url('admin/experience') ?>">
            <i class="fa fa-book"></i> <span>Experience</span>
          </a>
        </li>

        <li class="<?php if(isset($page_title) && $page_title == "Testimonial"){echo "active";} ?>">
          <a href="<?php echo base_url('admin/testimonial') ?>">
            <i class="fa fa-comment-o"></i> <span>Testimonial</span>
          </a>
        </li>


        <li class="treeview <?php if(isset($page_title) && $page_title == "Portfolio " || isset($page) && $page == "Portfolio"){echo "active";} ?>">
          <a href="#"><i class="fa fa-user"></i>
            <span>Portfolio</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/portfolio_category') ?>"><i class="fa fa-circle"></i>Add Category </a></li>
            <li><a href="<?php echo base_url('admin/portfolio') ?>"><i class="fa fa-circle"></i>Portfolio</a></li>
          </ul>
        </li> 
        

        <li class="treeview <?php if(isset($page_title) && $page_title == "Blog " || isset($page) && $page == "Blog"){echo "active";} ?>">
          <a href="#"><i class="fa fa-file-text"></i>
            <span>Blog</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/blog_category') ?>"><i class="fa fa-circle"></i>Add Category </a></li>
            <li><a href="<?php echo base_url('admin/blog') ?>"><i class="fa fa-circle"></i>Blog Posts</a></li>
          </ul>
        </li> 

        <li class="<?php if(isset($page_title) && $page_title == "Appointment"){echo "active";} ?>">
          <a href="<?php echo base_url('admin/appointment') ?>">
            <i class="fa fa-calendar"></i> <span>Appointments</span>
          </a>
        </li>


        <li class="<?php if(isset($page_title) && $page_title == "Contact"){echo "active";} ?>">
          <a href="<?php echo base_url('admin/contact') ?>">
            <i class="fa fa-envelope"></i> <span>Contact Messages</span>
          </a>
        </li>

        <li class="<?php if(isset($page_title) && $page_title == "Upload"){echo "active";} ?>">
          <a href="<?php echo base_url('upload_cv') ?>">
            <i class="fa fa-cloud-upload"></i> <span>Upload CV</span>
          </a>
        </li>

        <?php endif; ?>

        <li class="<?php if(isset($page_title) && $page_title == "Change Password"){echo "active";} ?>">
          <a href="<?php echo base_url('change_password') ?>">
            <i class="fa fa-lock"></i> <span>Change Password</span>
          </a>
        </li>


        <?php endif ?>
        
      </ul>
    </section>
  </aside>