<nav class="navbar navbar-static-top affix-bottom" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo url('admin'); ?>">Admin Panel</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse affix-" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li>
                <a href="<?php echo url('admin/categories'); ?>">Categories</a>
            </li>
            <li>
                <a href="<?php echo url('admin/questions'); ?>">Questions</a>
            </li>
            <li>
                <a href="<?php echo url('highscore'); ?>">Highscore</a>
            </li>
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>