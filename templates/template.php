<!DOCTYPE html>
<html>
    <head>
        <title><?php echo SITE_TITLE; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Include CSS files -->
        <link href="<?php echo url('css/bootstrap.css'); ?>" rel="stylesheet">
        <link href="<?php echo url('css/style.css'); ?>" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <!-- Include javascript files -->
        <script src="js/vendor/jquery-2.0.3.js"></script>
        <script src="js/vendor/bootstrap.js"></script>

        <!-- This is our applications main file -->
        <script src="js/app.js"></script>
    </head>
    <body>
        <!-- Admin Menu -->
        <?php if (getRouteSegment(0) == 'admin'): ?>
            <?php echo getTemplate('admin/menu'); ?>
        <?php endif; ?>

        <!-- Page Content -->
        <?php echo $content; ?>

        <!-- Trivia playing board -->
        <div id="trivia-template"></div>
    </body>
</html>