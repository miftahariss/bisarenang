<!DOCTYPE html>
<html>
    <head>
        <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/materialize.min.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/slick.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/slick-theme.css"/>
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        
    </head>
    
    <body>
    	<header>
            <div class="container">
                <nav>
                    <div class="nav-wrapper">
                        <a href="#" class="brand-logo"><img src="images/logo.png" alt="Logo"></a>
                        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                        <ul id="nav-mobile" class="right hide-on-med-and-down">
                            <li><a href="<?php echo base_url(); ?>" <?php if($base=='Home') echo 'class="selected"'; ?>>Home</a></li>
                            <li><a href="blog.html" <?php if($base=='Blog') echo 'class="selected"'; ?>>Blog</a></li>
                            <li><a href="safetyswim.html" <?php if($base=='Safety') echo 'class="selected"'; ?>>Safety Swim</a></li>
                            <li><a href="program.html" class="dropdown-button" data-activates="dropdown">Program<i class="material-icons right">arrow_drop_down</i></a></li>
                            <li><a href="contact.html">Contact</a></li>
                            <li><a href="about.html">About</a></li>
                        </ul>
                        
                        <!-- DROPDOWN PROGRAM DESKTOP -->
                        <ul id="dropdown" class="dropdown-content">
                        	<li><a href="program.html">Program</a></li>
                            <li class="divider"></li>
                            <li><a href="program-detail.html">Basic to Swim</a></li>
                            <li><a href="program-detail.html">Swimming Fit</a></li>
                        </ul>
                        
                        <!-- MOBILE MENU -->
                        <ul id="mobile-demo" class="side-nav">
                            <li><a href="index.html" class="selected">Home</a></li>
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="safetyswim.html">Safety Swim</a></li>
                            <li><a href="program.html">Program</a></li>
                            <li><a href="contact.html">Contact</a></li>
                            <li><a href="about.html">About</a></li>
                        </ul>
                    </div> <!-- NAV WRAPER -->
                </nav>
            </div> <!-- CONTAINER -->
        </header>

        <?php $this->load->view($mainpage); ?>

        <footer class="page-footer">            
            <div class="footer-copyright">
                <div class="container">
                    <p>Copyright &copy; 2016 Bisarenang.com. All Rights Reserved</p>|
                    <a href="#!">Terms of Use</a>|
                    <a href="#!">Privacy Policy</a>
                </div>
            </div>
        </footer>
        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script type="text/javascript" src="js/slick.min.js"></script>
        
        <script type="text/javascript">
            function isMobile() {
               return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
            }
        </script>
        
        <script type="text/javascript">
            $(document).ready(function(){
                $('.slider').slick({
                });
            });
        </script>
        
        <script>
            if (!isMobile()) {
                new WOW().init();
               // do the animation
            }
        </script>
        
        <script type="text/javascript">
            $(document).ready(function(){
                $(".dropdown-button").dropdown();
            });
        </script>
        
        <script type="text/javascript">
            $(document).ready(function(){
                $(".button-collapse").sideNav();
            });
        </script>
    </body>
</html>