<!doctype html>
<html  lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="M_Adnan" />
	<!-- Document Title -->
	<title>
		BIZTO | MultiPurpose HTML5 Template
	</title>

	<!-- Favicon -->
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">

	<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->

	<!-- StyleSheets -->
	<link rel="stylesheet" href="<?= base_url()?>/static/css/ionicons.min.css">
	<link rel="stylesheet" href="<?= base_url()?>/static/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= base_url()?>/static/css/main.css">
	<link rel="stylesheet" href="<?= base_url()?>/static/css/style.css">
	<link rel="stylesheet" href="<?= base_url()?>/static/css/responsive.css">

	<!-- Fonts Online -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800,900|Raleway:200,300,400,500,600,700,800,900" rel="stylesheet">
	<script src="<?= base_url()?>static/js/vendors/jquery/jquery.min.js">
	</script>
	<script src="<?= base_url()?>/static/js/uploader.js" ></script>
	<!-- JavaScripts -->
	<script src="<?= base_url()?>/static/js/vendors/modernizr.js">
	</script>
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

<!-- LOADER -->
<!--<div id="loader">
<div class="position-center-center">
<div class="loader"></div>
</div>
</div>
-->
<!-- Page Wrapper -->
<div id="wrap">

<!-- Nav -->
<div class="fly-nav">
	<nav class="overlay" id="overlay">
		<div class="position-center-center">

			<ul>


				<?
				foreach($menu as $key=>$submenu):?>


				<?
				if(is_array($submenu)):?>

				<li>
					<a data-toggle="collapse" data-parent="#accordion" href="#<?= $key?>">
						<?= lang($key) ?>
						<i class="fa fa-angle-right">
						</i>
					</a>

					<div id="<?=$key?>" class="panel-collapse collapse" role="tabpanel">
						<ul>
							<?
							foreach($submenu as $url=>$value):?>
							<li>
								<a href="<?= base_url().$url ?>">
									<?= lang($value)?>
								</a>
							</li>
							<? endforeach ;?>
						</ul>
					</div>
				</li>

				<?
				else :?>

				<li>
					<a href="<?= base_url().$submenu ?>"><?= lang($key)?></a></li>

				<? endif ;?>
				<? endforeach;?>


			</ul>
		</div>

		<!-- Bottom Info -->
		<div class="botton-info">
			<div class="container-fluid">
				<div class="col-sm-6">
					<p>
						2018 © M_Adnan. All rights reserved
					</p>
				</div>
				<div class="col-sm-6 text-right">
					<a href="#.">
						<i class="fa fa-facebook">
						</i>
					</a>
					<a href="#.">
						<i class="fa fa-google">
						</i>
					</a>
					<a href="#.">
						<i class="fa fa-behance">
						</i>
					</a>
					<a href="#.">
						<i class="fa fa-twitter">
						</i>
					</a>
				</div>
			</div>
		</div>
	</nav>
</div>

<!-- Header Icon -->
<div class="fly-nac-icon">
	<div class="position-center-center">
		<div class="toggle-button" id="toggle">
			<span class="bar top">
			</span>
			<span class="bar middle">
			</span>
			<span class="bar bottom">
			</span>
		</div>
	</div>
</div>

<!-- Logo -->



<div class="content shadow">
<div class="container" style="min-height: 100vh;" >


<!-- End logo -->
