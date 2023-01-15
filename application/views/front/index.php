<?php
$user = '';
$phone = '';
    if(isset($_SESSION['logged_in_user'])){
        //echo "running live".$_SESSION['logged_in_user_phone'];
        $user = $_SESSION['logged_in_user_name'];
        $phone = $_SESSION['logged_in_user_phone'];
    }
    //if(!isset($_GET['dev'])){
       // die("Website under Maintenance. Try later");
    //} 
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Spin and Win in Kenya.Spinpesa Wheel. Earn Real Online Money.</title>
	<meta name="description" content="Spin and Win in Kenya. Play Spinpesa by Choosing your stake and Spin to Win Big! Sign-up Now, Spin the Wheel and win cash instantly. Join Now!">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!---Font Icon-->
	<link href="<?php echo base_url('assets/front/');?>css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url('assets/front/');?>font/flaticon.css" rel="stylesheet">
	<!-- / -->

	<!-- Plugin CSS -->
	<link href="<?php echo base_url('assets/front/');?>css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url('assets/front/');?>css/slick.css" rel="stylesheet">
	<link href="<?php echo base_url('assets/front/');?>css/animate.min.css" rel="stylesheet">
	<link href="<?php echo base_url('assets/front/');?>css/magnific-popup.css" rel="stylesheet">
	<link href="<?php echo base_url('assets/front/');?>css/YouTubePopUp.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url('assets/front/');?>css/menu.css?74839jj">
	<!-- / -->
	<!-- Favicon -->
	<link rel="icon" href="<?php echo base_url('assets/front/');?>images/header-logo.png" />
	<!-- / -->
	<!-- Theme Style -->
	<link href="<?php echo base_url('assets/front/');?>css/style.css?fdsf2ohdj5" rel="stylesheet">
	<link href="<?php echo base_url('assets/front/');?>css/responsive.css" rel="stylesheet">
	<link href="<?php echo base_url('assets/front/');?>css/marquee.css?ffd" rel="stylesheet">
	
	<!-- wheel of fortune Style -->
	<link rel="stylesheet" href="<?php echo base_url('assets/front/');?>wheel/css/reset.css"> 
	<link rel="stylesheet" href="<?php echo base_url('assets/front/');?>wheel/css/sweetalert2.min.css"> 
	<link rel="stylesheet" href="<?php echo base_url('assets/front/');?>wheel/css/superwheel.min.css"> 
	<link rel="stylesheet" href="<?php echo base_url('assets/front/');?>wheel/css/style.css">
	
	<style>
		.superWheel {
			width: 400px;
		}
		.heading h2 {
			line-height: 30px;
		}
		.hidden2{
			visibility: hidden;
		}
	  	@-webkit-keyframes spinner-border{to{-webkit-transform:rotate(360deg);transform:rotate(360deg)}}@keyframes spinner-border{to{-webkit-transform:rotate(360deg);transform:rotate(360deg)}}.spinner-border{display:inline-block;width:2rem;height:2rem;vertical-align:text-bottom;border:.25em solid currentColor;border-right-color:transparent;border-radius:50%;-webkit-animation:spinner-border .75s linear infinite;animation:spinner-border .75s linear infinite}.spinner-border-sm{width:1rem;height:1rem;border-width:.2em}@-webkit-keyframes spinner-grow{0%{-webkit-transform:scale(0);transform:scale(0)}50%{opacity:1}}@keyframes spinner-grow{0%{-webkit-transform:scale(0);transform:scale(0)}50%{opacity:1}}.spinner-grow{display:inline-block;width:2rem;height:2rem;vertical-align:text-bottom;background-color:currentColor;border-radius:50%;opacity:0;-webkit-animation:spinner-grow .75s linear infinite;animation:spinner-grow .75s linear infinite}.spinner-grow-sm{width:1rem;height:1rem}
		@media only screen and (min-width: 1024px) {
		.header-nav .navbar-brand img {
			width: 210px;
		}
	  	.casino-btn, .horizontalButtonGroup {
    		margin-top: 50px;
    	}
    	.spin_banner{margin-top: 20px; height:200px; text-align: center;display: flex; justify-content: center;}
    	.wheel-horizontal-spin-button, .deposit-button {
		position: relative;
		display: inline-block;
		font-size: 24px;
		vertical-align: top;
		text-align: center;
		letter-spacing: 1px;
		line-height: 24px;
		color: #fefefe;
		font-weight: 400;
		font-family: "Anton";
		padding: 13px 15px;
		border-radius: 35px;
		text-transform: capitalize;
		width: 130px;
		-webkit-transition: all ease 0.5s;
		-moz-transition: all ease 0.5s;
		-ms-transition: all ease 0.5s;
		-o-transition: all ease 0.5s;
		transition: all ease 0.5s;
		box-shadow: 0px 0px 2px 2px rgb(247 172 4 / 80%);
		text-shadow: 5px 4px 0px #efa500;
		background: linear-gradient(to bottom, #ffd679 30%, #f7ac03 70%);
		filter: drop-shadow(0 0px 20px rgba(101, 40, 193, 0.5));
		}
		.player {
			background: url(./images/hold_money3.png);
			background-position-x: 0%;
			background-position-y: 0%;
			background-repeat: repeat;
			background-size: auto;
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
			height: 40vh;
			position: relative;
		}
		
		.cheza_banner{
			background: url(./images/chezaspin-40.png);
				background-position: center;
				background-repeat: no-repeat;
				background-size: cover;
				height: 350px;
				position: relative;
				margin-bottom: 30px;
				margin-top: 10px;
		}
		.title2 {
			font-size: 87px;
		}
		}
		
		@media only screen and (max-width: 1024px) {
		.superWheel {
			width: 400px;
		}
		.header-nav .navbar-brand img {
			width: 110px;
		}
		.wheel-horizontal-spin-button {
			width: 100px;
		}
		.casino-btn, .horizontalButtonGroup {
				margin-top: 0px;
		}
		.spin_banner{margin-top: 0px; height:auto; text-align: center;display: flex; justify-content: center;}
		.wheel-horizontal-spin-button, .deposit-button {
			position: relative;
			display: inline-block;
			font-size: 21px;
			vertical-align: top;
			text-align: center;
			letter-spacing: 1px;
			line-height: 1px;
			color: #fefefe;
			font-weight: 400;
			font-family: "Anton";
			padding: 13px 15px;
			border-radius: 35px;
			text-transform: capitalize;
			width: 170px;
			-webkit-transition: all ease 0.5s;
			-moz-transition: all ease 0.5s;
			-ms-transition: all ease 0.5s;
			-o-transition: all ease 0.5s;
			transition: all ease 0.5s;
			box-shadow: 0px 0px 2px 2px rgb(247 172 4 / 80%);
			text-shadow: 5px 4px 0px #efa500;
			background: linear-gradient(to bottom, #ffd679 30%, #f7ac03 70%);
			filter: drop-shadow(0 0px 20px rgba(101, 40, 193, 0.5));
		}
			.player {

			height: 5vh;
			position: relative;
		}
		.cheza_banner{
			background: url(./images/chezaspin2.png);
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
				height: 550px;
				position: relative;
				margin-bottom: 10px;
				margin-top: 10px;
		}
		.title2 {
			font-size: 87px;
		}
		}
	
		@media only screen and (max-width: 900px) {
		.superWheel {
			width: 370px;
		}
		.header-nav .navbar-brand img {
			width: 110px;
		}
		}
		
		@media only screen and (max-width: 768px) {
		.superWheel {
			width: 350px;
		}
		.header-nav .navbar-brand img {
			width: 110px;
		}
		
		.wheel-horizontal-spin-button {
			width: 170px;
		}
		}
		
		@media only screen and (max-width: 600px) {
		.superWheel {
			width: 310px;
		}
		.header-nav .navbar-brand img {
			width: 110px;
		}
		
		}
		
		@media only screen and (max-width: 480px) {
		.superWheel {
			width: 250px;
		}
		.header-nav .navbar-brand img {
			width: 110px;
		}
		}
		
		#banner .container{
			margin-top: 90px;
			padding-bottom: 30px;
		}
		
		#counter .container{
			padding-top: 90px;
		}

		
		.title2 {
				letter-spacing: -1px;
				line-height: 110px;
				width: 570px;
				font-weight: 400;
				font-family: "Anton";
				background: -webkit-linear-gradient(#fcb503 46%, #e5881b 54%, #fcb11a);
				-webkit-background-clip: text;
				-webkit-text-fill-color: transparent;
				z-index: 99;
				line-height: 90px;
				width: auto;
			}

		
		.input_error {
			border: solid 2px #FF0000;  
		}
		
		.ui-button-active {
			border-color: #404020;
			background: #808060;
			/* Raise the button so its border is visible. */
			position: relative;
			z-index: 999;
		}
		#head-mobile {
			padding: 12px;
		}
		#head-mobile a {
			padding-top: 10px;
			padding-bottom: 10px;
			padding-left: 30px;
			padding-right: 30px;
			color: white;
		}
	</style>
