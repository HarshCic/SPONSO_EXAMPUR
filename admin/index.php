<?php

   include("database/config.php");



      // include('session.php');



   

	$error="";



   if($_SERVER["REQUEST_METHOD"] == "POST") {

      // username and password sent from form



      $myusername = mysqli_real_escape_string($ses,$_POST['username']);

      $mypassword = mysqli_real_escape_string($ses,$_POST['password']);



      $sql = "SELECT id,roll,per_cat_id FROM admin_login WHERE username = '$myusername' and password = '$mypassword'";

      $result = mysqli_query($ses,$sql);

      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      // $active = $row['active'];

      $roll=$row['roll'];
      $percatid=$row['per_cat_id'];


      $count = mysqli_num_rows($result);



      // If result matched $myusername and $mypassword, table row must be 1 row



      if($count == 1) {

         // session_register("myusername");

         $_SESSION['login_user'] = $myusername;
        $_SESSION['permissions'] = $percatid;
         if ($roll=="1") {

           // code...

           header("location: backend/dashboard.php");

         } elseif($roll=="2") {



           header("location: backend/dashboard.php");

         }

         else {

           // code...

           header("location: backend/dashboard.php");

         }



      }else {

         $error = "*Your Username or Password is invalid";



      }

   }



?>

<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>EXAMPUR | Log in</title>

  <!-- Tell the browser to be responsive to screen width -->

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Bootstrap 3.3.7 -->

  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">

  <!-- Font Awesome -->

  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">

  <!-- Ionicons -->

  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">

  <!-- Theme style -->

  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <!-- iCheck -->

  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">



  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

  <!--[if lt IE 9]>

  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>

  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

  <![endif]-->



  <!-- Google Font -->

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>

<body class="hold-transition login-page">

<div class="login-box">

  <div class="login-logo">

    <a href="../../index2.html"><b>EXAMPUR</b></a>

  </div>

  <!-- /.login-logo -->

  <div class="login-box-body">

    <p class="login-box-msg">Sign in to start your session</p>



    <form method="POST" action="" id="form-content-wrapper">

		<div class="form-group text-red">

		<?php echo $error; ?>

		</div>

      <div class="form-group has-feedback">

        <input type="text" class="form-control" name="username" placeholder="User name">

        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

      </div>

      <div class="form-group has-feedback">

        <input type="password" class="form-control" name="password" placeholder="Password">

        <span class="glyphicon glyphicon-lock form-control-feedback"></span>

      </div>

      <div class="row">

        <div class="col-xs-8">

          <div class="checkbox icheck">

            <label>

              <input type="checkbox"> Remember Me

            </label>

          </div>

        </div>

        <!-- /.col -->

        <div class="col-xs-4">

          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>

        </div>

        <!-- /.col -->

      </div>

    </form>



    



   



  </div>

  <!-- /.login-box-body -->

</div>

<!-- /.login-box -->



<!-- jQuery 3 -->

<script src="bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap 3.3.7 -->

<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- iCheck -->

<script src="plugins/iCheck/icheck.min.js"></script>

<script>

  $(function () {

    $('input').iCheck({

      checkboxClass: 'icheckbox_square-blue',

      radioClass: 'iradio_square-blue',

      increaseArea: '20%' /* optional */

    });

  });

</script>

</body>

</html>

