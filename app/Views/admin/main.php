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
      <meta content='width=device-width, initial-scale=1.0' name='viewport' />
      <!--     Fonts and icons     -->
      <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css?t=<?php echo time() ?>">
      <!-- CSS Files -->
      <link href="<?php echo base_url() ?>/assets/admin/css/material-dashboard.css?v=2.2.2&t=<?php echo time() ?>" rel="stylesheet" />
	  <!-- <link href="<?php echo base_url() ?>/assets/admin/css/light-bootstrap-dashboard.css?v=2.2.2&t=<?php echo time() ?>" rel="stylesheet" /> -->
      <!-- CSS Just for demo purpose, don't include it in your project -->
      <link href="<?php echo base_url() ?>/assets/admin/demo/demo.css?t=<?php echo time() ?>" rel="stylesheet" />
      <script src="<?php echo base_url() ?>/assets/admin/js/core/jquery.min.js?t=<?php echo time() ?>"></script>
      <script src="<?php echo base_url() ?>/assets/admin/js/plugins/jquery.dataTables.min.js?t=<?php echo time() ?>"></script>
      <!--   Core JS Files   -->
      <script src="<?php echo base_url() ?>/assets/admin/js/core/popper.min.js?t=<?php echo time() ?>"></script>
      <script src="<?php echo base_url() ?>/assets/admin/js/core/bootstrap-material-design.min.js?t=<?php echo time() ?>"></script>
      <script src="<?php echo base_url() ?>/assets/admin/js/plugins/perfect-scrollbar.min.js?t=<?php echo time() ?>"></script>
      <!--  Plugin for Sweet Alert -->
      <script src="<?php echo base_url() ?>/assets/admin/js/plugins/sweetalert2.js?t=<?php echo time() ?>"></script>
      
      <!-- Forms Validations Plugin -->
      <script src="<?php echo base_url() ?>/assets/admin/js/plugins/jquery.validate.min.js?t=<?php echo time() ?>"></script>
      <!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
      <script src="<?php echo base_url() ?>/assets/admin/js/plugins/bootstrap-selectpicker.js?t=<?php echo time() ?>"></script>
      <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
      <script src="<?php echo base_url() ?>/assets/admin/js/material-dashboard.js?v=2.2.2&t=<?php echo time() ?>" type="text/javascript"></script>

      <script src="<?php echo base_url(); ?>/assets/ckeditor/ckeditor.js"></script>
      <script src="<?php echo base_url(); ?>/assets/ckfinder/ckfinder.js"></script>

   </head>
   <body class="">
      <div class="wrapper ">
         <?php echo view('admin/common/navbar') ?>
         <div class="main-panel">
            <!-- Navbar -->
            <?php echo view('admin/common/header', array('title' => $title)); ?>
            <!-- End Navbar -->
            <div class="content">
               <div class="content">
                  <div class="container-fluid">
                     <?php if (!empty($contentview) && !empty($contentdata)) {
                        ?>
                     <?php echo view('admin/' . $contentview, $contentdata); ?>
                     <?php } else if (!empty($contentview)) { ?>
                     <?php echo view('admin/' . $contentview); ?>
                     <?php } ?>
                  </div>
               </div>
            </div>
            <?php echo view('admin/common/footer'); ?>
         </div>
      </div>
   </body>
</html>