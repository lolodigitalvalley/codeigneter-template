<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/' ?>bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/'; ?>plugins/font-awesome-4.1.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/' ?>dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/' ?>plugins/iCheck/square/blue.css">
    <style type="text/css">
    .login-box{
        max-width: 480px;
        min-width: 30%;
        margin: 1% auto;
    }
    </style>
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
            <div class="panel panel-default">
                <div class="panel-heading">                 
                    Register New Member                 
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
 <div class="row">
    <div class="col-xs-12">
    
    <?php if ($this->session->flashdata('success')) echo notifications('success', $this->session->flashdata('success')); ?>
    <?php if ($this->session->flashdata('error')) echo notifications('error', $this->session->flashdata('error')); ?>
    <?php if (validation_errors()) echo notifications('warning', validation_errors('<p>','</p>')); ?>  
        
        <form role="form" method="POST" action="<?php echo site_url('register'); ?>"> 
            <div class="form-group">
                <label>Username</label>
                <input class="form-control" name="username" id="username" value = "<?php echo isset($username) ? $username : '';?>" />
            </div>
            <div class="form-group">
                <label>Name</label>
                <input class="form-control" name="name" id="name" value = "<?php echo isset($name) ? $name : '';?>" />
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" id="email" value = "<?php echo isset($email) ? $email : '';?>" />
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" id="password" />
            </div>
            <div class="form-group">
                <label>Retype Password</label>
                <input type="Password" class="form-control" name="repassword" id="repassword" />
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" class="form-control" name="phone" id="phone" value = "<?php echo isset($phone) ? $phone : '';?>" />
            </div>
            <div class="form-group">
                <label>Company</label>
                <input type="text" class="form-control" name="company" id="company" value = "<?php echo isset($company) ? $company : '';?>" />
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit Button</button>
            <button name="back" class="btn btn-default" onclick="history.back()">Back Button</button>
        </form>
    </div>
</div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->


      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url().'assets/' ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url().'assets/' ?>bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url().'assets/' ?>plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
