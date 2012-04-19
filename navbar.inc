<!DOCTYPE html>
<html>
<head>
    <meta name="Description" content="Делегирование твиттер аккаунта, бесплатно и без ограничений">
    <meta name="Keywords" content="твиттер, делегирование, бесплатно, twitter, delegation, free, unlimit">
    <title>Twitter Delegate</title>
    <!-- Le styles -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="bootstrap/css/docs.css" rel="stylesheet">
    <link href="bootstrap/js/google-code-prettify/prettify.css" rel="stylesheet">
    <script src="bootstrap/js/jquery.js"></script>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
<!--    <link rel="shortcut icon" href="bootstrap/ico/favicon.ico">-->
    <link rel="shortcut icon" href="favicon.png">
    <link rel="apple-touch-icon" href="bootstrap/ico/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="bootstrap/ico/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="bootstrap/ico/apple-touch-icon-114x114.png">
    <script type="text/javascript">

      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-30022846-1']);
      _gaq.push(['_setDomainName', 'twidel.ru']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();

    </script>
</head>
<body>

<!-- Navbar
  ================================================== -->
  <div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <a class="brand" href="./">TwiDel</a>
        <div class="nav-collapse">
          <ul class="nav">
            <li class="active">
              <a href="./index.php">Главная</a>
            </li>
              <?php if(isset($menulinks)) print $menulinks; ?>

            <li class="divider-vertical"></li>
<!--            <li class="">-->
<!--              <a href="./clearsessions.php">Выйти</a>-->
<!--            </li>-->
<!--            <li class="">-->
<!--              <a href="./examples.html">About</a>-->
<!--            </li>-->

          </ul>
            <?php if(isset($id))print "<p class='navbar-text pull-right'>
                            Вы вошли как <a href='https://twitter.com/#/$username'>@$username</a> <img src='$avatar' width='32' style='vertical-align: middle;'>
            "; ?>
        </div>
      </div>
    </div>
  </div>
  <div class="alert alert-error container">Сайт работает в тестовом режиме, возможны вайпы и прочая неугодная гадость.</div>
  <?php 
  	if(isset($message)) print $message;
  ?>