</head>
<body>
	<!-- back to top start -->
	<div id="back-top-btn">
		<i class="fa fa-chevron-up"></i>
	</div>
	<!-- back to top end -->

	<!-- Preloader Start -->
	<div class="preloader">
		<div class="loader">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
	<!-- Preloader end -->
	<!-- Header -->
	<section id="header">

		<!-- NAV AREA CSS -->
		<nav id="nav-part" class="navcss2 navbar header-nav other-nav custom_nav full_nav sticky-top navbar-expand-md hidden-main">
			<div class="container">


				<a class="navbar-brand" href="index.html"><img src="images/goldlogo.png" class="img-fluid logo-color" alt="logo"></a>

				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<div class="nav-res">
						<ul class="nav navbar-nav m-auto menu-inner fa-time">
							<li><a href="#banner" class="active">Spin Now</a></li>
							<li><a href="#how">How to play</a></li>
							<li><a href="<?= base_url() ?>blog/">Blog</a></li>
							<li><a href="#contact">Contact</a> </li>
							
							<?php
                                if(isset($_SESSION['logged_in_user'])){
                                    ?>
                                        <li><a href="#">Withdraw</a> </li>
                                        <li><span  class="badge badge-info user_bal" style="padding: .5em .4em;">Bal: Ksh 0</span> </li>
                                    <?php
                                }else{
                                    ?>
                                        <li><span  class="badge badge-warning user_bal" style="padding: .5em .4em;">Bal: Ksh 0</span>  </li>
                                    <?php
                                }
                            ?>
                            <li><img style="height: 30px; float: right;" src="<?php echo base_url();?>images/mpesa2.png" class="img-fluid" alt="Mpesa"></li>
                            
                           
							<li style="visibility: hidden;"><i class="more-less fa fa-align-right"></i>
								<i class="fa fa-times"></i>

							</li>

						</ul>
					</div>
					<ul class="login_menu navbar-right nav-sign">
						
						<?php
                            if(isset($_SESSION['logged_in_user'])){
                                ?>
                                    <li class="login"><a href="<?php echo site_url('authentication/logout'); ?>" class="btn-4 yellow-bg yellow-btn">Logout</a></li>
                                <?php
                            }else{
                                ?>
                                    <li class="login" data-toggle="modal" data-target="#signupModal"><a href="#" class="btn-4 yellow-btn">Signup</a></li>
						            <li class="login" data-toggle="modal" data-target="#loginModal"><a href="#" class="btn-4 pink-bg">Login</a></li>
                                <?php
                                
                            }
                        ?>
					</ul>
				</div>
			</div>
		</nav>
		<!-- mobile menu -->
		
        <nav id='cssmenu' class="hidden mobile">
            <div class="logo">
                <a href="#" class="logo">
                    <!--img src="images/goldlogo.png" class="img-responsive" alt=""-->
                </a>
            </div>
            <div id="head-mobile">
                <?php
                    if(isset($_SESSION['logged_in_user'])){
                        ?>
                            <a href="<?php echo site_url('authentication/logout'); ?>" class="btn-4 yellow-bg yellow-btn">Logout</a>
                            <a href="#" class="btn-4 yellow-bg yellow-btn">Withdraw</a>
                        <?php
                    }else{
                        ?>
                            <a href="#"  data-toggle="modal" data-target="#signupModal" class="btn-4 yellow-bg yellow-btn">Signup</a>
				            <a href="#"  data-toggle="modal" data-target="#loginModal"  class="btn-4 yellow-bg">Login</a>
                        <?php
                        
                    }
                ?>
                <?php
                    if(isset($_SESSION['logged_in_user'])){
                        ?>
                            
                            <li style="text-align: right;"><span  class="badge badge-info user_bal" style="padding: 1em .4em;">Bal: Ksh 0</span> </li>
                        <?php
                    }else{
                        ?>
                            <li style="text-align: right;"><span  class="badge badge-warning user_bal" style="padding: 1em .2em;">Bal: Ksh 0</span> <br> </li>
                        <?php
                    }
                ?>
            </div>
            <img style="height: 30px; float: right;" src="<?php echo base_url();?>images/mpesa2.png" class="img-fluid" alt="Mpesa">
            <div class="button"><i class="more-less fa fa-align-right" style="font-size: 30px;"></i></div> 
            <ul>
                <li><a  style="padding: 4px; font-size: 14px;" href="#banner" class="active">Spin Now</a></li>
				<li><a  style="padding: 4px; font-size: 14px;" href="#how">How to Play</a></li>
				<li><a style="padding: 4px; font-size: 14px;" href="<?= base_url() ?>blog/">Blog</a></li>
				<li><a style="padding: 4px; font-size: 14px;" href="#contact">Contact</a> </li>
				<?php
                if(isset($_SESSION['logged_in_user'])){
                    ?>
                        <li style="text-align: right;"><a  style="padding: 4px; font-size: 14px;" href="#">Withdraw</a> </li>
                    <?php
                }
                ?>
             
							
                <?php
                    if(isset($_SESSION['logged_in_user'])){
                        ?>
                            <li class="login"><a  style="padding: 4px; font-size: 14px;" href="#" class="btn-4 yellow-bg yellow-btn">Logout</a></li>
                        <?php
                    }else{
                        ?>
                            <li class="login"><a  style="padding: 4px; font-size: 14px;" href="#" class="btn-4 yellow-bg yellow-btn">Signup</a></li>
				            <li class="login"><a  style="padding: 4px; font-size: 14px;" href="#" class="btn-4 yellow-bg">Login</a></li>
                        <?php
                        
                    }
                ?>
				
			
            </ul>

        </nav>

		<!-- End mobile menu -->
	</section>
	<!-- Header End -->

	<section id="banner" class="banner-inner main_page">
		<div class="container">
			<div class="row">
				

				<div class="col-lg-5 col-md-12">
					<main class="cd-main-content text-center">
					<div class="wheel-horizontal" data-anijs="if: mouseover, do: swing animated, to: .logo-color"></div>
					
					</main> 

				</div>
				
				<div class="col-lg-7 col-md-12">

						<div class="row banner_text spin_banner">
							<h1 class="title2">Spin Pesa</h1>
							<h3 style="text-align: center" data-anijs="if: mouseover, do: hinge animated, to: .logo-color">Spin and Win. <br> Earn Upto <span class="cash">Ksh 50,000</span> Instantly</h3>
							
						</div>
						<div class="row">
							<div class="col-lg-7" style="text-align: center;">
							    <?php
                                    if(isset($_SESSION['logged_in_user'])){
                                        ?>
                                            <b style="color:white;">CHOOSE YOUR STAKE TO PLAY</b>
                                        <?php
                                    }else{
                                        ?>
                                            <b style="color:white;">CHOOSE YOUR DEMO STAKE TO PLAY</b>
                                        <?php
                                    }
                                ?>
							    
								<p>
									<div id="grpbtn" class="horizontalButtonGroup"  data-anijs="if: mouseover, do: swing animated, to: .player">
										<!--div class="ui-button fifty">50</div-->
										<div class="ui-button one_h">100</div>
										<div class="ui-button two_h">200</div>
										<div class="ui-button five_h">500</div>
										<div class="ui-button one_t">1000</div>
									</div>
								</p>
		
								<div class="casino-btn">
								    <?php
                                        if(isset($_SESSION['logged_in_user'])){
                                            ?>
                                                <button type="button" class="button btn-4 yellow-btn wheel-horizontal-spin-button" title="Select amount above.">Spin</button>
									            <button type="button" data-toggle="modal" data-target="#depositModal" class="button btn-4 yellow-btn deposit-button">Deposit</button>
                                            <?php
                                        }else{
                                            ?>
                                                <button type="button" class="button btn-4 yellow-btn wheel-horizontal-spin-button" data-anijs="if: mouseover, do: swing animated, to: .user_bal">Spin Demo</button>
                                            <?php
                                            
                                        }
                                    ?>
									
									
								</div>
							</div>
						
							<div class="col-lg-5 player">
							
							</div>
						</div>

				</div>
				<div class="col-lg-12">
					<div class="promo-carousel" id="grouploop-1">
						<div class="item-wrap"> </div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Banner End -->

	<!-- Counter -->
	<section id="counter" class="back-light">
		<div class="container">
			<div class="row conter-res yellow-bg text-center">
				<div class="col-md-5 counter-left text-center">
					<div>
						<h4>Today you can Win upto</h4>
					</div>
				</div>
				<div class="col-md-7 col-12 text-center counterinner">
					<ul>
						<li class="counter-text border-count">
							<h3 class="counter-after">K</h3>

						</li>
						<li class="counter-text border-count">
							<h3 class="counter counter-after">S</h3>

						</li>
						<li class="counter-text border-count">
							<h3 class="counter counter-after">H</h3>

						</li>
						<li class="counter-text border-count">
							<h3 class="counter counter-after">5</h3>

						</li>
						<li class="counter-text border-count">
							<h3 class="counter counter-after">0</h3>

						</li>
						<li class="counter-text border-count">
							<h3 class="counter counter-after">0</h3>

						</li>
						<li class="counter-text border-count">
							<h3 class="counter counter-after">0</h3>

						</li>
						<li class="counter-text border-count">
							<h3 class="counter counter-after">0</h3>

						</li>
					</ul>

				</div>

			</div>
		</div>
	</section>

	<!-- Control Start -->
	<section id="control" class="control back-light section">
		<div class="container">
			<div class="row justify-content-center text-center">
				<div class="col-lg-12">
				    <div class="row">
				        <div class="col-lg-12">
        					<div class="heading">
        						<h2>Lucky Spin and win game</h2>
        						<img src="images/heading-border-effect.png" class="img-fluid" alt="effect">
        					</div>
        				</div>
				    </div>
				</div>
			
				<div class="col-lg-12">
				    <div class="row">
				        <div class="col-lg-12">
				            <div class="cheza_banner"></div>
    					</div>
				    </div>
				</div>

				<div class="row control-pad">
					<div class="border-effect1">
						<img src="images/border-effect.png" class="img-fluid" alt="effect">
					</div>
					<div class="border-effect2">
						<img src="images/border-effect.png" class="img-fluid" alt="effect">
					</div>
				</div>

				<div class="row ">
					<div class="col-lg-6 col-md-12">
						<div class="row control-inner cont-bot">
							<div class="col-lg-3 col-md-2 col-4">
								<div class="control-img">
									<i class="fa flaticon-bill"></i>
								</div>
							</div>
							<div class="col-lg-9 col-md-10 col-8">
								<div class="control-text">
									<h3>Free Spins</h3>
									<p>Free spins on registration. No deposit required <span style="visibility: hidden">Free spins on registration. No deposit required Free spins on registration. No deposit required </span></p>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-6 col-md-12">
						<div class="row control-inner">
							<div class="col-lg-3 col-md-2 col-4">
								<div class="control-img">
									<i class="fa flaticon-money"></i>
								</div>
							</div>
							<div class="col-lg-9 col-md-10 col-8">
								<div class="control-text">
									<h3>Instant Withdrawal</h3>
									<p>Instant Withdrawals. Sell your credits for instant cash.Instant Withdrawals. <span style="visibility: hidden">Sell your credits for instant cash.Instant Withdrawals. Sell your credits for.</span> </p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row control-pad">
					<div class="border-effect1">
						<img src="images/border-effect.png" class="img-fluid" alt="effect">
					</div>
					<div class="border-effect2">
						<img src="images/border-effect.png" class="img-fluid" alt="effect">
					</div>
				</div>

				<div class="row">
					<div class="col-lg-6 col-md-12">
						<div class="row control-inner cont-bot">
							<div class="col-lg-3 col-md-2 col-4">
								<div class="control-img">
									<i class="fa flaticon-loss"></i>
								</div>
							</div>
							<div class="col-lg-9 col-md-10 col-8">
								<div class="control-text">
									<h3>Minimum Stake</h3>
									<p>Minimum Stake of Ksh 100. and high multiplier of upto X1000. <span style="visibility: hidden">Minimum Stake of Ksh 100. and high multiplier of upto X1000.Minimum Stake of Ksh 100. and high m...</span></p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-12">
						<div class="row control-inner">
							<div class="col-lg-3 col-md-2 col-4">
								<div class="control-img">
									<i class="fa flaticon-wallet-1"></i>
								</div>
							</div>
							<div class="col-lg-9 col-md-10 col-8">
								<div class="control-text">
									<h3>New Levels</h3>
									<p>New Levels equals more cash and free spins.<span style="visibility: hidden">New Levels equals more cash and free spinsNew Levels equals more cash and free spinsNew Levels equals more cash ...</span></p>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>
	<!-- Control End -->

	<!-- How to Start -->
	<a id="how"></a>
	<section id="start" class="how-start back-light section">
		<div class="container">
			<div class="row justify-content-center text-center">
				<div class="col-lg-6">
					<div class="heading">
					    
						<h2>How to Play Spinpesa - Spin to win</h2>
						<img src="<?php echo base_url('assets/front/');?>images/heading-border-effect.png" class="img-fluid" alt="effect">
					</div>
				</div>
				<div class="row ">
					<div class="col-md-4">
						<div class="row control-inner">
							<div class="col-lg-3 col-md-12 col-3">
								<div class="start-img">
									<i class="fa flaticon-bill"></i>
								</div>
							</div>
							<div class="col-lg-9 col-md-12 col-9">
								<div class="start-text">
									<h3>Login or Signup</h3>
									<p>Login to our site.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="row control-inner">
							<div class="col-lg-3 col-md-12 col-3">
								<div class="start-img">
									<i class="fa flaticon-wallet"></i>
								</div>
							</div>
							<div class="col-lg-9 col-md-12 col-9">
								<div class="start-text">
									<h3>Deposit Cash</h3>
									<p>Fast deposits via Mpesa.</p>
								</div>
							</div>
						</div>
					</div>


					<div class="col-md-4">
						<div class="row control-inner">
							<div class="col-lg-3 col-md-12 col-3">
								<div class="start-img">
									<i class="fa flaticon-casino"></i>
								</div>
                            </div>
							<div class="col-lg-9 col-md-12 col-9">
								<div class="start-text">
									<h3>Play & Enjoy</h3>
									<p>Play spin and Win game in Kenya and Enjoy winnings of upto KSH 50,000 Instantly.</p>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>
	<!-- How to Start -->
	
	<!-- what is spinpesa -->
	<section id="start" class="how-start back-light section">
		<div class="container">
			<div class="row justify-content-center text-center">
				<div class="col-lg-6">
					<div class="heading">
						<h2>What is Spin to win</h2>
						<img src="<?php echo base_url('assets/front/');?>images/heading-border-effect.png" class="img-fluid" alt="effect">
					</div>
				</div>
				<div class="row ">
					<div class="col-md-12">
						<div class="row control-inner">
							<div class="col-lg-2 col-md-12 col-2">
								<div class="start-img">
									<i class="fa flaticon-bill"></i>
								</div>
							</div>
							<div class="col-lg-10 col-md-12 col-10">
								<div class="start-text">
									<p>Spin to win is an online game wheel that allows you to get a totally random winning option the moment you spin it. To spin the wheel you need just to click on it.
									You just spin, win and withdraw your winnings immediately</p>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>
	<!-- What is spin pesa -->

	
	<!-- Casino Contact start -->
	<section id="contact-us" class="contact-us back-dark contact section">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<div class="contact-about">
						<div class="heading">
							<h2>Responsible Gambling</h2>
							<img src="<?php echo base_url('assets/front/');?>images/heading-border-effect.png" class="img-fluid" alt="effect">
						</div>
						<p class="mb30">By using spinpesa, you are expected to gamble responsibly. Under no circumstances will
						Spin Pesa be held liable for any damage/loss, financial or otherwise, that results from you gambling irresponsibly.
						It is the user’s responsibility to ensure that they meet all age and other regulatory requirements prior to
						registering an account at any gambling site listed or referenced within this site.</p><br>
						<p>This site makes every effort to ensure that all spins are randomly generated and give no individual, owners or
						clients, any added advantage. All content, materials, programs, services, and software contained on or made
						available by this site are for entertainment, educational, and informational purposes only. Any use of
						the foregoing in violation of local, state, federal, provincial, or national law is strictly prohibited. </p>
					</div>
				</div>
				<div class="col-lg-6 col-md-12">
					<div class="row">
						<div class="col-lg-12">
							<div class="payments">
								<div class="heading">
									<h2>Payment Methods</h2>
									<img src="images/heading-border-effect.png" class="img-fluid" alt="effect">
								</div>
								<ul>
									<li><a href="#"><img src="images/payment/payment-image-1.jpg" class="img-fluid" alt="effect"></a></li>
									<li><a href="#"><img src="images/payment/payment-image-2.jpg" class="img-fluid" alt="effect"></a></li>
									<li><a href="#"><img src="images/payment/payment-image-3.jpg" class="img-fluid" alt="effect"></a></li>
									<li><a href="#"><img src="images/payment/payment-image-4.jpg" class="img-fluid" alt="effect"></a></li>
									<li><a href="#"><img src="images/payment/payment-image-5.jpg" class="img-fluid" alt="effect"></a></li>
								</ul>
							</div>
						</div>
					</div>
                    <div class="row">
						<div class="col-lg-12">
						<div class="subscribe">
							<div class="heading">
								<h3>Contact US</h3>
								<img src="<?php echo base_url('assets/front/');?>images/heading-border-effect.png" class="img-fluid" alt="effect">
							</div>
							<div class="sub-form">
								<form>
									<div class="form-group col-sm-12">
										<input type="text" class="form-control" name="email" placeholder="Enter Your Email">
									</div>
									<div class="casino-btn newsletter">
										<a href="#" class="btn-4 yellow-btn">send</a></div>
								</form>
							</div></div>
						</div>
					</div>
				</div>
			</div>
			<div class="row control-pad">
				<div class="border-effect1">
					<img src="<?php echo base_url('assets/front/');?>images/border-effect.png" class="img-fluid" alt="effect">
				</div>
				<div class="border-effect2">
					<img src="images/border-effect.png" class="img-fluid" alt="effect">
				</div>
			</div>
			<div class="row justify-content-center text-center">
				<div class="col-md-12 bot-menu">
					<div class="foot-menu">
					    <a id="contact"></a>
						<ul>
							<li><a href="https://twitter.com/spin_pesa1" target"_blank"><img style="width: 70px;" src="images/social/facebook.jpeg" class="img-fluid" alt="effect"></a></li>
							<li><a href="https://www.facebook.com/profile.php?id=100070293517028" target"_blank"><img style="width: 70px;" src="images/social/Twitter-Logo.png?dsf" class="img-fluid" alt="effect"></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-12">
					<div class="copy-right">
						<h6>Copyright 2022. All rights reserved Spin Pesa</h6>
					</div>
				</div>
			</div>
		</div>
	<audio id="myAudio" controls style="visibility: hidden; height: 0px;">
		<source src="audio.mp3" type="audio/mpeg">
		Your browser does not support the audio element.
	</audio><br>
	</section>
	<!-- Casino Contact End -->

	<!-- Login modal -->
	<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header border-bottom-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-title text-center">
                  <h4>Login</h4>
                </div>
                <div class="d-flex flex-column text-center">
                  <form id="login_form">
                    <div class="form-group">
                      <input type="email" class="form-control" id="phone_num" name="phone_num" placeholder="Your Phone Number...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" id="user_login_password" name="user_login_password" placeholder="Your password...">
                    </div>
                    <button type="button" class="btn btn-info btn-block btn-round" id="login_button">Login</button>
                  </form>
                  <span id="output" style="margin-top: 2px; font-size: 12px;"></span>
              </div>
            </div>
              <div class="modal-footer d-flex justify-content-center">
                <div class="signup-section">Not a member yet? <a data-toggle="modal" data-target="#resetModal" href="#" class="text-info"> Sign Up</a>. Or <a data-toggle="modal" data-target="#resetModal" href="#" class="text-info"> Reset password</a></div>
              </div>
          </div>
        </div>
    </div>
    <!-- Login Modal End -->
    
    <!-- reset modal -->
	<div class="modal fade" id="resetModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header border-bottom-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-title text-center">
                  <h4>Password Recovery</h4>
                </div>
                <div class="d-flex flex-column text-center">
                  <form id="reset_form">
                    <div class="form-group">
                      <input type="email" class="form-control" id="phone_num_reset" name="phone_num_reset" placeholder="Your Phone Number...">
                    </div>
                    <button type="button" class="btn btn-info btn-block btn-round" id="reset_button">Reset</button>
                  </form>
                  <span id="output4" style="margin-top: 2px; font-size: 12px;"></span>
              </div>
            </div>
          </div>
        </div>
    </div>
    <!-- reset Modal End -->
    
    <!-- sign up modal -->
	<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header border-bottom-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-title text-center">
                  <h4>SIGN UP</h4>
                </div>
                <div class="d-flex flex-column text-center">
                  <form id="register_form">
                    <div class="form-group">
                      <input type="name" class="form-control reg_form" id="cust_name" name="cust_name" placeholder="Your Name...">
                    </div>
                    <div class="form-group">
                      <input type="number" class="form-control reg_form" id="cust_phone_number" name="cust_phone_number" placeholder="Your Phone Number...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control reg_form" id="cust_password1" name="cust_password1" placeholder="Your password...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control reg_form" id="cust_password2" name="cust_password2" placeholder="Confirm Your password...">
                    </div>
                    <button type="button" id="register_button" class="btn btn-info btn-block btn-round">Sign Up <span id="register_button_spin"></span></button>
                  </form>
                  <span id="output2" style="margin-top: 2px; font-size: 12px;"></span>
              </div>
            </div>
              <div class="modal-footer d-flex justify-content-center">
                <div class="signup-section">Already a member? <a href="#a" class="text-info"> Sign In</a>.</div>
              </div>
          </div>
        </div>
    </div>
    <!-- sign up Modal End -->
    
    
    <!-- deposit modal -->
	<div class="modal fade" id="depositModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header border-bottom-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-title text-center">
                  <h4>DEPOSIT</h4>
                </div>
                <div class="d-flex flex-column text-center">
                    <form id="deposit_form">
                    <div class="form-group" style="margin-top:20px; margin-bottom:20px;">
                      <input type="text" class="form-control reg_form" id="cust_amount" name="amount" placeholder="Enter Amount">
                      <span style="color: red;">Minimum Ksh 100</span>
                    </div>
                 
                    <button type="button" id="deposit_proceed_button" class="btn btn-info btn-block btn-round">Proceed <span id="deposit_button_spin"></span></button>
                  </form>
                <span id="output3" style="margin-top: 2px; font-size: 12px;">
                    
                </span>
                <hr>
                <h3>Deposit tips</h3>
                <span style="text-align: left;">
                1) make your initial deposit and win instantly<br/>
                2) Contact us +254722000111
                </span>
                
              </div>
            </div>
              <div class="modal-footer d-flex justify-content-center">
              </div>
          </div>
        </div>
    </div>
    <!-- deposit Modal End -->
    
    <!-- deposit confirmation modal -->
	<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header border-bottom-0">
                <!--button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button-->
              </div>
              <div class="modal-body">
                <div class="form-title text-center">
                  <h4>Confirm Payment</h4>
                </div>
                <div class="d-flex flex-column text-center">
                    <form id="deposit_form">
                    <div class="form-group deposit_confirm_text" style="margin-top:20px; margin-bottom:20px;">
                      A request has been sent to your phone. Please wait for Mpesa prompt to deposit then click button below after deposit confirmation from Mpesa.
                    </div>
                    <p class="wait" style="color:#2d1919;"><b>Please wait as deposit loads</b></p>
                    <div class="counteer">Confirm Deposit in 40Secs.. <span class="countdown"></span> </div>
                    <button type="button" id="deposit_confirm_button" class="btn btn-info btn-block btn-round hidden2">Confirm Deposit <span id="deposit_button_spin"></span></button>
                    <button type="button" id="deposit_goto_play_button" class="btn btn-warning btn-block btn-round hidden2">Spin Now <span id=""></span></button>
                  </form>
                <span id="output3" style="margin-top: 2px; font-size: 12px;"></span>
              </div>
            </div>
              <div class="modal-footer d-flex justify-content-center">
              </div>
          </div>
        </div>
    </div>
    <!-- deposit confirmation Modal End -->

     <!-- pesapal modal -->
	<div class="modal fade" id="pesapalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="height: 600px; overflow: scroll;">
              <div class="modal-header border-bottom-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-title text-center">
                </div>
                <div class="d-flex flex-column text-center">
                     <iframe id="pesapal_iframe"  title="Depo" style="height: 600px;"></iframe> 
                <span id="output3" style="margin-top: 2px; font-size: 12px;"></span>
              </div>
            </div>
              <div class="modal-footer d-flex justify-content-center">
              </div>
          </div>
        </div>
    </div>
    <!-- pesapal Modal End -->
	
	<!-- jQuery -->
	<script src="<?php echo base_url('assets/front/');?>js/jquery-3.2.1.min.js"></script>

	
	
	<!--script src="js/jquery-migrate-3.0.0.min.js"></script --> <!--  removed for conflicting with wheel -->

	<!-- Plugins -->
	<script src="<?php echo base_url('assets/front/');?>js/popper.min.js"></script>
	<script src="<?php echo base_url('assets/front/');?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url('assets/front/');?>js/slick.min.js"></script>
	<script src="<?php echo base_url('assets/front/');?>js/counter.js"></script>
	<script src="<?php echo base_url('assets/front/');?>js/jquery.countdown.min.js"></script>
	<script src="<?php echo base_url('assets/front/');?>js/menu-opener.js"></script>
	<!--script src="js/waypoints.js"></script --> <!-- requires jquery-migrate-3.0.0.min.js -->
	<script src="<?php echo base_url('assets/front/');?>js/YouTubePopUp.jquery.js"></script>
	<script src="<?php echo base_url('assets/front/');?>js/jquery.event.move.js"></script>
	<script src="<?php echo base_url('assets/front/');?>js/SmoothScroll.js"></script>
	<!-- custom -->
	<script src="<?php echo base_url('assets/front/');?>js/custom.js"></script>
	<script src="<?php echo base_url('assets/front/');?>js/menu.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/3.0.1/js.cookie.min.js"></script>
	
	
		<!-- wheel of fortune-->
	<!--script type="text/javascript" src="assets/plugins/jquery-1.12.3.min.js"></script-->
	<script src="<?php echo base_url('assets/front/');?>wheel/js/jquery.superwheel.min.js"></script> 
	<script src="<?php echo base_url('assets/front/');?>wheel/js/sweetalert2.min.js?ghj"></script> 
	<script src="<?php echo base_url('assets/front/');?>wheel/js/randomColor.js"></script>
    <script src="<?php echo base_url('assets/front/');?>wheel/js/confettiKit.js"></script>
	<?php

        if(isset($_SESSION['logged_in_user'])){
            ?>
    <script src="<?php echo base_url('assets/front/');?>wheel/js/main.js?<?php echo md5(uniqid(rand(), true)); ?>"></script> 
           <?php
        }else{
            ?>
    <script src="<?php echo base_url('assets/front/');?>wheel/js/main2.js?<?php echo md5(uniqid(rand(), true)); ?>"></script>
            <?php
        }
        
    ?>
	
	
	<!-- AniJS core library -->
  <script src="https://anijs.github.io/lib/anijs/anijs-min.js"></script> 
  
  <!-- Include to use $addClass, $toggleClass or $removeClass -->
  <script src="https://anijs.github.io/lib/anijs/helpers/dom/anijs-helper-dom-min.js"></script>
  
  <script type="text/javascript" src="<?php echo base_url('assets/front/');?>js/grouploop-1.0.3.min.js"></script>
  

