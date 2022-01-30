<?php
   $session = session();
   if (!empty($session->get('first_name'))) {
      $displayName = $session->get('first_name')." ".$session->get('last_name');
   } else {
      $displayName = "Admin User";
   }
   
   ?>
<div class="sidebar" data-color="rose" data-background-color="black">
   <div class="logo">
      <a href="#" class="simple-text logo-mini">
      </a>
      <a href="#" class="simple-text logo-normal">
      <?php echo SITE_NAME ?>
      </a>
   </div>
   <div class="sidebar-wrapper">
      <div class="user">
         <div class="photo">
            <img src="<?php echo base_url() ?>/assets/admin/img/faces/default.png" style="border:2px solid #fff"/>
         </div>
         <div class="user-info">
            <a data-toggle="collapse" href="#collapseExample" class="username">
            <span>
            <?php echo $displayName ?><b class="caret"></b>
            </span>
            </a>   
            <div class="collapse" id="collapseExample">
              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span class="sidebar-mini"> EP </span>
                    <span class="sidebar-normal"> Edit Profile </span>
                  </a>
                </li>
              </ul>
            </div>             
         </div>
      </div>
      <ul class="nav">
         <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url() ?>/admin">
               <i class="material-icons">dashboard</i>
               <p> Dashboard </p>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tablesExamples">
               <i class="material-icons">supervised_user_circle</i>
               <p> User Management
                  <b class="caret"></b>
               </p>
            </a>
            <div class="collapse" id="tablesExamples">
               <ul class="nav">
                  <li class="nav-item ">
                     <a class="nav-link" href="<?php echo base_url() ?>/admin/userlist">
                     <span class="sidebar-mini"> LU </span>
                     <span class="sidebar-normal"> List User </span>
                     </a>
                  </li>
                  <li class="nav-item ">
                     <a class="nav-link" href="<?php echo base_url() ?>/admin/useradd">
                     <span class="sidebar-mini"> AU </span>
                     <span class="sidebar-normal"> Add User </span>
                     </a>
                  </li>
               </ul>
            </div>
         </li>
      </ul>
   </div>
   <div class="sidebar-background"></div>
</div>