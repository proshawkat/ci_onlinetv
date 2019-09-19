<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php if(isset($sitetitle)){ echo $sitetitle;} ?></title>

	<!-- Bootstrap_CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
        
    <!--Start Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" />
        
    <!-- Sustom_CSS -->
	<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
        
    <!-- Responsive_CSS -->
    <link href="<?php echo base_url(); ?>assets/css/responsive.css" rel="stylesheet">

</head>
<body>

    <!-- Pre Loader -->
     <!-- <div id="aa-preloader-area">
       <div class="mu-preloader">
         <img src="assets/images/wait.gif" alt=" loader img">
       </div>
    </div> --> 
     
    <section id="header-section">
    	<div class="main-header">
            <!--Top_Header_Section-->
            <div class="top_header_section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-lg-8 col-sm-8 col-xs-12">
                            <div class="top-menu">
                                <nav1>
                                    <ul class="tmenu">
                                        <li><a <?php if (isset($sitemenu) && $sitemenu == "home") {
                                        echo 'class="thomer"';
                                    } ?> href="<?php echo base_url(); ?>">Home</a></li>
                                        
                                        <li><a <?php if (isset($sitemenu) && $sitemenu == "category") {
                                        echo 'class="thomer"';
                                    } ?> href="#">Category</a></li>
                                        <?php $rtype = $this->session->userdata("r_type"); 
                                        if($rtype == null){
                                         ?>
                                        <li><a <?php if (isset($sitemenu) && $sitemenu == "register") {
                                        echo 'class="thomer"';
                                    } ?> href="<?php echo base_url();?>register">Login/Register</a></li>
                                        <?php }else{ ?>
                                        <li><a <?php if (isset($sitemenu) && $sitemenu == "register") {
                                        echo 'class="thomer"';
                                    } ?> href="<?php echo base_url();?>tv/register_logout">Logout</a></li>
                                    <?php } ?>
                                        <li> <?php   $msg = $this->session->flashdata("lmsg"); echo "<p style='color: #fff;'>". $msg ."</p>";?> </li>
                                    </ul>   
                                </nav1>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                            <div class="top-social-link">
                                <ul>
                                    <li><a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href=""><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                    <li><a href=""><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href=""><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End_Top_Header_Section-->
            <!-- Start Logo area -->
            <div class="logoarea">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                            <img src="<?php echo base_url(); ?>assets/images/logo.png" class="img-responsive" alt="logo">
                        </div>
                        <div class="col-md-8 col-lg-8 col-sm-8 col-xs-12">
                            <div class="serach-form">
                                <form action="<?php echo base_url(); ?>tv/search" method="post">
                                    <input name="search" value="<?php echo set_value("search"); ?>" class="searchvideo" placeholder="Search Videos..." type="text">
                                    <!-- <button type="submit"><img src="<?php echo base_url();?>assets/images/search.png"></button> -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Logo area -->
            <!-- Start Menu area -->
            <div class="menu-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="menu-area">
                                <nav> <a id="resp-menu" class="responsive-menu" href="#"><i class="fa fa-reorder"></i> Menu</a>
                                    <ul class="menu">
                                        <li><a <?php if (isset($sitemenu) && $sitemenu == "home") {
                                        echo 'class="homer"';
                                    } ?> href="<?php echo base_url(); ?>">Home</a></li>
                                        <?php foreach($category as $v): ?>
                                            <li><a  href="<?php echo base_url(); ?>tv/cat/<?php echo $v->cate_name; ?>"><?php echo $v->cate_name; ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Menu area -->
        </div>
    </section>

    <?php 
    	if(isset($content)){
    		echo $content;
    	}
     ?>
  	
  	<section id="footer-section">
        <div class="container">
            <div class="row">
                <div class="footer-area">
                    <div class="col-md-8 col-lg-8 col-sm-8 col-xs-12">
                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
                            <div class="ft-category">
                                <h4>Featured</h4>
                                <ul>
                                    <?php foreach($category as $v): ?>
                                    <li><a href="<?php echo base_url(); ?>tv/cat/<?php echo $v->cate_name; ?>"><?php echo $v->cate_name; ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-8 col-sm-8 col-xs-12">
                            <div class="ft-popular">
                                <h4>Popular</h4>
                                <?php 
                                    $fpvideo = $this->mt->getWhereLimit("video", array("popular"=>1), 6, "desc"); 
                                    foreach($fpvideo as $v): ?>
                                    <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                                        <div class="category-video-img">
                                            <img src="http://img.youtube.com/vi/<?php echo $v->video; ?>/0.jpg" alt="video" class="img-responsive"><a target="_blank" href="<?php echo base_url(); ?>tv/cwvs/<?php echo $v->video_id; ?>"><div class="hover-item"></div></a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                        <div class="ft-subscribe">
                            <h4>Subscribe</h4>
                            <form id="test_form" method="post">
                                <input type="email" class="form-control" id="email_field" name="email" placeholder="Enter Your Email">
                                <button  type="submit"> Submit</button>
                            </form>
                        </div>
                    </div>
                    
                </div> 
                <div class="bottom-fotter">
                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                        <p>© 2016 All rights reserved </p>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                        <p class="text-right bt">Design & Developed <a  target="_blank" href="http://base4bd.com/content/default.aspx">Base4 Technologies</a></p>
                    </div>
                </div>               
            </div>
        </div>
    </section>


	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="<?php echo base_url(); ?>assets/js/jquery.min.1.12.4.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
	<!-- Custom_Script -->
	<script src="<?php echo base_url(); ?>assets/js/custom_script.js" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#test_form").submit(function(e){     
                e.preventDefault();

                var tdata= $("#test_form").serializeArray();
                var base_url = "<?php echo base_url(); ?>";
                $.ajax({
                    type: "POST",
                    url: base_url+"tv/subscriber",
                    data: tdata, 

                    success:function(tdata)
                    {
                        alert('You have success');
                        // $( "input[name='email']" ).val("");
                        $( "#email_field" ).val("");
                    },
                    error: function (XHR, status, response) {
                       alert('Your email already used');
                    }

                });
            });
            
        });
    </script>
</body>
</html>