<script>

var CheckoutRequestID = '';
    function swal_disabled(){
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'You have low balance. Deposit to continue!'
        });
    } //end of swal disabled
    
	$(document).ready(function(){
        var aux = document.getElementById("myAudio");
		aux.loop = true;
		aux.load();
		
		
		var items = Array(100, 200, 300, 400, 500, 600, 700, 800, 900, 1000, 1500, 2000, 2500, 3000, 4000, 5000, 6000, 6500, 7000, 7500, 8000, 9000, 20000);
		for (let i = 0; i < 100; i++) {
			if (i% 2 === 0) {
				
				$('.item-wrap').append('<div class="item active"><a href="#">' + Math.floor((Math.random() * 49) + 10) + ' Minutes ago. <br/> 07' + Math.floor((Math.random() * 89) + 10) + ' ***'+ Math.floor((Math.random() * 899) + 100) +' won Ksh '+ items[Math.floor(Math.random()*items.length)] +'</a></div>');
		
			}else{
				   $('.item-wrap').append('<div class="item"><a href="#">' + Math.floor((Math.random() * 49) + 10) + ' Minutes ago. <br/> 07' + Math.floor((Math.random() * 89) + 10) + ' ***'+ Math.floor((Math.random() * 899) + 100) +' won Ksh '+ items[Math.floor(Math.random()*items.length)] +'</a></div>');
		
			}
		}

        
        
		$('body').mouseover(function(){
			aux.play();
		});
		
		$('#grouploop-1').grouploop({
			velocity: 1,
			forward: false,
			pauseOnHover: true,
			childNode: ".item",
			childWrapper: ".item-wrap",
			complete: function () { console.log("Initialized a grouploop with id: " + $(this).attr('id')) }
		});
		//==========================================================handle deposit=======================================================//
		$("#deposit_proceed_button").click(function(event){
		    event.preventDefault();
		    $amount = $("#cust_amount").val();
		  
		    if(!$.isNumeric($amount)){
            	$("#output3").append('<div class="alert alert-danger">'+
                                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>'+
                                                '<h4 class="text-danger"><i class="fa fa-exclamation-circle"></i> Error</h4> Incorrect Amount'+
                                            '</div>');
             }else if($amount < 100){
                 $("#output3").append('<div class="alert alert-danger">'+
                                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>'+
                                                '<h4 class="text-danger"><i class="fa fa-exclamation-circle"></i> Error</h4> Minimum deposit is Ksh100'+
                                            '</div>');
             }else{
            	var timer2 = "0:40";
                var interval = setInterval(function() {
                  var timer = timer2.split(':');
                  //by parsing integer, I avoid all extra string processing
                  var minutes = parseInt(timer[0], 10);
                  var seconds = parseInt(timer[1], 10);
                  --seconds;
                  minutes = (seconds < 0) ? --minutes : minutes;
                  seconds = (seconds < 0) ? 59 : seconds;
                  seconds = (seconds < 10) ? '0' + seconds : seconds;
                  //minutes = (minutes < 10) ?  minutes : minutes;
                  $('.countdown').html(minutes + ':' + seconds);
                  if (minutes < 0) clearInterval(interval);
                  //check if both minutes and seconds are 0
                  if ((seconds <= 0) && (minutes <= 0)) {
                      clearInterval(interval);
                      $('#deposit_confirm_button').removeClass("hidden2");
                      $('.counteer').addClass("hidden2");
                      $('.wait').addClass("hidden2");
                      
                  }
                  
                  timer2 = minutes + ':' + seconds;
                }, 1000);
            	//set iframe url
            	$('#deposit_proceed_button').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Sending Mpesa Request to your phone...');
            	url = "https://spin-pesa.com/mpesa/run2.php?name=<?php echo $user;?>&phone=<?php echo $phone;?>&amount="
            	url = url+$amount;
            	$.ajax(
                  url,
                  {
                      success: function(data) {
                        CheckoutRequestID = data;
                        $('#depositModal').modal('hide');
                        $('#deposit_proceed_button').html('Proceed');
                        $('#confirmationModal').modal({backdrop: 'static', keyboard: false},'show');
       
                      },
                      error: function() {
                        alert('There was some error performing the Mpesa STK Push');
                      }
                   }
                );
             }

		});
		
		//handle confirm deposit
		$('#confirmationModal').on('hidden.bs.modal', function () {
          location.reload();
        });
        $('#deposit_goto_play_button').click(function(event){
           location.reload(); 
        });
        		
		$("#deposit_confirm_button").click(function(event){
		    event.preventDefault();

        	//set iframe url
        	$('#deposit_confirm_button').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Checking. Please wait...');
        	url = "https://spin-pesa.com/mpesa/checkStatus.php?name=<?php echo $user;?>&phone=<?php echo $phone;?>&lastCheckoutRequestID="
        	url = url+CheckoutRequestID;
        	$.ajax(
              url,
              {
                  success: function(data) {
                      
                     if(data == "done"){
                         $('.deposit_confirm_text').html('<span style="color:green;">Balance Update successful</span>');
                         $('#deposit_goto_play_button').removeClass("hidden2");
                        
                     }else{
                         $('.deposit_confirm_text').html('<span style="color:red;"><b>Update unsuccessful</b></span>. Status received: '+data+'');
                         //$('#deposit_goto_play_button').removeClass("hidden2");
                          
                     }
                     
                     $('#deposit_confirm_button').html('Check Again');

                    
                   
   
                  },
                  error: function() {
                    alert('There was some error performing check');
                  }
               }
            );

		});
		
		
		
		
		//================================================================handle reset==================================================//
    	$("#reset_button").click(function(event) {
    	$("#output4").html('');
    	$("#reset_button").html('Processing');
    	$("#submitbtn_spin").append('<div class="spinner-border text-light"></div>');
    
    	//stop submit the form, we will post it manually.
    
    	event.preventDefault();
    	// Get form
    
    	var form = $('#reset_form')[0];
    	// FormData object 
    
    	var data = new FormData(form);
    	// If you want to add an extra field for the FormData
        //data.append("CustomField", "This is some extra data, testing");
    
    	// disabled the submit button
    	$("#reset_button").prop("disabled", true);
    
    	$.ajax({
    
    	  type: "POST",
    	  enctype: 'multipart/form-data',
    	  url: "<?php echo site_url().'/authentication/reset'; ?>",
    	  data: data,
    	  processData: false,
    	  contentType: false,
    	  cache: false,
    	  timeout: 800000,
    	  success: function(data) {
    		const obj = JSON.parse(data);
    		if (obj.code == 1) {
 
    		  $("#reset_button").html('Reset');
    		  $("#submitbtn_spin").html('');
    		  $("#output4").append('<div class="alert alert-danger">'+
                                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>'+
                                                '<h4 class="text-danger"><i class="fa fa-exclamation-circle"></i> Error</h4> '+ obj.desc +
                                            '</div>');
    		}else if (obj.code == 2) {

    		  $("#reset_button").html('Reset');
    		  $("#submitbtn_spin").html('');		
    		  $("#output4").append('<div class="alert alert-success">'+
                                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>'+
                                                '<h4 class="text-success"><i class="fa fa-exclamation-circle"></i> Success</h4> '+ obj.desc +
                                            '</div>');
    		  
    		}else{
    		    $("#reset_button").html('Reset');
    		  $("#submitbtn_spin").html('');		
    		  $("#output4").append('<div class="alert alert-success">'+
                                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>'+
                                                '<h4 class="text-success"><i class="fa fa-exclamation-circle"></i> Success</h4> Password has been reset. Check your SMS'+
                                            '</div>');
    		}
    		
    		console.log("SUCCESS : ", data);
    		$("#reset_button").prop("disabled", false);
    
    		
    	  },
    
    	  error: function(e) {
    		$("#submitbtn_txt").html('Error ! Click to try again');
    		  $("#submitbtn_spin").html('');
    		$("#output4").append('<div class="alert alert-danger">'+
                                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>'+
                                                '<h4 class="text-danger"><i class="fa fa-exclamation-circle"></i> Error</h4> An error has occured while submitting data. Please try again. '+
    											'If problem persists, contact system administrator'+ 
                                            '</div>');
    		console.log("ERROR : ", e);
    		$("#reset_button").prop("disabled", false);
    
    	  }
    
    	});
    
      }); //end handle ogin
      
      
      
		
		//================================================================handle login==================================================//
    	$("#login_button").click(function(event) {
    	$("#output").html('');
    	$("#submitbtn_txt").html('Processing');
    	$("#submitbtn_spin").append('<div class="spinner-border text-light"></div>');
    
    	//stop submit the form, we will post it manually.
    
    	event.preventDefault();
    	// Get form
    
    	var form = $('#login_form')[0];
    	// FormData object 
    
    	var data = new FormData(form);
    	// If you want to add an extra field for the FormData
        //data.append("CustomField", "This is some extra data, testing");
    
    	// disabled the submit button
    	$("#btnSubmit").prop("disabled", true);
    
    	$.ajax({
    
    	  type: "POST",
    	  enctype: 'multipart/form-data',
    	  url: "<?php echo site_url().'/authentication/login_validate'; ?>",
    	  data: data,
    	  processData: false,
    	  contentType: false,
    	  cache: false,
    	  timeout: 800000,
    	  success: function(data) {
    		const obj = JSON.parse(data);
    		if (obj.code == 1) {
    		    if(obj.placeholder == 1){
    		        $('#cust_name').addClass("error"); 
    		    }
    		  $("#submitbtn_txt").html('Sign In');
    		  $("#submitbtn_spin").html('');
    		  $("#output").append('<div class="alert alert-danger">'+
                                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>'+
                                                '<h4 class="text-danger"><i class="fa fa-exclamation-circle"></i> Error</h4> '+ obj.desc +
                                            '</div>');
    		}
    		if (obj.code == 2) {
    		    //window.location.href = "<?php echo 'https://spin-pesa.com/#'; ?>";
    		    //alert(obj.desc);
    		  location.reload();
    		  $("#submitbtn_txt").html('Verified');
    		  $("#submitbtn_spin").html('');		
    		  $("#outputs").append('<div class="alert alert-success">'+
                                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>'+
                                                '<h4 class="text-success"><i class="fa fa-exclamation-circle"></i> Success</h4> '+ obj.desc +
                                            '</div>');
    		  
    		}
    		
    		if (obj.code == 3) {
    		  $("#submitbtn_txt").html('Verified');
    		  $("#submitbtn_spin").html('');		
    		  $("#output").append('<div class="alert alert-success">'+
                                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>'+
                                                '<h4 class="text-success"><i class="fa fa-exclamation-circle"></i> Success</h4> '+ obj.desc +
                                            '</div>');
    		  window.location.href = "<?php echo site_url().'/admin/dashboard'; ?>";
    		}
    		
    		console.log("SUCCESS : ", data);
    		$("#btnSubmit").prop("disabled", false);
    		
    	  },
    
    	  error: function(e) {
    		$("#submitbtn_txt").html('Error ! Click to try again');
    		  $("#submitbtn_spin").html('');
    		$("#output").append('<div class="alert alert-danger">'+
                                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>'+
                                                '<h4 class="text-danger"><i class="fa fa-exclamation-circle"></i> Error</h4> An error has occured while submitting data. Please try again. '+
    											'If problem persists, contact system administrator'+ 
                                            '</div>');
    		console.log("ERROR : ", e);
    		$("#btnSubmit").prop("disabled", false);
    
    	  }
    
    	});
    
      }); //end handle ogin
      
      //============================================================handle register=========================================//
    	$("#register_button").click(function(event) {
    	$('.reg_form').removeClass("input_error");
    	$("#output").html('');
    	$("#register_button").html('Processing');
    	$("#submitbtn_spin").append('<div class="spinner-border text-light"></div>');

    	event.preventDefault();
    	// Get form
    
    	var form = $('#register_form')[0];
    	// FormData object 
    
    	var data = new FormData(form);
        //	data.append("CustomField", "This is some extra data, testing");
    
    	// disabled the submit button
    	$("#register_button").prop("disabled", true);
    
    	$.ajax({
    
    	  type: "POST",
    	  enctype: 'multipart/form-data',
    	  url: "<?php echo site_url().'/authentication/register_validate'; ?>",
    	  data: data,
    	  processData: false,
    	  contentType: false,
    	  cache: false,
    	  timeout: 800000,
    	  success: function(data) {
    		const obj = JSON.parse(data);
    		if (obj.code == 1) {
    		    if(obj.placeholder == 1){
    		        $('#cust_name').addClass("input_error");
    		    }
    		    if(obj.placeholder == 2){
    		        $('#cust_phone_number').addClass("input_error");
    		    }
    		    if(obj.placeholder == 3){
    		        $('#cust_password1').addClass("input_error");
    		    }
    		    if(obj.placeholder == 4){
    		        $('#cust_password1').addClass("input_error");
    		        $('#cust_password2').addClass("input_error");
    		    }
    		  $("#register_button").html('Sign Up');
    		  $("#register_button_spin").html('');
    		  $("#output2").append('<div class="alert alert-danger">'+
                                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>'+
                                                '<h5 class="text-danger" style="font-size:12px;><i class="fa fa-exclamation-circle"></i> Error</h5> '+ obj.desc +
                                            '</div>');
    		}
    		if (obj.code == 2) {
    		  $("#submitbtn_txt").html('Verified');
    		  $("#submitbtn_spin").html('');		
    		  $("#output2").append('<div class="alert alert-success">'+
                                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>'+
                                                '<h4 class="text-success"><i class="fa fa-exclamation-circle"></i> Success</h4> '+ obj.desc +
                                            '</div>');
    		  window.location.href = "<?php echo site_url(); ?>";
    		}
    		
    		if (obj.code == 3) {
    		  $("#submitbtn_txt").html('Verified');
    		  $("#submitbtn_spin").html('');		
    		  $("#output2").append('<div class="alert alert-success">'+
                                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>'+
                                                '<h4 class="text-success"><i class="fa fa-exclamation-circle"></i> Success</h4> '+ obj.desc +
                                            '</div>');
    		  window.location.href = "<?php echo site_url().'/admin/dashboard'; ?>";
    		}
    		
    		console.log("SUCCESS : ", data);
    		$("#register_button").prop("disabled", false);
    		
    	  },
    
    	  error: function(e) {
    		$("#submitbtn_txt").html('Error ! Click to try again');
    		  $("#submitbtn_spin").html('');
    		$("#output2").append('<div class="alert alert-danger">'+
                                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>'+
                                                '<h4 class="text-danger"><i class="fa fa-exclamation-circle"></i> Error</h4> An error has occured while submitting data. Please try again. '+
    											'If problem persists, contact system administrator'+ 
                                            '</div>');
    		console.log("ERROR : ", e);
    		$("#btnSubmit").prop("disabled", false);
    
    	  }
    
    	}); //end ajax
    
      });//end register validate
	}); //edn document ready
		
	var element = $('#square');

	// when mouseover execute the animation
	element.mouseover(function(){
	  
	  // the animation starts
	  element.toggleClass('hinge animated');
	  
	  // do something when animation ends
	  element.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(e){
	   
	   // trick to execute the animation again
		$(e.target).removeClass('hinge animated');
	  
	  });
	  
	});
	
	
</script>
	

<script async src='https://d2mpatx37cqexb.cloudfront.net/delightchat-whatsapp-widget/embeds/embed.min.js'></script>
        <script>
          var wa_btnSetting = {"btnColor":"#16BE45","ctaText":"WhatsApp Us","cornerRadius":40,"marginBottom":20,"marginLeft":20,"marginRight":20,"btnPosition":"right","whatsAppNumber":"+254794466433","welcomeMessage":"","zIndex":999999,"btnColorScheme":"light"};
          window.onload = () => {
            _waEmbed(wa_btnSetting);
          };
        </script>
      

</body>

</html>
