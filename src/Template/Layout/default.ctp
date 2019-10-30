
<!DOCTYPE html>

<html>

<head>
    <title>Pleeness</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <?=  $this->Html->css('/frontend/styles/layout.css'); ?>
</head>

<body id="top">
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <div class="wrapper row0">
        <div id="topbar" class="hoc clear">
            <!-- ################################################################################################ -->
            <div class="fl_left">
                <ul class="nospace inline pushright">
                    <li><i class="fa fa-phone"></i> +00 (123) 456 7890</li>
                    <li><i class="fa fa-envelope-o"></i> info@domain.com</li>
                </ul>
            </div>
            <div class="fl_right">
                <ul class="nospace inline pushright">
                    <li><i class="fa fa-sign-in"></i> <a href="#">Login</a></li>
                </ul>
            </div>
            <!-- ################################################################################################ -->
        </div>
    </div>
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <div class="wrapper row1">
        <header id="header" class="hoc clear">
            <!-- ################################################################################################ -->
            <div id="logo" class="fl_left">
                <h1><a href="index.html">Porus Ruby</a></h1>
            </div>
            <div id="search" class="fl_right">
                <form class="clear" method="post" action="#">
                    <fieldset>
                        <legend>Search:</legend>
                        <input type="search" value="" placeholder="Search Here&hellip;">
                        <button class="fa fa-search" type="submit" title="Search"><em>Search</em></button>
                    </fieldset>
                </form>
            </div>
            <!-- ################################################################################################ -->
        </header>
    </div>
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <div class="wrapper row2">
        <nav id="mainav" class="hoc clear">
            <!-- ################################################################################################ -->
            <ul class="clear">
                <li class="active"><a href="index.html">Home</a></li>
                <li><a href="#">Portfolios</a></li>
                <li><a class="drop" href="#">Blogs</a>
                    <ul>
                    <?php foreach($categories as $row) : ?>
                        <li><a href="<?php echo $this->Url->build("/category/".$row->slug, true); ?>"><?= h($row->name)  ?></a></li>
                    <?php endforeach; ?>
                    </ul>
                </li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <!-- ################################################################################################ -->
        </nav>
    </div>
    <!-- ################################################################################################ -->
    <?= $this->fetch('content') ?>
    <!-- ################################################################################################ -->
    <div class="wrapper row4 bgded overlay" style="background-image:url('images/demo/backgrounds/03.png');">
        <footer id="footer" class="hoc clear">
            <!-- ################################################################################################ -->
            <div id="cta" class="group">
                <div class="one_third first"><i class="fa fa-map-marker"></i>
                    <p>Find us</p>
                    <p><a href="#">Google Maps</a></p>
                </div>
                <div class="one_third"><i class="fa fa-phone"></i>
                    <p>Call us</p>
                    <p>+00 (123) 456 7890</p>
                </div>
                <div class="one_third"><i class="fa fa-envelope-o"></i>
                    <p>Email us</p>
                    <p>info@domain.com</p>
                </div>
            </div>
            <!-- ################################################################################################ -->
            <div class="group">
                <div class="one_quarter first">
                    <h6 class="title">Diam cras vel magna</h6>
                    <p>Dapibus sit amet erat eu pellentesque praesent nec cursus arcu in leo velit pulvinar et est nec bibendum maximus justo maecenas.</p>
                    <p>Volutpat arcu cursus lobortis nunc felis neque rhoncus sit amet ex non facilisis facilisis libero vestibulum.</p>
                </div>
                <div class="one_quarter">
                    <h6 class="title">Vulputate pulvinar</h6>
                    <ul class="nospace linklist">
                        <li><a href="#">Vulputate finibus quam ut</a></li>
                        <li><a href="#">Sed dolor et augue semper</a></li>
                        <li><a href="#">Luctus quisque malesuada</a></li>
                        <li><a href="#">Vehicula nunc id fermentum</a></li>
                        <li><a href="#">Morbi ultrices velit ac</a></li>
                    </ul>
                </div>
                <div class="one_quarter">
                    <h6 class="title">Aliquet eleifend</h6>
                    <ul class="nospace linklist">
                        <li><a href="#">Pharetra pellentesque feugiat</a></li>
                        <li><a href="#">Nunc ut bibendum porttitor</a></li>
                        <li><a href="#">Nam at sollicitudin sapien</a></li>
                        <li><a href="#">A auctor ligula nullam tincidunt</a></li>
                        <li><a href="#">Arcu commodo condimentum</a></li>
                    </ul>
                </div>
                <div class="one_quarter">
                    <h6 class="title">Aliquam tristique</h6>
                    <ul class="nospace linklist">
                        <li>
                            <article>
                                <h2 class="nospace font-x1"><a href="#">Sit amet elit pharetra</a></h2>
                                <time class="font-xs block btmspace-10" datetime="2045-04-06">Friday, 6<sup>th</sup> April 2045</time>
                                <p class="nospace">Cursus phasellus cursus ipsum sed neque pellentesque&hellip;</p>
                            </article>
                        </li>
                        <li>
                            <article>
                                <h2 class="nospace font-x1"><a href="#">Condimentum vulputate</a></h2>
                                <time class="font-xs block btmspace-10" datetime="2045-04-05">Thursday, 5<sup>th</sup> April 2045</time>
                                <p class="nospace">Dui nunc lacinia arcu vitae porta quam quam vitae&hellip;</p>
                            </article>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- ################################################################################################ -->
        </footer>
    </div>
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <div class="wrapper row5">
        <div id="social" class="hoc clear">
            <!-- ################################################################################################ -->
            <div class="one_half first">
                <h6 class="title">Social Media</h6>
                <ul class="faico clear">
                    <li><a class="faicon-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a class="faicon-pinterest" href="#"><i class="fa fa-pinterest"></i></a></li>
                    <li><a class="faicon-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a class="faicon-dribble" href="#"><i class="fa fa-dribbble"></i></a></li>
                    <li><a class="faicon-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a class="faicon-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a class="faicon-vk" href="#"><i class="fa fa-vk"></i></a></li>
                    <li><a class="faicon-youtube" href="#"><i class="fa fa-youtube"></i></a></li>
                    <li><a class="faicon-rss" href="#"><i class="fa fa-rss"></i></a></li>
                </ul>
            </div>
            <div class="one_half">
                <h6 class="title">Newsletter subscription</h6>
                <form class="clear" method="post" action="#">
                    <fieldset>
                        <legend>Newsletter:</legend>
                        <input type="text" value="" placeholder="Type Email Here&hellip;">
                        <button class="fa fa-share" type="submit" title="Submit"><em>Submit</em></button>
                    </fieldset>
                </form>
            </div>
            <!-- ################################################################################################ -->
        </div>
    </div>
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <div class="wrapper row6">
        <div id="copyright" class="hoc clear">
            <!-- ################################################################################################ -->
            <p class="fl_left">Copyright &copy; 2018 - All Rights Reserved - <a href="#">Domain Name</a></p>
            <p class="fl_right">Template by <a target="_blank" href="https://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
            <!-- ################################################################################################ -->
        </div>
    </div>
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
    <!-- JAVASCRIPTS -->
    <?=  $this->Html->script('/frontend/scripts/jquery.min.js'); ?>
    <?=  $this->Html->script('/frontend/scripts/jquery.backtotop.js'); ?>
    <?=  $this->Html->script('/frontend/scripts/jquery.mobilemenu.js'); ?>
    <!-- IE9 Placeholder Support -->
    <?=  $this->Html->script('/frontend/scripts/jquery.placeholder.min.js'); ?>
    <!-- / IE9 Placeholder Support -->
</body>

</html>