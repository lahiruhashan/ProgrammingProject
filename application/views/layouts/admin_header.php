<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>German Fitness Center</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!--style-->
    <link href="<?php echo base_url(); ?>/assets/css/css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/reset.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/superfish.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/indexStyle.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/responsive.css">

    <!--js-->
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/jquery-migrate-1.4.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/jquery.ba-bbq.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/jquery-ui-1.12.1.custom.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/jquery.carouFredSel-5.6.1-packed.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/main.js"></script>
</head>
<body>
<div class="header_container">
    <div class="header clearfix">
        <div class="header_left">
            <a href="#" title="GERMANFITNESSCENTER">
                <img src="<?php echo base_url(); ?>/assets/images/header_logo.png" alt="logo">
                <span class="logo_left">GERMAN</span>
                <span class="logo_right">FITNESS</span>
                <span class="logo_left">CENTER</span>
            </a>
        </div>
        <ul class="sf-menu header_right">
            <li class="<?php echo $package; ?>">
                <a href="" title="HOME">
                    PACKAGE
                </a>
            </li>
            <li class="<?php echo $trainers; ?>">
                <a href="" title="CLASSES">
                    TRAINERS
                </a>

            </li>
            <li class="<?php echo $events; ?>">
                <a href="" title="APPOINTMENTS">
                    EVENTS
                </a>

            </li>
            <li class="<?php echo $users; ?>">
                <a href="" title="BOOKING">
                    USERS
                </a>
                <ul>
                    <li>
                        <a href="" title="GYM FITNESS">
                            ADD CUSTOMER
                        </a>
                    </li>
                    <li>
                        <a href="" title="INDOOR CYCLING">
                            VIEW CUSTOMER
                        </a>
                    </li>
                </ul>
            </li>
            <li class="<?php echo $notifications; ?>">
                <a href="" title="CONTACT">
                    NOTIFICATIONS
                </a>
                <ul>
                    <li>
                        <a href="" title="GYM FITNESS">
                            FEEDBACK
                        </a>
                    </li>
                    <li>
                        <a href="" title="INDOOR CYCLING">
                            MEMBERSHIP REQUEST
                        </a>
                    </li>
                </ul>
            </li>
            <li class="<?php echo $logout; ?>">
                <a href="<?php echo base_url('logout')?>" title="LOGOUT">
                    LOGOUT
                </a>

            </li>
        </ul>
        <div class="mobile_menu">
            <select>
                <option value="-">-</option>
                <option value="" selected="selected">HOME</option>
                <option value="">NEWS</option>
                <option value="">- BLOG</option>
                <option value="">- SINGLE POST</option>
                <option value="">CLASSES</option>
                <option value="">- GYM FITNESS</option>
                <option value="">- INDOOR CYCLING</option>
                <option value="">- YOGA PILATES</option>
                <option value="">- CARDIO FITNESS</option>
                <option value="">- BOXING</option>
                <option value="">TIMETABLE</option>
                <option value="">- GYM FITNESS</option>
                <option value="">- INDOOR CYCLING</option>
                <option value="">- YOGA PILATES</option>
                <option value="">- CARDIO FITNESS</option>
                <option value="">- BOXING</option>
                <option value="">GALLERY</option>
                <option value="">- GYM FITNESS</option>
                <option value="">- INDOOR CYCLING</option>
                <option value="">- YOGA PILATES</option>
                <option value="">- CARDIO FITNESS</option>
                <option value="">- BOXING</option>
                <option value="">CONTACT</option>
            </select>
        </div>
    </div>
</div>