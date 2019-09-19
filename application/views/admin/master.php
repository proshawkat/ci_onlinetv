<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php if(isset($siteTitle)){echo $siteTitle;}?></title>

<link href="<?php echo base_url();  ?>assets/admin/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();  ?>assets/admin/css/datepicker3.css" rel="stylesheet">
<link href="<?php echo base_url();  ?>assets/admin/css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="<?php echo base_url();  ?>assets/admin/js/lumino.glyphs.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>Online</span>Tv</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> 
							<?php
								$name = $this->mt->singleData("user", array("user_id"=>$this->session->userdata("user_id")));
								//echo $name->user_name;
								$n = explode(" ", $name->user_name);
								//print_r($n);
								for($i = 0; $i < count($n); $i++){
									if(strlen($n[$i])>3){
										echo $n[$i];
										break;
									}
								}

						 	?> 
						 <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?php echo base_url(); ?>settings"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>
							<li><a href="<?php echo base_url(); ?>admin/logout"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<ul class="nav menu">
			<li class="active"><a href="<?php echo base_url(); ?>dashboard"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			
			<li class="parent ">
				<a href="#">
					<span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Category 
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li>
						<a class="" href="<?php echo base_url(); ?>dashboard/add_category">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Create Category
						</a>
					</li>
					<li>
						<a class="" href="<?php echo base_url(); ?>dashboard/manage_category">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Manage category
						</a>
					</li>
				</ul>
			</li>
			<li class="parent ">
				<a href="#">
					<span data-toggle="collapse" href="#sub-item-2"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Video 
				</a>
				<ul class="children collapse" id="sub-item-2">
					<li>
						<a class="" href="<?php echo base_url(); ?>dashboard/add_video">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg>Add Video
						</a>
					</li>
					<li>
						<a class="" href="<?php echo base_url(); ?>dashboard/manage_video">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Manage Video
						</a>
					</li>
				</ul>
			</li>
			<li class="parent ">
				<a href="#">
					<span data-toggle="collapse" href="#sub-item-3"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> User Info 
				</a>
				<ul class="children collapse" id="sub-item-3">
					<li>
						<a class="" href="<?php echo base_url(); ?>dashboard/subscriber">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg>Subscriber
						</a>
					</li>
					<li>
						<a class="" href="<?php echo base_url(); ?>dashboard/register">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg>Register user
						</a>
					</li>
					<li>
						<a class="" href="<?php echo base_url(); ?>dashboard/comments">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg>Comments
						</a>
					</li>
				</ul>
			</li>
			<li class="parent ">
				<a href="#">
					<span data-toggle="collapse" href="#sub-item-4"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> ICT layer 
				</a>
				<ul class="children collapse" id="sub-item-4">
					<li>
						<a class="" href="<?php echo base_url(); ?>ict">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg>Product Cart
						</a>
					</li>
				</ul>
			</li>
		</ul>

	</div><!--/.sidebar-->

	<?php 
		
	 if(isset($content)){echo $content;}
	?>
		
	
	<script src="<?php echo base_url();  ?>assets/admin/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();  ?>assets/admin/js/chart.min.js"></script>
	<script src="<?php echo base_url();  ?>assets/admin/js/chart-data.js"></script>
	<script src="<?php echo base_url();  ?>assets/admin/js/easypiechart.js"></script>
	<script src="<?php echo base_url();  ?>assets/admin/js/easypiechart-data.js"></script>
	<script src="<?php echo base_url();  ?>assets/admin/js/bootstrap-datepicker.js"></script>
	<script src="<?php echo base_url();  ?>assets/admin/js/bootstrap-table.js"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	


</body>

</html>