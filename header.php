<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['logon']))
{
  $_SESSION['logon'] = 0;
}?>

<html>
<head>
  <meta charset="utf-8" />
  <script src="/jquery/dist/jquery.js"></script>
  <script src="/bootstrap/dist/js/bootstrap.js"></script>
  <link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap.css">

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <style>
  html, body {
    height: 100%;
  }
  body{
    padding-top: 60px;
    background:url('tiles.png');
  }
  #login-dp{
      min-width: 250px;
      padding: 14px 14px 0;
      overflow:hidden;
      background-color:rgba(255,255,255,.8);
  }
  #login-dp .help-block{
      font-size:12px
  }
  #login-dp .login-fail{
    font-size:11px;
    color:#ed0000;
  }
  #login-dp .bottom{
      background-color:rgba(255,255,255,.8);
      border-top:1px solid #ddd;
      clear:both;
      padding:14px;
  }
  #login-dp .social-buttons{
      margin:12px 0
  }
  #login-dp .social-buttons a{
      width: 49%;
  }
  #login-dp .form-group {
      margin-bottom: 10px;
  }
  .btn-fb{
      color: #fff;
      background-color:#3b5998;
  }
  .btn-fb:hover{
      color: #fff;
      background-color:#496ebc
  }
  .btn-tw{
      color: #fff;
      background-color:#55acee;
  }
  .btn-tw:hover{
      color: #fff;
      background-color:#59b5fa;
  }
  @media(max-width:768px){
      #login-dp{
          background-color: inherit;
          color: #fff;
      }
      #login-dp .bottom{
          background-color: inherit;
          border-top:0 none;
      }
      .dropdown-menu{
        display: block;
        position: static;
        background-color:transparent;
        border:0 none;
        box-shadow:none;
        margin-top:0;
        position:static;
        width:100%;
    }
    .navbar-nav .dropdown-menu > li > a,
    .navbar-nav .dropdown-menu .dropdown-header {
        padding:5px 15px 5px 25px;
    }
    .navbar-nav .dropdown-menu > li > a{
        line-height:20px;
    }
    .navbar-default .navbar-nav .dropdown-menu > li > a{
        color:#777;
    }
    a.dropdown-toggle .caret {
      display: none;
    }
    .dropdown a.dropdown-toggle{
        display:none;
    }
    #testing{
      padding-left: 3%;
    }
  }

  </style>
</head>
<body>

  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>

        </button>
        <p class="navbar-text" id="testing">HawkLot</p>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="active"><a href="index.php">Home</a></li>
          <?php if ($_SESSION['logon'] >= 3) : ?>
            <li><a href="admin.php">Admin Access</a></li>
          <?php endif; ?>
          <?php if ($_SESSION['logon'] >= 2) : ?>
            <li><a href="owner.php">Owner Access</a></li>
          <?php endif; ?>
          <?php if ($_SESSION['logon'] >= 1) : ?>
            <li><a href="user.php">Renter Access</a></li>
          <?php endif; ?>
        </ul>
        <?php if ($_SESSION['logon'] < 1) : ?>
        <ul class="nav navbar-nav navbar-right">
          <li><p class="navbar-text">Already have an account?</p></li>
          <li class="dropdown">
            <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><b>Login</b><span class="caret"></span></a>
  			<ul id="login-dp" class="dropdown-menu">
  				<li>
  					 <div class="row">
  							<div class="col-md-12">
  								 <form class="form" role="form" method="post" action="login.php" accept-charset="UTF-8" id="login-nav">
  										<div class="form-group">
  											 <label class="sr-only" for="InputEmail">Email address</label>
  											 <input type="email" name="email" class="form-control" id="InputEmail" placeholder="Email address" required>
  										</div>
  										<div class="form-group">
  											 <label class="sr-only" for="InputPassword">Password</label>
  											 <input type="password" name="pass" class="form-control" id="InputPassword" placeholder="Password" required>
                        <div class="help-block text-right"><a href="">Forgot your password?</a></div>
                        <?php if(isset($_GET['src'])) : ?>
                        <?php if($_GET['src'] == 'login_fail') : ?>
                          <div class="login-fail text-center">Email or Password was not correct, please try again</div>
                          <?php unset($_GET['src']); ?>
                        <?php endif; ?>
                        <?php endif; ?>
  										</div>
  										<div class="form-group">
  											 <button class="btn btn-primary btn-block" type="submit" action="login.php" name="login">Sign In</button>
  										</div>
  								 </form>
  							</div>
  							<div class="bottom text-center">
  								New here ? <a href="register.php"><b>Join Us</b></a>
  							</div>
  					 </div>
  				</li>
  			</ul>
      <?php endif; ?>
      <?php if($_SESSION['logon'] >= 1) : ?>
        <ul class="nav navbar-nav navbar-right">
          <li>
            <a href="reroute.php?logout=true"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
          </li>
        <ul>
      <?php endif; ?>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>







</hmtl>
</body>
