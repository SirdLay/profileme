<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url() ?>assets/images/favicon.ico">
    <?php $settings = get_settings(); ?>
    <title><?php echo html_escape($settings->site_name); ?> - Login</title>
  
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/bootstrap.min.css">

  <!-- Bootstrap 4.0-->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/bootstrap-extend.css">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/master_style.css">

  <link href="<?php echo base_url() ?>assets/admin/css/sweet-alert.css" rel="stylesheet" />

  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/skins/_all-skins.css"> 


</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <?php if (!empty($settings->logo)): ?>
      <img class="circles" src="<?php echo base_url($settings->logo) ?>"><br>
    <?php endif ?>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to Admin Panel </p>

    <form id="login-form" method="post" action="<?php echo base_url('auth/log'); ?>">

      <div class="form-group has-feedback">
        <input type="text" name="user_name" class="form-control" placeholder="Username">
        <span class="ion ion-email form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="ion ion-locked form-control-feedback"></span>
      </div>
      <div class="row">

        <!-- csrf token -->
        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">

        <!-- /.col -->
        <div class="col-12 text-center">
          <button type="submit" class="btn btn-info btn-block margin-top-10">SIGN IN</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <!-- /.social-auth-links -->

    <div class="margin-top-30 text-center">
    </div>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

  
  <input type="hidden" id="base_url" value="<?php echo base_url(); ?>">

  <!-- jQuery 3 -->
   <script src="<?php echo base_url() ?>assets/admin/js/jquery.min.js"></script> 
  <!-- popper -->
  <script src="<?php echo base_url() ?>assets/admin/js/popper.min.js"></script>
  <!-- Bootstrap 4.0-->
  <script src="<?php echo base_url() ?>assets/admin/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url() ?>assets/admin/js/admin.js"></script>
  <script src="<?php echo base_url()?>assets/admin/js/sweet-alert.min.js"></script>
  
  <script type="text/javascript">
    $(document).ready(function(){
      
      $(document).on('submit', "#login-form", function() {

        $.post($('#login-form').attr('action'), $('#login-form').serialize(), function(json){

            if (json.st == 1) {

                window.location = json.url;

            }else if (json.st == 0) {
                $('#login_pass').val('');
                swal({
                  title: "Error..",
                  text: "Sorry your username or password is not correct!",
                  type: "error",
                  confirmButtonText: "Try Again"
                });
            }else if (json.st == 2) {
                swal({
                  title: "Error..",
                  text: "Your account is not active",
                  type: "error",
                  confirmButtonText: "Try Again"
                });
            }else if (json.st == 3) {
                swal({
                  title: "Error..",
                  text: "Your account has been suspended",
                  type: "warning",
                  confirmButtonText: "Try Again"
                });
            }

        },'json');
        return false;
      });

    });
  </script>
</body>
</html>
