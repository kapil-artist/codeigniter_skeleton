<?php
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url() ?>/assets/admin/img/apple-icon.png">
      <link rel="icon" type="image/png" href="<?php echo base_url() ?>/assets/admin/img/favicon.png">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <title>
         <?php echo $title ?>
      </title>
      <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
      <!--     Fonts and icons     -->
      <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css?t=<?php echo time() ?>">
      <!-- CSS Files -->
      <link href="<?php echo base_url() ?>/assets/admin/css/material-dashboard.css?v=2.2.2&t=<?php echo time() ?>" rel="stylesheet" />
      <!-- CSS Just for demo purpose, don't include it in your project -->
      <link href="<?php echo base_url() ?>/assets/admin/demo/demo.css?t=<?php echo time() ?>" rel="stylesheet" />
      <script src="<?php echo base_url() ?>/assets/admin/js/core/jquery.min.js?t=<?php echo time() ?>"></script>
      <style>
         .invalidC {
         float: left;
         width: 100%;
         text-align: center;
         margin-top: 10px;
         margin-bottom: 0px;
         color: red;
         font-weight: bold;
         }
         }
      </style>
   </head>
   <body class="">
      <div class="wrapper wrapper-full-page ">
         <div class="content">
            <div class="content">
               <div class="row">
                  <div class="col-lg-3 col-md-6 col-sm-8 ml-auto mr-auto" style="margin-top: 50px;">
                     <form class="form" method="post" action="<?php echo base_url() ?>/admin/login?de=1">
                        <div class="card card-login">
                           <div class="card-header card-header-rose text-center">
                              <h4 class="card-title">Enter Credentials</h4>
                           </div>
                           <?php if (!empty($msg)) {
                              echo '<p class="invalidC">' . $msg . '</p>';
                              } ?>
                           <div class="card-body ">
                              <span class="bmd-form-group">
                                 <div class="input-group">
                                    <div class="input-group-prepend">
                                       <span class="input-group-text">
                                       <i class="material-icons">email</i>
                                       </span>
                                    </div>
                                    <input type="email" name="username" class="form-control" placeholder="Email ID">
                                 </div>
                              </span>
                              <span class="bmd-form-group">
                                 <div class="input-group">
                                    <div class="input-group-prepend">
                                       <span class="input-group-text">
                                       <i class="material-icons">lock_outline</i>
                                       </span>
                                    </div>
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                 </div>
                              </span>
                           </div>
                           <div class="card-footer justify-content-center">
                              <button type="submit" class="btn btn-rose btn-link btn-lg">Login</button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--   Core JS Files   -->
      <script src="<?php echo base_url() ?>/assets/admin/js/core/popper.min.js?t=<?php echo time() ?>"></script>
      <script src="<?php echo base_url() ?>/assets/admin/js/core/bootstrap-material-design.min.js?t=<?php echo time() ?>"></script>
      <script src="<?php echo base_url() ?>/assets/admin/js/plugins/perfect-scrollbar.min.js?t=<?php echo time() ?>"></script>
      <!--  Plugin for Sweet Alert -->
      <script src="<?php echo base_url() ?>/assets/admin/js/plugins/sweetalert2.js?t=<?php echo time() ?>"></script>
      <script src="<?php echo base_url() ?>/assets/admin/js/plugins/jquery.dataTables.min.js?t=<?php echo time() ?>"></script>
      <!-- Forms Validations Plugin -->
      <script src="<?php echo base_url() ?>/assets/admin/js/plugins/jquery.validate.min.js?t=<?php echo time() ?>"></script>
      <!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
      <script src="<?php echo base_url() ?>/assets/admin/js/plugins/bootstrap-selectpicker.js?t=<?php echo time() ?>"></script>
      <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
      <script src="<?php echo base_url() ?>/assets/admin/js/material-dashboard.js?v=2.2.2&t=<?php echo time() ?>" type="text/javascript"></script>
   </body>
</html>