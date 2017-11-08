
<!--navigation bar-->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><p><font size="6"><b>German Fitnes Center</b></font></p></a>
        <button type="button" class="navbar-toggle navbar-toggler-right collapsed" data-toggle="collapse" data-target="#navbarResponsive" data-label-expanded="Close" aria-expanded="false">
            <span class="sr-only">(toggle)</span>
            <span class="navbar-toggle-icon">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-right">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() ?>index.php/userController/profile"><font size="4rem">Home</font></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() ?>index.php/userController/about"><font size="4rem">About</font></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() ?>index.php/userController/features"><font size="4rem">Features</font></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><font size="4rem">Contact</font></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="faq.php"><font size="4rem">Prices</font></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <font size="4rem"> Membership</font>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                        <a class="dropdown-item" href="<?php echo site_url('userController/signUp') ?>"><span class="glyphicon glyphicon-user"></span><font size="3rem"> Sign Up</font></a>
                        <a class="dropdown-item" href="<?php echo site_url('userController/login') ?>"> <span class="glyphicon glyphicon-log-in"></span> <font size="3rem"><?php echo $Login; ?></font></a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>